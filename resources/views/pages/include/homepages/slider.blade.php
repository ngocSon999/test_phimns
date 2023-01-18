<div class="halim-panel-filter">
    <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
        <div class="ajax"></div>
    </div>
</div>
<div id="halim_related_movies-2xx" class="wrap-slider">
    <div class="section-bar clearfix">
        <h3 class="section-title"><span>PHIM HOST</span></h3>
    </div>
    <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
        @foreach($movie_host as $item)
            <article class="thumb grid-item post-38494">
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
                                <p class="entry-title">{{$item->title}}</p><p class="original_title">{{$item->name_eng}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </article>
        @endforeach
    </div>

</div>
