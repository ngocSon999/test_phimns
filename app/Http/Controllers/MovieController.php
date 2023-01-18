<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movieList = Movie::with('category','country','genreMovie')->orderBy('id','DESC')->get();
        $path = public_path()."/json_file/";
        if(!is_dir($path)){
            mkdir($path,0777,true);
        }
        File::put($path.'movies.json',json_encode($movieList));
        return view('admis.movie.index',compact('movieList'));
    }
    public function update_year_movie(Request $request)
    {
        $data = $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->year_movie = $data['year'];
        $movie->save();
    }
    public function update_top_view(Request $request)
    {
        $data = $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->top_view = $data['top_view'];
        $movie->save();
    }
    public function update_season_movie(Request $request)
    {
        $data = $request->all();
        $movie=Movie::find($data['movie_id']);
        $movie->season = $data['season_movie'];
        $movie->save();
    }
    public function movie_episode(Request $request){
        $data=$request->all();
        $movie = Movie::find($data['movie_id']);
        $totalMovie = $movie->total_movie;
        $output = '<option>--Chọn tập phim--</option>';
        for($i=1; $i<=$totalMovie;$i++){
            $output .= '<option value="'.$i.'">Tập - '.$i.'</option>';
        }
        echo $output;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = Category::pluck('title','id');
//        $genres = Genre::pluck('title','id');
        $genres = Genre::all();
        $countries = Country::pluck('title','id');
        return view('admis.movie.form',compact('categories','genres','countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['title'] = $request->title;
        $data['description']=$request->description;
        $data['status']=$request->status;
        $data['resolution']=$request->resolution;
        $data['vietsub']=$request->vietsub;
        $data['trailer']=$request->trailer;
        $data['movie_duration']=$request->movie_duration;
        $data['tag_movie']=$request->tag_movie;
        $data['slug']=Str::slug($request->title);
        $data['movie_host']=$request->movie_host;
        $data['name_eng']=$request->name_eng;
//        foreach ($request->genre_id as $value){
//            $data['genre_id']=$value[0];
//        }
        $data['category_id']=$request->category_id;
        $data['country_id']=$request->country_id;
        $data['total_movie']=$request->total_movie;

        if($request->hasFile('image_path')){
            $file = $request->file('image_path');
            $file_name = $file->getClientOriginalName();
            $ext = $file->extension();
            $fileZise = $file->getSize();
            if(strcasecmp($ext,'jpg') == 0 || strcasecmp($ext,'jpeg') == 0 || strcasecmp($ext,'png') == 0 ){
                $image = random_int(0,999).$file_name;
                if ($fileZise <= 7000000){
                    $file->move('upload/images',$image);
                    $data['image_path']='upload/images/'.$image;
//                    $data['image_path']=storage::url($path);
                }
            }
        }

        $movie = Movie::create($data);
        $movie->genreMovie()->attach($request->genre_id);
        return redirect()->route('movie.index')->with('status','Thêm phim thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::pluck('title','id');
        $genres = Genre::all();

        $countries = Country::pluck('title','id');
        $movie = Movie::find($id);
        $genrechecked = $movie->genreMovie()->get();
        return view('admis.movie.form',compact('movie','categories','genres','countries','genrechecked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['title'] = $request->title;
        $data['description']=$request->description;
        $data['status']=$request->status;
        $data['resolution']=$request->resolution;
        $data['vietsub']=$request->vietsub;
        $data['movie_duration']=$request->movie_duration;
        $data['tag_movie']=$request->tag_movie;
        $data['trailer']=$request->trailer;
        $data['slug']=Str::slug($request->title);
        $data['movie_host']=$request->movie_host;
        $data['name_eng']=$request->name_eng;
        $data['total_movie']=$request->total_movie;
//        foreach ($request->genre_id as $value){
//            $data['genre_id']=$value[0];
//        }
        $data['category_id']=$request->category_id;
        $data['country_id']=$request->country_id;

        if($request->hasFile('image_path')){


            $file = $request->file('image_path');
            if (!empty($file)){
                $movie = Movie::find($id);
                $image_path =$movie->image_path;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $file_name = $file->getClientOriginalName();
            $ext = $file->extension();
            $fileZise = $file->getSize();
            if(strcasecmp($ext,'jpg') == 0 || strcasecmp($ext,'jpeg') == 0 || strcasecmp($ext,'png') == 0 ){
                if ($fileZise <= 7000000){
                    $image = random_int(0,999).$file_name;
//                    $path =$file->storeAs('public/images',$file_name);
                    $file->move('upload/images',$image);
                    $data['image_path']='upload/images/'.$image;
//                    $data['image_path']=storage::url($path);
                }
            }
        }

        Movie::where('id',$id)->update($data);
        $movie = Movie::find($id);
        $movie->genreMovie()->sync($request->genre_id);
        return redirect()->route('movie.index')->with('status','Cập nhật phim thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $image_path =$movie->image_path;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $movie->delete();
        return redirect()->route('movie.index')->with('status','Xóa phim thành công');
    }
}
