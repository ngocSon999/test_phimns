@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    @if(isset($episode))
                        <div class="card-header alert alert-success text-center">Sửa Tập phim</div>
                    @else
                        <div class="card-header alert alert-success text-center">Thêm tập phim mới</div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(isset($episode))
                        {!! Form::open(['method'=>'PUT', 'route'=>['episode.update', $episode->id],'enctype'=>'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['method'=>'post', 'route'=>'episode.store','enctype'=>'multipart/form-data']) !!}
                    @endif

                    <div class="form-group">
                        {!! form::label('movie','Chọn phim',[]) !!}
                        {!! form::select('movie_id',$listMovie,isset($episode)?$episode->movie_id:null,
                            ['class'=>'form-control select-episode-movie','placeholder'=>'Chọn phim...']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('link_movie','Link phim',[]) !!}
                        {!! form::textarea('link_movie',isset($episode)? $episode->link_movie: '',['class'=>'form-control',
                        'placeholder'=>'Nhập nội dung...','rows'=>3]) !!}
                        @error('link_movie')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    @if(isset($episode))
                        {!! form::label('episode','Tập phim',[]) !!}
                        {!! form::text('episode',isset($episode)? $episode->episode: '',['class'=>'form-control',
                        'disabled']) !!}
                        @error('episode')
                        <p style="color:red">{{$message}}</p>
                        @enderror
                    @else
                        <div class="form-group">
                            {!! form::label('episode','Tập phim',[]) !!}
                            <select name="episode" class="form-control col-md-8 episode-movie"></select>
                        </div>
                    @endif

                    @if(isset($episode))
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




