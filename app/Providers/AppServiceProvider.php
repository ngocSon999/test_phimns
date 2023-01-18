<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use DB;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('*', function ($view) {

            $categories = Category::orderBy('position', 'ASC')->where('status', 1)->get();
            $countries = Country::orderBy('id', 'desc')->get();
            $genres = Genre::orderBy('id', 'desc')->get();
            $year_movie = Movie::select(DB::raw('count(*), year_movie'))
                ->where('year_movie', '<>', null)
                ->groupBy('year_movie')->orderBy('year_movie', 'DESC')
                ->get();
            $movie_host_trailer = Movie::where('resolution', 'Trailer')->where('status', 1)
                ->orderBy('updated_at', 'DESC')->take(10)->get();
            $movie_host_sidebar = Movie::where('status', 1)->where('movie_host', 1)
                ->orderBy('updated_at', 'DESC')->take(15)->get();

            $movie_host = Movie::where('status', 1)->where('movie_host', 1)->orderBy('updated_at', 'DESC')->get();

            $view->with([
                'categories'=>$categories,
                'countries'=>$countries,
                'genres'=>$genres,
                'year_movie'=>$year_movie,
                'movie_host_trailer'=>$movie_host_trailer,
                'movie_host_sidebar'=>$movie_host_sidebar,
                'movie_host' => $movie_host,
            ]);
        });
    }
}
