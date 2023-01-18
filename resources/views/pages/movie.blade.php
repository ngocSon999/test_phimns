@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                                  <a href="{{route('category',['slug'=>$movie->category->slug])}}">{{$movie->category->title}}</a> »
                                   <a href="{{route('country',['slug'=>$movie->country->slug])}}">{{$movie->country->title}}</a> »
                                   @foreach($movie->genreMovie as $genre)
                                     <a href="{{route('genre',['slug'=>$genre->slug])}}">{{$genre->title}}</a> »
                                   @endforeach
                             <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section id="content" class="test">
                <div class="clearfix wrap-content">
                    <div class="halim-movie-wrapper">
                        <div class="title-block">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                                <div class="halim-pulse-ring"></div>
                            </div>
                            <div class="title-wrapper" style="font-weight: bold;">
                                Bookmark
                            </div>
                        </div>
                        <div class="movie_info col-xs-12">
                            <div style="height: 100%" class="movie-poster col-md-3">
                                <img class="movie-thumb" src="{{asset($movie->image_path)}}" alt="{{$movie->title}}">
                                @if($movie->resolution != 'Trailer')
                                    <div class="bwa-content">
                                        <div class="loader"></div>
                                        @php
                                            $ep = array();
                                            foreach ($movie->episode as $episode){
                                                $ep[]=$episode->episode;
                                            }
                                        @endphp
                                        <a href="{{route('watch',['slug'=>$movie->slug,'season'=>'phần-'.$movie->season,'tap'=>'tập-'.$ep[0]])}}" class="bwac-btn">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                @else
                                    <a style="display: block" href="#watch-trailer"
                                       class="btn btn-success watch-trailer">Xem trailer</a>
                                @endif
                            </div>
                            <div class="film-poster col-md-9">
                                <h1 class="movie-title title-1"
                                    style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                                <h2 class="movie-title title-2" style="font-size: 12px;">Black Widow (2021)</h2>
                                <ul class="list-info-group">
                                    <li class="list-info-group-item"><span>Trạng thái</span> : <span
                                            class="quality">{{$movie->resolution}}</span>
                                        @if($movie->resolution != 'Trailer')
                                            <span class="episode">
                                            @if($movie->vietsub == 0)
                                                    Phụ đề
                                                @elseif($movie->vietsub == 1)
                                                    Thuyết Minh
                                                @endif
                                        </span>
                                        @endif
                                    </li>
                                    <li class="list-info-group-item"><span>Thời lượng</span>
                                        : {{$movie->movie_duration}}</li>

                                    <li class="list-info-group-item"><span>Season</span> : {{$movie->season}}</li>

                                    <li class="list-info-group-item"><span>Số tập</span> : {{$movie->total_movie}}</li>
                                    <li class="list-info-group-item">
                                        @if($curent_episode != 0 && $movie->trailer != 'Trailer')
                                            <span>Tình trạng</span> : Đã cập nhật {{$curent_episode .'/'.$movie->total_movie}} tập
                                        @else
                                            <span>Tình trạng</span> : Đang cập nhật
                                        @endif

                                    </li>
                                    <li class="list-info-group-item"><span>Thể loại</span> :
                                        @foreach($movie->genreMovie as $genre)
                                            <a class="badge badge-dark" href="{{route('genre',['slug'=>$genre->slug])}}"
                                               rel="category tag">{{$genre->title}}</a>
                                        @endforeach
                                    </li>
                                    <li class="list-info-group-item"><span>Danh mục</span> :
                                        <a href="{{route('category',['slug'=>$movie->category->slug])}}"
                                            rel="category tag">{{$movie->category->title}}</a>
                                    </li>
                                    <li class="list-info-group-item"><span>Quốc gia</span> :
                                        <a href="{{route('country',['slug'=>$movie->country->slug])}}"
                                            rel="category tag">{{$movie->country->title}}
                                        </a>
                                    </li>
                                    <li class="list-info-group-item"><span>Năm</span> :
                                        <a href="{{route('year_movie',['year'=>$movie->year_movie])}}"
                                            rel="category tag">{{$movie->year_movie}}
                                        </a>
                                    </li>
                                </ul>
                                <div class="movie-trailer hidden"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                <p>{{$movie->description}}.</p>
                            </article>
                        </div>
                    </div>


                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Từ khóa tìm kiếm</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content">
                                @if($movie->tag_movie != null)
                                    @php
                                        $tags = array();
                                        if(!empty($movie->tag_movie)){
                                             $tags = explode(',',$movie->tag_movie);
                                        }
                                    @endphp
                                    @foreach($tags as $tag)
                                        <p><a href="{{route('tag_movie',['tag'=>$tag])}}">{{$tag}}</a></p>
                                    @endforeach
                                @else
                                    {{$movie->title}}
                                @endif
                            </article>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                    </div>
                    <div style="background-color: #cccccc" class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article class="">
                                @php
                                    $curent_url = Request::url();
                                @endphp
                                <div style="color:#ffffff" class="fb-comments" data-href="{{$curent_url}}"
                                     data-width="100%" data-numposts="15"></div>
                            </article>
                        </div>
                    </div>
                    @if($movie->trailer != null)
                        <div class="section-bar clearfix">
                            <h2 class="section-title"><span style="color:#ffed4d">TRAILER phim</span></h2>
                        </div>
                        <div class="entry-content htmlwrap clearfix">
                            <div class="video-item halim-entry-box">
                                <article id="watch-trailer" class="item-content">
                                    <iframe width="100%" height="315"
                                            src="https://www.youtube.com/embed/{{$movie->trailer}}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                    </iframe>
                                </article>
                            </div>
                        </div>
                    @endif
                </div>
            </section>

            <section class="related-movies">
                <div id="halim_related_movies-2xx" class="wrap-slider">
                    <div class="section-bar clearfix">
                        <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                    </div>
                    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($movie_related as $item)
                            <article class="thumb grid-item post-38498">
                                <div class="halim-item">
                                    <a class="halim-thumb"
                                       href="{{route('movie',['slug'=>$item->slug,'id'=>$item->id])}}"
                                       title="{{$item->title}}">
                                        <figure><img class="lazy img-responsive" src="{{asset($item->image_path)}}"
                                                     alt="{{$item->title}}" title="{{$item->title}}"></figure>
                                        <span class="status">{{$item->resolution}}</span>
                                        <span class="episode">
                                            <i class="fa fa-play"
                                               aria-hidden="true"></i>{{$item->category->title}}</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{$item->title}}</p>
                                                <p class="original_title">{{$item->name_eng}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>

                </div>
            </section>
        </main>
        <!--sidebar-->
        @include('pages.include.sidebar')
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var owl = $('#halim_related_movies-2');
            owl.owlCarousel({
                loop: true,
                margin: 4,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                nav: true,
                navText: ['<i class="hl-down-open rotate-left"></i>', '<i class="hl-down-open rotate-right"></i>'],
                responsiveClass: true,
                responsive: {0: {items: 2}, 480: {items: 3}, 600: {items: 4}, 1000: {items: 4}}
            });
            <!--Tăng view khi vào trang movie-->
            setTimeout(function () {
                $.ajax({
                    url: '/movie/view/increase/{{ $movie->id }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN':'{{ csrf_token() }}',
                    },
                    success: function (res) {
                        // TODO: thay doi so luot view tren giao dien bang Javascript
                        $('#loadCountView_{{ $movie->id }}').text(res.countView);
                        $.ajax({
                            url: '{{route('top_movie_default')}}',
                            type: 'GET',
                            success: function (res) {
                                $('.show-data-default').html(res);
                            }
                        })
                    },
                    error: function (xhr) {
                        //alert(xhr)
                    }
                })
            }, 15000);
        })
    </script>
@endsection
