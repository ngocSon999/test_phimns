<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use Illuminate\Http\Request;
use App\Models\Movie;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listEpisode = Episode::all();
        return view('admis.episode.index',compact('listEpisode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listMovie = Movie::pluck('title','id');
        return view('admis.episode.form',compact('listMovie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data['movie_id']=$request->movie_id;
        $data['link_movie']=$request->link_movie;
        $data['episode']=$request->episode;
        Episode::create($data);
        return redirect()->route('episode.index')->with('status','Thêm phim thành công');
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
        $episode = Episode::find($id);
        $listMovie = Movie::pluck('title','id');
        return view('admis.episode.form',compact('listMovie','episode'));
    }

    /**
     * Update the specified resource in storage.
     * test::
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data['movie_id']=$request->movie_id;
        $data['link_movie']=$request->link_movie;
        Episode::where('id',$id)->update($data);
        return redirect()->route('episode.index')->with('status','Cập nhật tập phim thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Episode::find($id)->delete();
        return redirect()->route('episode.index')->with('status','Xóa tập phim thành công');
    }
}
