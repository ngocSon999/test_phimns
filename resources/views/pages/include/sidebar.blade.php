<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
                     <!--phim host-->
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim Host</span>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div style="max-height: 450px; overflow-y: auto"  id="halim-ajax-popular-post" class="popular-post">
                    @foreach($movie_host_sidebar as $movie)
                        <div class="item post-37176">
                            <a href="{{route('movie',['slug'=>$movie->slug,'id'=>$movie->id])}}"
                               title="{{$movie->title}}">
                                <div class="item-link">
                                    <img
                                        src="{{asset($movie->image_path)}}"
                                        class="lazy post-thumb" alt="{{$movie->title}}"
                                        title="{{$movie->title}}"/>
                                    <span class="is_trailer">{{$movie->resolution}}</span>
                                </div>
                                <p class="title">{{$movie->title}}</p>
                            </a>
                            <div id="loadCountView_{{$movie->id}}" class="viewsCount" style="color: #9d9d9d;">{{$movie->count_view}} lượt xem</div>
                            <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang"
                                       style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
                    <!--top phim theo ngày tuần tháng-->
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top View</span>
                <ul class="halim-popular-tab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link  filter-sidebar" id="pills-home-tab" data-toggle="pill" href="#ngay"
                           role="tab" aria-controls="pills-home" aria-selected="true">Ngày</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan"
                           role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#thang"
                           role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
                    </li>
                </ul>
            </div>
        </div>
        <section class="tab-content">
            <!--LOAD WEB-->
            <div style="max-height: 450px; overflow-y: auto"   class="popular-post show-data-default">

            </div>
            <!--KHI BAM-->
            <div role="tabpanel"  class="tab-pane active halim-ajax-popular-post" id="tuan" aria-labelledby="pills-profile-tab">
                <div style="max-height: 450px; overflow-y: auto"  id="halim-ajax-popular-post" class="popular-post show-data-view">

                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
                    <!--phim sắp chiếu-->
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim sắp chiếu</span>
            </div>
        </div>
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div style="max-height: 450px; overflow-y: auto" id="halim-ajax-popular-post" class="popular-post">
                    @foreach($movie_host_trailer as $movie)
                        <div class="item post-37176">
                            <a href="{{route('movie',['slug'=>$movie->slug,'id'=>$movie->id])}}"
                               title="{{$movie->title}}">
                                <div class="item-link">
                                    <img
                                        src="{{asset($movie->image_path)}}"
                                        class="lazy post-thumb" alt="{{$movie->title}}"
                                        title="{{$movie->title}}"/>
                                    <span class="is_trailer">{{$movie->resolution}}</span>
                                </div>
                                <p class="title">{{$movie->title}}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">{{$movie->count_view}} lượt xem</div>
                            <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang"
                                       style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
    </div>
</aside>
