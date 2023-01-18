@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span>
                             <a href="{{route('country',['slug'=>$country_slug->slug])}}">{{$country_slug->title}}</a> »
                            @foreach($year_movie as $value)
                                        <a title="Năm - {{$value->year_movie}}"
                                           href="{{route('year_movie',['year'=>$value->year_movie])}}">
                                  {{$value->year_movie}}
                              </a> »
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>{{$country_slug->title}}</span></h1>
                </div>
                <div class="halim_box">
                    @foreach($movies as $item)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{route('movie',['slug'=>$item->slug,'id'=>$item->id])}}" title="{{$item->title}}">
                                    <figure><img class="lazy img-responsive" src="{{asset($item->image_path)}}" alt="{{$item->title}}" title="{{$item->title}}"></figure>
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
                <div class="clearfix"></div>
                <div class="text-center">
                   {!! $movies->links() !!}
                </div>
            </section>
        </main>
        <!--sidebar-->
        @include('pages.include.sidebar')
    </div>
@endsection
