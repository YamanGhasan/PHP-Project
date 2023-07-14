<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Favorite;
use App\Models\MovieUser;


 
 
class MovieController extends Controller
{
 
    public function index()
{
    $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';
    $client = new Client();

    $movieUrl = "https://api.themoviedb.org/3/movie/popular?api_key={$apiKey}";
    $tvShowUrl = "https://api.themoviedb.org/3/tv/popular?api_key={$apiKey}";

    try {
        $movieResponse = $client->get($movieUrl);
        $movieData = json_decode($movieResponse->getBody(), true);
        $movies = $movieData['results'] ?? null;

        $tvShowResponse = $client->get($tvShowUrl);
        $tvShowData = json_decode($tvShowResponse->getBody(), true);
        $TvShows = $tvShowData['results'] ?? null;

        return view('home', compact('movies', 'TvShows'));
    } catch (\Exception $e) {
        // Handle any errors that occur during the request
        return $e->getMessage();
    }
}

    
    

    public function search(Request $request)
    {
        $search = $request->input('query');
        $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';  
    
        $endpoint = "https://api.themoviedb.org/3/search/multi?query={$search}&api_key={$apiKey}";
    
        $client = new Client();
    
        try {
            $response = $client->get($endpoint);
            $data = json_decode($response->getBody(), true);
    
            $movies = $data['results'] ?? [];
    
            return view('search-results', compact('movies'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
{
    $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';
    $movieEndpoint = "https://api.themoviedb.org/3/movie/{$id}?api_key={$apiKey}";
    $tvShowEndpoint = "https://api.themoviedb.org/3/tv/{$id}?api_key={$apiKey}";
    $contentRatingsEndpoint = "https://api.themoviedb.org/3/movie/{$id}/content_ratings?api_key={$apiKey}";
    $recommendationsEndpoint = "https://api.themoviedb.org/3/movie/{$id}/recommendations?api_key={$apiKey}";
    $recommendationsEndpointTV = "https://api.themoviedb.org/3/tv/{$id}/recommendations?api_key={$apiKey}";

    // Send a GET request to retrieve the movie details
    $movieResponse = Http::get($movieEndpoint);
    $tvShowResponse = Http::get($tvShowEndpoint);
    $contentRatingsResponse = Http::get($contentRatingsEndpoint);
    $recommendationsResponse = Http::get($recommendationsEndpoint);
    $recommendationsTVResponse = Http::get($recommendationsEndpointTV);

    if ($movieResponse->successful()) {
        $movie = $movieResponse->json();
        $contentRatings = $contentRatingsResponse->json();
        $recommendations = $recommendationsResponse->json();
        
        return view('show', [
            'movie' => $movie,
            'contentRatings' => $contentRatings,
            'recommendations' => isset($recommendations['results']) ? $recommendations['results'] : [],
        ]);
    } elseif ($tvShowResponse->successful()) {
        $tvShow = $tvShowResponse->json();
        $contentRatings = $contentRatingsResponse->json();
        $recommendationsTV = $recommendationsTVResponse->json();
        return view('show', [
            'tvShow' => $tvShow,
            'contentRatings' => $contentRatings,
            'recommendationsTV' => isset($recommendationsTV['results']) ? $recommendationsTV['results'] : []
        ]);
    } else {
        // Handle the error response
        $error = $movieResponse->failed() ? $movieResponse->body() : $contentRatingsResponse->body();
        return response()->json(['error' => $error], $movieResponse->status() ?: $contentRatingsResponse->status());
    }
}

    

    

 
 


public function fetchVideoData()
{
    // Retrieve the movie ID from the API or any other source
    $movieId = '299536';
    $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';  
    $videoEndpoint = "https://api.themoviedb.org/3/movie/{$movieId}/videos?api_key={$apiKey}";

    $response = Http::get($videoEndpoint);
    $data = $response->json();
 
    return redirect()->route('videoPage', ['data' => json_encode($data)]);
}

public function showVideoPage(Request $request)
{
    $videoData = json_decode($request->input('data'), true);
 
    return view('video-page', ['videoData' => $videoData]);
}



 
//     // working 
public function addToFavorites($id)
{
    $user = auth()->user();
    if (!$user) {
        // Handle case when user is not authenticated
        return redirect()->back()->with('error', 'User not authenticated.');
    }

    // Check if the movie is already in the user's favorites
    if ($user->favorites()->where('movie_id', $id)->exists()) {
        return redirect()->back()->with('error', 'Movie is already in favorites.');
    }

    // Retrieve the movie details from the API
    $movie = $this->getMovieDetails($id);

    if ($movie) {
        $favorite = $user->favorites()->create([
            'movie_id' => $movie['id'],
            'title' => $movie['title'],
            'poster_path' => $movie['poster_path'],
        ]);

        // Redirect back to the movie page with a success message
        return redirect()->back()->with('message', 'Movie added to favorites.');
    } else {
        // Redirect back to the movie page with an error message
        return redirect()->back()->with('error', 'Failed to retrieve movie details.');
    }
}
public function addToFavoritesTvShow($id)
{
    $user = auth()->user();
    if (!$user) {
        // Handle case when user is not authenticated
        return redirect()->back()->with('error', 'User not authenticated.');
    }

    // Check if the TV show is already in the user's favorites
    if ($user->favorites()->where('movie_id', $id)->exists()) {
        return redirect()->back()->with('error', 'TV show is already in favorites.');
    }

    // Retrieve the TV show details from the API
    $tvShow = $this->getTvShowDetails($id);

    if ($tvShow) {
        // Create a new favorite record
        $favorite = $user->favorites()->create([
            'movie_id'  => $tvShow['id'],
            'title' => $tvShow['name'],
            'poster_path' => $tvShow['poster_path'],
        ]);

        // Redirect back to the TV show page with a success message
        return redirect()->back()->with('message', 'TV show added to favorites.');
    } else {
        // Redirect back to the TV show page with an error message
        return redirect()->back()->with('error', 'Failed to retrieve TV show details.');
    }
}
 
 

private function getTVShowDetails($id)
{
    $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';
    $client = new \GuzzleHttp\Client();

    $url = "https://api.themoviedb.org/3/tv/{$id}?api_key={$apiKey}";

    try {
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        return $data;
    } catch (\Exception $e) {
        return null;
    }
}

private function getMovieDetails($id)
{
    $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';
    $client = new \GuzzleHttp\Client();

    $url = "https://api.themoviedb.org/3/movie/{$id}?api_key={$apiKey}";

    try {
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        return $data;
    } catch (\Exception $e) {
        // Handle API request errors
        return null;
    }
}


 

public function remove($id)
{
    $user = auth()->user();

   
    $favorite = $user->favorites()->where('movie_id', $id)->first();

    if ($favorite) {
        $favorite->delete();

        return redirect()->route('profile')->with('success', 'Favorite movie removed successfully.');
    } else {
   
        return redirect()->route('profile')->with('error', 'Favorite movie not found.');
    }
}

 

}
