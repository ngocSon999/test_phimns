@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <!--slider-->
        @include('pages.include.homepages.slider')
        <!--main-->
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            @foreach($categories as $key=>$category)
                <section id="halim-advanced-widget-2">
                    <div class="section-heading">
                        <a href="">
                            <span class="h-text">{{$category->title}}</span>
                        </a>
                    </div>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                        @foreach($category->movie as $item)
                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                <div class="halim-item">
                                    <a title="{{$item->title}}" class="halim-thumb"
                                       href="{{route('movie',['slug'=>$item->slug,'id'=>$item->id])}}">
                                        <figure><img class="lazy img-responsive"
                                                     src="{{asset($item->image_path)}}"
                                                     alt="{{$item->title}}"
                                                     title="{{$item->title}}">
                                        </figure>
                                        <span class="status">{{$item->resolution}}</span>
                                        <span class="episode">
                                            <span>Phần: {{$item->season}}</span>
                                            <i class="fa fa-play" aria-hidden="true"></i>
                                            @if($item->vietsub == 0)
                                                Phụ đề
                                            @elseif($item->vietsub == 1)
                                                Thuyết Minh
                                            @endif
                                        </span>
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
                </section>
                <div class="clearfix"></div>
            @endforeach
        </main>
        <!-------endmain-------->
        <!--sidebar-->
        @include('pages.include.sidebar')
    </div>
@endsection



@section('js')
    <script>
        $(document).ready(function ($) {
            var owl = $('#halim_related_movies-2');
            owl.owlCarousel({
                loop: true, margin: 5, autoplay: true, autoplayTimeout: 3000,
                autoplayHoverPause: true, nav: true, navText: ['<i class="hl-down-open rotate-left"></i>',
                    '<i class="hl-down-open rotate-right"></i>'],
                responsiveClass: true, responsive: {0: {items: 2}, 480: {items: 3}, 600: {items: 4}, 1000: {items: 5}}
            })
        });
    </script>
@endsection


















































{{--@extends('layout')--}}
{{--@section('content')--}}
{{--    <div class="row container" id="wrapper">--}}
{{--        <!--slider-->--}}
{{--        @include('pages.include.homepages.slider')--}}
{{--        <!--main-->--}}
{{--        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">--}}
{{--            @foreach($categories as $key=>$category)--}}
{{--                <section id="halim-advanced-widget-2">--}}
{{--                    <div class="section-heading">--}}
{{--                        <a href="">--}}
{{--                            <span class="h-text">{{$category->title}}</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">--}}
{{--                        @foreach($category->movie as $item)--}}
{{--                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">--}}
{{--                                <div class="halim-item">--}}
{{--                                    <a title="{{$item->title}}" class="halim-thumb"--}}
{{--                                       href="{{route('movie',['slug'=>$item->slug,'id'=>$item->id])}}">--}}
{{--                                        <figure><img class="lazy img-responsive"--}}
{{--                                                     src="{{asset($item->image_path)}}"--}}
{{--                                                     alt="{{$item->title}}"--}}
{{--                                                     title="{{$item->title}}">--}}
{{--                                        </figure>--}}
{{--                                        <span class="status">{{$item->resolution}}</span>--}}
{{--                                        <span class="episode">--}}
{{--                                            <span>Phần: {{$item->season}}</span>--}}
{{--                                            <i class="fa fa-play" aria-hidden="true"></i>--}}
{{--                                            @if($item->vietsub == 0)--}}
{{--                                                Phụ đề--}}
{{--                                            @elseif($item->vietsub == 1)--}}
{{--                                                Thuyết Minh--}}
{{--                                            @endif--}}
{{--                                        </span>--}}
{{--                                        <div class="icon_overlay"></div>--}}
{{--                                        <div class="halim-post-title-box">--}}
{{--                                            <div class="halim-post-title ">--}}
{{--                                                <p class="entry-title">{{$item->title}}</p>--}}
{{--                                                <p class="original_title">My Roommate Is a Gumiho</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </article>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--                <div class="clearfix"></div>--}}
{{--            @endforeach--}}
{{--        </main>--}}
{{--        <!-------endmain-------->--}}
{{--        <!--sidebar-->--}}
{{--        @include('pages.include.sidebar')--}}
{{--    </div>--}}
{{--@endsection--}}



{{--@section('js')--}}
{{--    <script>--}}
{{--        $(document).ready(function ($) {--}}
{{--            var owl = $('#halim_related_movies-2');--}}
{{--            owl.owlCarousel({--}}
{{--                loop: true, margin: 5, autoplay: true, autoplayTimeout: 3000,--}}
{{--                autoplayHoverPause: true, nav: true, navText: ['<i class="hl-down-open rotate-left"></i>',--}}
{{--                    '<i class="hl-down-open rotate-right"></i>'],--}}
{{--                responsiveClass: true, responsive: {0: {items: 2}, 480: {items: 3}, 600: {items: 4}, 1000: {items: 5}}--}}
{{--            })--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
