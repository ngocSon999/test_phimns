@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(isset($genre))
                        <div class="card-header">Sửa danh mục thể loại phim</div>
                    @else
                        <div class="card-header alert alert-primary">Quản lý danh mục thể loại phim</div>
                    @endif


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    @if(isset($genre))
                        {!! Form::open(['method'=>'PUT', 'route'=>['genre.update', $genre->id]]) !!}
                    @else
                        {!! Form::open(['method'=>'post', 'route'=>'genre.store']) !!}
                    @endif
                    <div class="form-group">
                        {!! form::label('title','title',[]) !!}
                        {!! form::text('title',isset($genre)? $genre->title: '',['class'=>'form-control','placeholder'=>'Nhập nội dung...','id'=>'title']) !!}
                        @error('title')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('description','description',[]) !!}
                        {!! form::textarea('description',isset($genre)? $genre->description: '',['class'=>'form-control','rows'=>3,'placeholder'=>'Nhập nội dung...','id'=>'description']) !!}
                        @error('description')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('Status','Status',[]) !!}
                        {!! form::select('status',['1'=>'Hiển thị','0'=>'Chưa hiển thị'],isset($genre)?$genre->status:null,['class'=>'form-control']) !!}
                    </div>
                        @if(isset($genre))
                            {!! Form::submit('Cập nhật',['class'=>'btn btn-success bnt-sm']) !!}
                        @else
                            {!! Form::submit('Thêm mới',['class'=>'btn btn-success bnt-sm']) !!}
                        @endif

                    {!! Form::close() !!}

                    <div class="alert alert-success text-center mt-4">Danh mục Thể loại phim</div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($genreList as $genre)
                            <tr>
                                <th scope="row">{{$genre->id}}</th>
                                <th scope="row">{{$genre->title}}</th>
                                <th scope="row">{{$genre->description}}</th>
                                <th scope="row">{{$genre->status === 1?'Hiển thị':'chưa hiển thị'}}</th>
                                <td class="d-flex">

                                   <span>
                                       {!! Form::open(['route' => ['genre.edit',$genre->id],'method' => 'GET']) !!}
                                       {!! Form::submit('Sửa', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                       {!! Form::close() !!}
                                   </span>
                                   <span>
                                       {!! Form::open(['route' => ['genre.destroy',$genre->id],'method' => 'DELETE', 'onsubmit'=>'return confirm("ban co muon xoa")']) !!}
                                       {!! Form::submit('Xóa', ['class' => 'btn btn-outline-warning btn-sm ml-2']) !!}
                                       {!! Form::close() !!}
                                   </span>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
