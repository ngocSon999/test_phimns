<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;

//Admin Controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear-cache', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
});
Route::get('/', [IndexController::class, 'home'])->name('home_pages');
Route::get('/header', [IndexController::class, 'viewHeader'])->name('view');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');

Route::get('/phim/{slug}/{id}', [IndexController::class, 'movie'])->name('movie');
Route::get('/search-movie', [IndexController::class, 'search_movie'])->name('search_movie');
Route::get('/movie/year/{year}', [IndexController::class, 'year_movie'])->name('year_movie');
Route::get('/tag/{tag}', [IndexController::class, 'tag_movie'])->name('tag_movie');
Route::get('/top-movie', [IndexController::class, 'top_movie'])->name('top_movie');
Route::get('/top-movie-default', [IndexController::class, 'top_movie_default'])->name('top_movie_default');
Route::get('/update-count-view', [IndexController::class, 'update_count_view'])->name('update_count_view');

Route::get('/video/{slug}/{season}/{tap}', [IndexController::class, 'watch'])->name('watch');
Route::get('/episode', [IndexController::class, 'episode'])->name('episode');//Tập phim

Route::post('/movie/view/increase/{id}', [IndexController::class, 'increaseViewCount'])->name('movie.view.increase.count');//tăng view của phim
Route::post('/movie/episode/view/increase/{id}', [IndexController::class, 'viewCountEpisode'])->name('episode.view.increase.count');//tăng view của tập phim

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


//route admin
Route::group(['middleware' => 'admin.login'],function(){
    Route::resource('/category', CategoryController::class);
    Route::post('/resorting', [CategoryController::class, 'resorting'])->name('resorting');

    Route::resource('/genre', GenreController::class);
    Route::resource('/country', CountryController::class);

    Route::resource('/movie', MovieController::class);
    Route::get('/update-year-movie', [MovieController::class, 'update_year_movie'])->name('update_year_movie');
    Route::get('/update-season-movie', [MovieController::class, 'update_season_movie'])->name('update_season_movie');
    Route::get('/update-top-view', [MovieController::class, 'update_top_view'])->name('update_top_view');
    Route::get('/movie-episode', [MovieController::class, 'movie_episode'])->name('movie_episode');

    Route::resource('/episode', EpisodeController::class);
});
