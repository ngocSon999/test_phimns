<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryList = Category::orderBy('position','ASC')->get();
        return view('admis.category.index',compact('categoryList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admis.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'slug'=>Str::slug($request->title),
        ]);
        $category->position = $category->id - 1;
        $category->save();
        return redirect()->route('category.index')->with('status','Thêm danh mục phim thành công');
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
        $category = Category::find($id);
        return view('admis.category.form',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        Category::where('id',$id)->update([
           'title'=>$request->title,
           'description'=>$request->description,
           'status'=>$request->status,
           'slug'=>Str::slug($request->title),
        ]);
        return redirect()->route('category.index')->with('status','Cập nhật danh mục phim thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return back()->with('status','Xóa danh mục phim thành công');
    }

    public function resorting(Request $request){
        $data = $request->all();
        foreach ($data['array_id'] as $key=>$value){
            $category = Category::find($value);
            $category->position = $key;
            $category->save();
        }
    }
}
