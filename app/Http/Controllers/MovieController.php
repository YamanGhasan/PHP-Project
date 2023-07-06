<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class MovieController extends Controller
{
    public function index()
    {
        $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';
        $client = new Client();

        $url = "https://api.themoviedb.org/3/movie/popular?api_key={$apiKey}";

        try {
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);

            $movies = $data['results'] ?? null; // Get the movie results from the response data

            return view('home')->with('movies', $movies);
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
            // Handle any errors that occur during the request
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';
        $endpoint = "https://api.themoviedb.org/3/movie/{$id}?api_key={$apiKey}";

        // Send a GET request to retrieve the movie details
        $response = Http::get($endpoint);
 
        if ($response->successful()) {
            $movie = $response->json();

            // Pass the movie details to the view
            return view('show', [
                'movie' => $movie
            ]);
        } else {
            // Handle the error response
            return response()->json(['error' => $response->body()], $response->status());
        }
    }


//     public function show($id)
// {
//     $apiKey = '22d966b39e45c68b73d1aaa2be9e9794';
//     $endpoint = "https://api.themoviedb.org/3/movie/{movie_id}/lists{$id}?api_key={$apiKey}";

//     // Send a GET request to retrieve the movie details
//     $response = Http::get($endpoint);

//     if ($response->successful()) {
//         $movie = $response->json();

//         // Display the API result in the console
//         dd($movie);

//         // Pass the movie details to the view
//         return view('show', [
//             'movie' => $movie
//         ]);
//     } else {
//         // Handle the error response
//         return response()->json(['error' => $response->body()], $response->status());
//     }
// }

}
