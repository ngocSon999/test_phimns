@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="card">
                    @if(isset($category))
                        <h4 class="card-header alert alert-primary text-center">Sửa danh mục phim</h4>
                    @else
                        <h4 class="card-header alert alert-primary text-center">Thêm danh mục phim</h4>
                    @endif


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    @if(isset($category))
                        <?php $id = $category->id;?>
                        {!! Form::open(['method'=>'PUT', 'route'=>['category.update',$id]]) !!}
                    @else
                        {!! Form::open(['method'=>'post', 'route'=>'category.store']) !!}
                    @endif
                    <div class="form-group">
                        {!! form::label('title','Tên danh mục phim',[]) !!}
                        {!! form::text('title',isset($category)? $category->title: '',['class'=>'form-control','placeholder'=>'Nhập nội dung...','id'=>'title']) !!}
                        @error('title')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('description','Mô tả',[]) !!}
                        {!! form::textarea('description',isset($category)? $category->description: '',['class'=>'form-control','rows'=>3,'placeholder'=>'Nhập nội dung...','id'=>'description']) !!}
                        @error('description')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! form::label('status','Trạng thái',[]) !!}
                        {!! form::select('status',['1'=>'Hiển thị','0'=>'Chưa hiển thị'],isset($category)?$category->status:null,['class'=>'form-control']) !!}
                    </div>
                        @if(isset($category))
                            {!! Form::submit('Cập nhật',['class'=>'btn btn-success bnt-sm']) !!}
                        @else
                            {!! Form::submit('Thêm mới',['class'=>'btn btn-success bnt-sm']) !!}
                        @endif

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
