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
                    <div id="count-view-episode" data-episode_id="{{$episode_movie->id}}" style="width: 100%; height: 315px">
                        <iframe style="border:none;" src="https://drive.google.com/file/d/{{$episode_movie->link_movie}}/preview"
                                width="100%" height="100%" allowfullscreen="true">
                        </iframe>
                    </div>
                    <div class="button-watch">
                        <ul class="halim-social-plugin col-xs-4 hidden-xs">
                            <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                        </ul>
                        <ul class="col-xs-12 col-md-8">
                            <div id="autonext" class="btn-cs autonext">
                                <i class="icon-autonext-sm"></i>
                                <span><i class="hl-next"></i> Autonext: <span id="autonext-status">On</span></span>
                            </div>
                            <div id="explayer" class="hidden-xs"><i class="hl-resize-full"></i>
                                Expand
                            </div>
                            <div id="toggle-light"><i class="hl-adjust"></i>
                                Light Off
                            </div>
                            <div id="report" class="halim-switch"><i class="hl-attention"></i> Report</div>
                            <div class="luotxem"><i class="hl-eye"></i>
                                <span id="loadCountViewEpisode_{{$episode_movie->id}}">{{$episode_movie->count_view}} lượt xem</span>
                            </div>
                            <div class="luotxem">
                                <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="hl-forward"></i> Share</a>
                            </div>
                        </ul>
                    </div>
                    <div class="collapse" id="moretool">
                        <ul class="nav nav-pills x-nav-justified">
                            <li class="fb-like" data-href="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                            <div class="fb-save" data-uri="" data-size="small"></div>
                        </ul>
                    </div>

                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                    <div class="title-block">
                        <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976">
                                <div class="halim-pulse-ring"></div>
                            </div>
                        </a>
                        <div class="title-wrapper-xem full">
                            <h1 class="entry-title"><a href="" title="{{$movie->title}}" class="tl">{{$movie->title}}</a></h1>
                        </div>
                    </div>
                    <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                        <article id="post-37976" class="item-content post-37976"></article>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <div id="halim-ajax-list-server"></div>
                    </div>
                    <div id="halim-list-server">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="hl-server"></i> Vietsub</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                                <div class="halim-server">
                                    <ul class="halim-list-eps">
                                        @foreach($movie->episode  as $key=>$linkitem)
                                        <a href="{{route('watch',['slug'=>$movie->slug,'season'=>'phần-'.$movie->season,'tap'=>'tập-'.$linkitem->episode])}}">
                                            <li class="halim-episode">
                                                 <span class="halim-btn halim-btn-2 {{$episode_movie->episode == $linkitem->episode ? 'active' :'' }}  halim-info-1-1 box-shadow"
                                                          data-post-id="37976" data-server="1" data-episode="1"
                                                          data-position="first" data-embed="0"
                                                          data-title="Xem phim Tôi Và Chúng Ta Ở Bên Nhau - Tập 1 - Be Together - vietsub + Thuyết Minh"
                                                          data-h1="Tôi Và Chúng Ta Ở Bên Nhau - tập 1">{{$linkitem->episode}}
                                                </span>
                                            </li>
                                        </a>
                                        @endforeach
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="htmlwrap clearfix">
                        <div id="lightout"></div>
                    </div>
                    <!--Binh luan-->
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
                                                <p class="entry-title">{{$item->name_eng}}</p>
                                                <p class="original_title"></p>
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

            setTimeout(function () {
                $.ajax({
                    {{--url: '/movie/episode/view/increase/' + {{ $episode_movie->id }},--}}
                    url: '/movie/episode/view/increase/{{ $episode_movie->id }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN':'{{ csrf_token() }}',
                    },
                    success: function (res) {
                        // TODO: thay doi so luot view tren giao dien bang Javascript
                        $('#loadCountViewEpisode_{{ $episode_movie->id }}' ).text(res.countView);
                    },
                    error: function (xhr) {
                    
                    }
                })
            },180000);
        })
    </script>
@endsection
