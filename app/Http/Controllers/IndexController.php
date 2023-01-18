<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Episode;
use DB;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    public function home()
    {
        return view::make('pages.home', [
            'categories',
            'countries',
            'genres',
            'year_movie',
            'movie_host_trailer',
            'movie_host_sidebar',
            'movie_host']);
    }

    public function category($slug)
    {
        $cate_slug = Category::where('slug', $slug)->first();
        $movies = Movie::where('category_id', $cate_slug->id)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(12);

        return view('pages.category', [
            'categories',
            'countries',
            'genres',
            'year_movie',
            'movie_host_trailer',
            'movie_host_sidebar',
            'movie_host',
            'cate_slug'=> $cate_slug,
            'movies'=>$movies
        ]);
    }

    public function genre($slug)
    {
        $genre_slug = Genre::where('slug', $slug)->first();
        $movies = $genre_slug->movieGenre()->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(12);

        return view('pages.genre', [
            'categories',
            'countries',
            'genres',
            'year_movie',
            'movie_host_trailer',
            'movie_host_sidebar',
            'movie_host',
            'genre_slug'=>$genre_slug, 'movies'=>$movies
        ]);
    }

    public function country($slug)
    {
        $country_slug = Country::where('slug', $slug)->first();
        $movies = Movie::where('country_id', $country_slug->id)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(12);

        return view('pages.country', [
            'categories',
            'countries',
            'genres',
            'year_movie',
            'movie_host_trailer',
            'movie_host_sidebar',
            'movie_host',
            'country_slug'=>$country_slug,
            'movies'=>$movies
        ]);
    }

    public function movie($slug, $id)
    {
        $movie = Movie::with('category', 'country', 'genreMovie')->where('slug', $slug)
            ->where('id', $id)->where('status', 1)->first();
        $movie_related = Movie::with('category', 'country', 'genreMovie')
            ->where('status', 1)
            ->where('category_id', $movie->category->id)
            ->where('movie_host', 1)
            ->orderBy(DB::raw('Rand()'))
            ->whereNotIn('slug', [$slug])
            ->get();
        $episode_movie = Episode::with('movie')->where('movie_id',$id)->get();
        $curent_episode =$episode_movie->count() ;//số tập hiện đã up link

        return view('pages.movie', [
            'categories',
            'countries',
            'genres',
            'year_movie',
            'movie_host_trailer',
            'movie_host_sidebar',
            'movie_host',
            'movie'=>$movie,'episode_movie'=>$episode_movie,
            'movie_related'=>$movie_related,'curent_episode'=>$curent_episode ]);
    }

    public function year_movie($year)
    {
        $movies = Movie::where('year_movie', $year)->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(24);
        return view('pages.year_movie', [
            'categories',
            'countries',
            'genres',
            'year_movie',
            'movie_host_trailer',
            'movie_host_sidebar',
            'movie_host',
            'year'=>$year,'movies'=>$movies]);
    }

    public function tag_movie($tag)
    {
        $movies = Movie::where(function ($query) use ($tag){
            $query->orwhere('title', 'like', '%' . $tag . '%');
            $query->orwhere('tag_movie', 'like', '%' . $tag . '%');
        })->where('status', 1)->orderBy('updated_at', 'DESC')->paginate(24);

        return view('pages.tag_movie', [
            'categories',
            'countries',
            'genres',
            'year_movie',
            'movie_host_trailer',
            'movie_host_sidebar',
            'movie_host',
            'tag'=>$tag,
            'movies'=>$movies]);
    }

    public function top_movie(Request $request)
    {
        $data = $request->all();
        $topMovie = Movie::where('top_view', $data['value'])->where('status', 1)->orderBy('updated_at', 'DESC')->take(8)->get();
        $html = '';
        foreach ($topMovie as $item) {
            $html .= '<div class="item">
                <a href="'.url('phim/'.$item->slug.'/'. $item->id).'" title="'.$item->title.'">
                        <div class="item-link">
                        <img src="'.asset($item->image_path).'"
                    class="lazy post-thumb" alt="'.$item->title.'"
                    title="'.$item->title.'"/>
                        <span class="is_trailer">'.$item->resolution.'</span>
                </div>
                    <p class="title">'.$item->title.'</p>
                </a>
                    <div id="loadViewCount_'.$item->id.'" class="viewsCount" style="color: #9d9d9d;">'.$item->count_view.' lượt xem</div>
                </div>';
        }
        echo $html;
    }

    public function top_movie_default()
    {
        $topMovie = Movie::where('top_view', 0)->where('status', 1)->orderBy('updated_at', 'DESC')->take(8)->get();
        $html = '';
        foreach ($topMovie as $item) {
            $html .= ' <div class="item">
                <a href="' . url('phim/' . $item->slug . '/' . $item->id) . '" title="' . $item->title . '">
                        <div class="item-link">
                        <img src="' . asset($item->image_path) . '"
                    class="lazy post-thumb" alt="' . $item->title . '"
                    title="' . $item->title . '"/>
                        <span class="is_trailer">' . $item->resolution . '</span>
                </div>
                    <p class="title">' . $item->title . '</p>
                </a>
                    <div id="loadViewCount_'.$item->id.'" class="viewsCount" style="color: #9d9d9d;">'.$item->count_view.' lượt xem</div>
                </div>';
        }
        echo $html;
    }

    public function search_movie()
    {
        if(isset($_GET['search-title-movie'])){
            if(!empty($_GET['search'])){
                $search = $_GET['search'];
                $movies = Movie::where(function ($query) use ($search){
                    $query->orwhere('title','like','%'.$search.'%');
                    $query->orwhere('slug','like','%'.$search.'%');
                    $query->orwhere('description','like','%'.$search.'%');
                    $query->orwhere('name_eng','like','%'.$search.'%');
                    $query->orwhere('resolution','like','%'.$search.'%');
                })
                    ->where('status', 1)
                    ->orderBy('updated_at', 'DESC')->paginate(24);
                return view('pages.search_movie', [
                    'categories',
                    'countries',
                    'genres',
                    'year_movie',
                    'movie_host_trailer',
                    'movie_host_sidebar',
                    'movie_host',
                    'search'=>$search,
                    'movies'=>$movies]);
            }else{
                return back();
            }
        }
    }

    public function watch($slug,$season,$tap)
    {
        $movie = Movie::where('slug',$slug)->first();
        //cắt lấy tập $episode
        $episode = substr($tap,6);
        $episode_movie = Episode::where('movie_id',$movie->id)->where('episode',$episode)->first();
        $movie_related = Movie::with('category','country','genreMovie','episode')
            ->where('category_id',$movie->category->id)->where('status',1)
            ->orderBy(DB::raw('Rand()'))->get();

        return view('pages.watch', [
            'categories',
            'countries',
            'genres',
            'year_movie',
            'movie_host_trailer',
            'movie_host_sidebar',
            'movie_host',
            'movie_related'=>$movie_related,
            'movie'=>$movie,
            'episode_movie'=>$episode_movie]);
    }
    //tăng view của phim
    public function increaseViewCount($id)
    {
        $movie = Movie::find($id);
        $movie->increment('count_view');
        $countView = $movie->count_view.' lượt xem';
        return response()->json([
            'message' => 'Increase view count successfully!',
            'status' => 200,
            'countView'=>$countView,
        ]);
    }
        //tăng view của tập phim
    public function viewCountEpisode($id)
    {
        $episode = Episode::find($id);
        $episode->increment('count_view');
        $countView = $episode->count_view.' lượt xem';
        return response()->json([
            'message' => 'Increase view count successfully!',
            'status' => 200,
            'countView'=>$countView,
        ]);
    }
}
