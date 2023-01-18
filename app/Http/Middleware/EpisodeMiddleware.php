<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Session;

class EpisodeMiddleware
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
        $episode = $this->getViewedPosts();

        if (!is_null($episode))
        {
            $this->cleanExpiredViews($episode);
            $this->storePosts($episode);
        }

        return $next($request);
    }
    private function getViewedPosts()
    {
        return $this->session->get('viewed_episode', null);
    }

    private function cleanExpiredViews($episode)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 15;

        return array_filter($episode, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storePosts($episode)
    {
        $this->session->put('viewed_episode', $episode);
    }
}
