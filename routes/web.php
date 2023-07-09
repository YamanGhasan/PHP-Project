<?php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserMovieController;
 
Route::get('/', function () {
    return view('register');
});

Route::post('/', [UserMovieController::class, 'registeruser'])->name('register');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/login', [UserMovieController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserMovieController::class, 'login'])->name('login');
 
Route::get('/home', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');
Route::get('/tvshow/{id}', [MovieController::class, 'show'])->name('tvshow.show');

Route::post('/fetch-video-data', [MovieController::class, 'fetchVideoData'])->name('fetchVideoData');
Route::get('/video-page', [MovieController::class, 'showVideoPage'])->name('videoPage');

Route::get('/profile', [UserMovieController::class, 'profile'])->name('profile');

Route::get('/logout', [UserMovieController::class, 'logout'])->name('profile.logout');

 
Route::post('/movies/{id}/favorite', [MovieController::class, 'addToFavorites'])
    ->name('movies.favorite');





