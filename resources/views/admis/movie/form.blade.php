@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    @if(isset($movie))
                        <div class="card-header alert alert-success text-center">Sửa phim</div>
                    @else
                        <div class="card-header alert alert-success text-center">Thêm phim mới</div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(isset($movie))
                        {!! Form::open(['method'=>'PUT', 'route'=>['movie.update', $movie->id],'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['method'=>'post', 'route'=>'movie.store','enctype'=>'multipart/form-data']) !!}
                    @endif
                    <div class="form-group">
                        {!! form::label('title','Tên phim',[]) !!}
                        {!! form::text('title',isset($movie)? $movie->title: '',['class'=>'form-control','placeholder'=>'Nhập nội dung...']) !!}
                        @error('title')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('name_eng','Tên tiếng anh',[]) !!}
                        {!! form::text('name_eng',isset($movie)? $movie->name_eng: '',['class'=>'form-control','placeholder'=>'Nhập nội dung...']) !!}
                        @error('name_eng')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('trailer','Trailer',[]) !!}
                        {!! form::text('trailer',isset($movie)? $movie->trailer: '',['class'=>'form-control','placeholder'=>'Nhập nội dung...']) !!}
                        @error('trailer')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('description','Mô tả',[]) !!}
                        {!! form::textarea('description',isset($movie)? $movie->description: '',['class'=>'form-control','rows'=>3,'placeholder'=>'Nhập nội dung...']) !!}
                        @error('description')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('total_movie','Số tập phim',[]) !!}
                        {!! form::text('total_movie',isset($movie)? $movie->total_movie: '',['class'=>'form-control','placeholder'=>'Nhập nội dung...']) !!}
                        @error('total_movie')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('tag_movie','Từ khóa tìm kiếm',[]) !!}
                        {!! form::textarea('tag_movie',isset($movie)? $movie->tag_movie: '',['class'=>'form-control','rows'=>3,'placeholder'=>'Nhập nội dung...']) !!}
                        @error('tag_movie')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! form::label('image','Hình ảnh',[]) !!}
                        {!! form::file('image_path',['class'=>'form-control-file']) !!}
                    </div>
                    @if(isset($movie))
                        <div class="form-control">
                            <img src="{{asset($movie->image_path)}}" width="60%" height="200px" alt="">
                        </div>
                    @endif

                    <div class="form-group">
                        {!! form::label('genre','Chọn thể loại phim',[]) !!}
                        <br>
                        @php
                            if(isset($genrechecked)){
                                $datagenreId = [];
                                foreach ($genrechecked as $value){
                                    $datagenreId[]=$value->id;
                                }
                            }
                        @endphp
                        @foreach($genres as $genre)
                            {{--                            {!! form::checkbox('genre_id[]',$genre->id,in_array($genre->id,$datagenreId,true) ? 'checked' : '') !!}--}}
                            {!! form::checkbox('genre_id[]',$genre->id,isset($genrechecked) && $genrechecked->contains($genre->id) ? true : false) !!}
                            {!! form::label('genre',$genre->title,[]) !!}
                        @endforeach
                    </div>

                    <div class="form-group">
                        {!! form::label('country','Quốc gia',[]) !!}
                         <select name="country_id" class="form-control">
                            @foreach($countries as $item)
                                <option value="{{$item->id}}" @if(isset($movie) && $movie->country_id == $item->id) selected @endif> {{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! form::label('category','Danh mục phim',[]) !!}
                       <select name="category_id" class="form-control">
                            @foreach($categories as $item)
                                <option value="{{$item->id}}" @if(isset($movie) && $movie->category_id == $item->id) selected @endif> {{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {!! form::label('status','Phim host',[]) !!}
                        {!! form::select('movie_host',['1'=>'có','0'=>'không'],isset($movie)?$movie->movie_host:null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! form::label('status','Trạng thái',[]) !!}
                        {!! form::select('status',['1'=>'Hiển thị','0'=>'Chưa hiển thị'],isset($movie)?$movie->status:null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! form::label('resolution','Định dạng',[]) !!}
                        {!! form::select('resolution',['FullHD'=>'FullHD','HD'=>'HD',
                            'SD'=>'SD','HDCam'=>'HDCam','Cam'=>'Cam','Trailer'=>'Trailer'],
                            isset($movie)?$movie->resolution:'',['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! form::label('movie_duration','Thời lượng phim',[]) !!}
                        {!! form::text('movie_duration',isset($movie)?$movie->movie_duration:null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! form::label('vietsub','Phụ đề',[]) !!}
                        {!! form::select('vietsub',['0'=>'Phụ đề','1'=>'Thuyết minh'],isset($movie)?$movie->resolution:'',['class'=>'form-control']) !!}
                    </div>
                    @if(isset($movie))
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
