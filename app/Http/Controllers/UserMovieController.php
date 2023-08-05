<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\MovieUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
 
 

class UserMovieController extends Controller
{
 
    public function registeruser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50|min:5|unique:movie_users',
            'email' => 'required|email|max:100|unique:movie_users',
            'password' => 'required|string|min:8',
            'age' => 'required|integer|min:18',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = MovieUser::create([
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'age' => $request->input('age'),
        ]);

        // Log in the user
        Auth::login($user);

        Session::flash('success', 'User registered and logged in successfully.');

        return redirect()->route('login');
    }
    public function showLoginForm()
{
    return view('login');
}
 
 
public function login(Request $request)
{
    if (Auth::check()) {
        // User is already authenticated, redirect to home page
        return redirect()->route('movies.index');
    }

    $credentials = $request->only('email', 'password');
    $user = MovieUser::where('email', $credentials['email'])->first();
    
    if (Auth::attempt($credentials)) {
        // Authentication successful
        $request->session()->put('username', $user->username);
        return redirect()->route('movies.index'); // Redirect to home page
    }

    return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
}

 


public function profile()
{

    $username = session('username');
    $user = MovieUser::with('favorites')->where('username', $username)->first();

    if (!$user->relationLoaded('favorites')) {
        $user->load('favorites');
    }

    // Retrieve the user's favorite movies
    $favorites = $user->favorites;

    $movies = [];

    foreach ($favorites as $favorite) {
        $movieId = $favorite->movie_id;
        $movie = $this->getMovieDetails($movieId);

        if ($movie) {
            $movies[] = $movie;
        }
    }

    // Retrieve the user's favorite TV shows
    $tvShows = [];

    foreach ($favorites as $favorite) {
        $tvShowId = $favorite->movie_id;
        $tvShow = $this->getTvShowDetails($tvShowId);

        if ($tvShow) {
            $tvShows[] = $tvShow;
        }
    }

    // Pass the user's information, favorite movies, and favorite TV shows to the view
    return view('profile', [
        'user' => $user,
        'movies' => $movies,
        'tvShows' => $tvShows,
    ]);
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
 
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}


 
}
