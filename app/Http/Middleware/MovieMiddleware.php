<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Session;

class MovieMiddleware
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $movies = $this->getViewedPosts();

        if (!is_null($movies))
        {
            $this->cleanExpiredViews($movies);
            $this->storePosts($movies);
        }

        return $next($request);
    }
    private function getViewedPosts()
    {
        return $this->session->get('viewed_movie', null);
    }

    private function cleanExpiredViews($movies)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 1;

        return array_filter($movies, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storePosts($movies)
    {
        $this->session->put('viewed_movie', $movies);
    }
}
