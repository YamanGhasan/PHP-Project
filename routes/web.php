<?php
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/search', [MovieController::class, 'search'])->name('movies.search');
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.show');
Route::get('/tvshow/{id}', [MovieController::class, 'show'])->name('tvshow.show');

Route::post('/fetch-video-data', [MovieController::class, 'fetchVideoData'])->name('fetchVideoData');
Route::get('/video-page', [MovieController::class, 'showVideoPage'])->name('videoPage');






