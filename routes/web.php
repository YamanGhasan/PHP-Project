<?php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserMovieController;
use Illuminate\Support\Facades\Auth;
 
Route::get('/', function () {
    return view('home');
});
Route::get('/', [MovieController::class, 'index'])->name('movies.index');

Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [UserMovieController::class, 'registeruser'])->name('register');

Route::get('/login', [UserMovieController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserMovieController::class, 'login'])->name('login');
 

Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');
Route::get('/tvshow/{id}', [MovieController::class, 'show'])->name('tvshow.show');
Route::post('/fetch-video-data', [MovieController::class, 'fetchVideoData'])->name('fetchVideoData');
Route::get('/video-page', [MovieController::class, 'showVideoPage'])->name('videoPage');


Route::get('/profile', [UserMovieController::class, 'profile'])->name('profile')->middleware('auth');

Route::get('/logout', [UserMovieController::class, 'logout'])->name('profile.logout');
 
Route::post('/movies/{id}/favorite', [MovieController::class, 'addToFavorites'])->name('movies.favorite');
Route::post('/tvshows/{id}/favorite', [MovieController::class, 'addToFavoritesTvShow'])->name('tvshows.favorite');

Route::delete('/favorites/remove/{id}', [MovieController::class, 'remove'])->name('remove_favorite');

 




