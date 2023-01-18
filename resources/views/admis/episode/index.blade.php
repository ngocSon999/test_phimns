@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{route('episode.create')}}" class="btn btn-success btn-sm">Thêm mới</a>
                <div class="card">
                    <h4 class="alert alert-success text-center mt-2">Danh sách Tập phim</h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên phim</th>
                                <th scope="col">Tập phim</th>
                                <th scope="col">link phim</th>
                                <th scope="col">Demo</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($listEpisode as $episode)
                            <tr>
                                <th scope="row">{{$episode->id}}</th>
                                <th scope="row">{{$episode->movie->title}}</th>
                                <th scope="row">{{$episode->episode}}</th>
                                <th scope="row">{{$episode->link_movie}}</th>
                                 <th scope="row" style="width:200px; height: 200px">
                                    <iframe style="border:none;" src="https://drive.google.com/file/d/{{$episode->link_movie}}/preview"
                                            width="100%" height="100%" allowfullscreen>
                                    </iframe>
                                </th>
                                <td class="d-flex">
                                   <span>
                                       {!! Form::open(['route' => ['episode.edit',$episode->id],'method' => 'GET']) !!}
                                       {!! Form::submit('Sửa', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                       {!! Form::close() !!}
                                   </span>
                                    <span>
                                       {!! Form::open(['route' => ['episode.destroy',$episode->id],'method' => 'DELETE', 'onsubmit'=>'return confirm("ban co muon xoa")']) !!}
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
