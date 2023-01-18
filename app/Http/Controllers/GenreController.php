<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Support\Str;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genreList = Genre::paginate(10);
        return view('admis.genre.form',compact('genreList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreRequest $request)
    {
        Genre::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'slug'=>Str::slug($request->title),
        ]);
        return back()->with('status','Thêm danh mục thể loại phim thành công');
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
        $genre = Genre::find($id);
        $genreList = Genre::paginate(10);
        return view('admis.genre.form',compact('genreList','genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, $id)
    {
        Genre::where('id',$id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'slug'=>Str::slug($request->title),
        ]);
        return back()->with('status','Cập nhật danh mục thể loại phim thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::find($id)->delete();
        return back()->with('status','Xóa danh mục thể loại phim thành công');
    }
}
