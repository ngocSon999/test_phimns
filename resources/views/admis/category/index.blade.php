@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <a href="{{route('category.create')}}" class="btn btn-success btn-sm">Thêm mới</a>
                <div class="card">
                    <h4 class="alert alert-success text-center mt-2">Danh sách danh mục phim</h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
                        <tbody class="order_position">
                        @foreach($categoryList as $category)
                            <tr id="{{$category->id}}">
                                <th scope="row">{{$category->position}}</th>
                                <th scope="row">{{$category->title}}</th>
                                <th scope="row">{{$category->description}}</th>
                                <th scope="row">{{$category->status === 1?'Hiển thị':'chưa hiển thị'}}</th>
                                <td class="d-flex">

                                   <span>
                                       {!! Form::open(['route' => ['category.edit',$category->id],'method' => 'GET']) !!}
                                       {!! Form::submit('Sửa', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                       {!! Form::close() !!}
                                   </span>
                                    <span>
                                       {!! Form::open(['route' => ['category.destroy',$category->id],'method' => 'DELETE', 'onsubmit'=>'return confirm("ban co muon xoa")']) !!}
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
