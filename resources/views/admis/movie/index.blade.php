@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{route('movie.create')}}" class="btn btn-success btn sm">Thêm phim</a>
                <div class="card">
                    <div class="alert alert-success text-center mt-4">Danh sách phim</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table"  id="movie_table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên phim</th>
                            <th scope="col">Tên tiếng anh</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Định dạng</th>
                            <th scope="col">Trailer</th>
                            <th scope="col">Thời lượng</th>
                            <th scope="col">Phụ đề</th>
                            <th scope="col">Từ khóa</th>
                            <th scope="col">Phim host</th>
{{--                            <th scope="col">Mô tả</th>--}}
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Quốc gia</th>
                            <th scope="col">Số tập</th>
                            <th scope="col">Năm phim</th>
                            <th scope="col">Mùa phim</th>
                            <th scope="col">Top view</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movieList as $movie)
                            <tr>
                                <th scope="row">{{$movie->id}}</th>
                                <th scope="row">{{$movie->title}}</th>
                                <th scope="row">{{$movie->name_eng}}</th>
                                <th scope="row"><img src="{{asset($movie->image_path)}}" width="100px" height="100px" alt=""></th>
                                <th scope="row">{{$movie->status == 1 ? 'Hiển thị':'chưa hiển thị'}}</th>
                                <th scope="row">{{$movie->resolution}}</th>
                                <th scope="row">{{$movie->trailer}}</th>
                                <th scope="row">{{$movie->movie_duration}}</th>
                                <th scope="row">
                                    @if($movie->vietsub == 0)
                                        Phụ đề
                                    @elseif($movie->vietsub == 1)
                                        Thuyết Minh
                                    @endif
                                </th>
                                @php
                                    $tags = array();
                                    if(!empty($movie->tag_movie)){
                                         $tags = explode(',',$movie->tag_movie);
                                    }
                                @endphp
                                <th scope="row">
                                    @foreach($tags as $value)
                                        <span>{{$value.'-'}}</span>
                                    @endforeach
                                </th>
                                <th scope="row">{{$movie->movie_host == 1 ? 'Có host':'Không host'}}</th>
{{--                                <th scope="row">{{$movie->description}}</th>--}}
                                <th scope="row">{{$movie->category->title}}</th>
                                <th scope="row">
                                @foreach($movie->genreMovie as $item)
                                    <span class="badge badge-dark">{{$item->title}}</span>
                                @endforeach
                                </th>
                                <th scope="row">{{$movie->country->title}}</th>
                                <th scope="row">{{$movie->total_movie}}</th>
                                <th scope="row">
                                    {!! Form::selectYear('year',2022,2000,isset($movie)?$movie->year_movie:'',['class'=>'select-year', 'id'=>$movie->id]) !!}
                                </th>
                                <th scope="row">
                                    {!! Form::selectRange('season',0,20,isset($movie)?$movie->season:'',['class'=>'select-season', 'id'=>$movie->id]) !!}
                                </th>
                                <th scope="row">
                                    {!! Form::select('top_view',['0'=>'ngày','1'=>'Tuần','2'=>'Tháng'],isset($movie)?$movie->top_view:'',['class'=>'select-top-view', 'id'=>$movie->id]) !!}
                                </th>
                                <td class="d-flex">
                                   <span>
                                       {!! Form::open(['route' => ['movie.edit',$movie->id],'method' => 'GET']) !!}
                                       {!! Form::submit('Sửa', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                       {!! Form::close() !!}
                                   </span>
                                    <span>
                                       {!! Form::open(['route' => ['movie.destroy',$movie->id],'method' => 'DELETE', 'onsubmit'=>'return confirm("ban co muon xoa")']) !!}
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
