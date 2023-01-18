<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <link rel="shortcut icon"
          href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png"
          type="image/x-icon"/>
   
    <title>Xem PhimNS</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
    <link rel='stylesheet'  href='{{asset('css/bootstrap.min.css')}}'/>
    <link rel='stylesheet'  href='{{asset('css/style.css')}}'/>
    
    <script type='text/javascript' src='{{asset('js/jquery.min.js')}}'></script>
    <!--cắt ra Link ccs của theme-->
    <link rel="stylesheet" href="{{asset('frontend/layout/style.css')}}">
    <style>
        ul#result-search {
            position: absolute;
            z-index: 999;
            background: #1b2d3c;
            width: 88%;
            padding: 10px;
            margin: 1px;
        }
    </style>
</head>
<body class="home blog halimthemes halimmovies" data-masonry="">
<header id="header">
    <div class="container">
        <div class="row" id="headwrap">
            <div class="col-sm-6">
                <a class="logo" href="" title="phim hay">
                    <img id="img-header"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAilBMVEX/////AAD/WVn/sbH/nJz/8fH/Kir/4uL/3t7/zs7/xsb/YGD/7e3/GBj/9fX/y8v/trb/19f/PT3/oaH/jIz/goL/fX3/c3P/bm7/paX/NDT/Dg7/SEj/+vr/wcH/vLz/VFT/IiL/aGj/k5P/UFD/LS3/X1//iYn/gID/Ojr/srL/nZ3/RUX/d3eHgOMVAAAEkklEQVR4nO2d22KiQAyGWdQFBRE84QnBc9ut7/96i9tuz4ZBAiPh/+560Zn8LTCTZCYxDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAzSPyOq5l2UHQ7XYHg9469lut+ai9241Pk+k5nG23W8c5mmaSJKZ5dJz051l4nk5O492uPZq3Wn687g0G6W8HgW1ZbseLdKqJPNcKuuu4Nd9NQmf/PFwcNpv+8hcfy/5mc1gMn/dOONnNW/G6G1iuF5Ws2nPtgZ9qmiVDXjnKoofJLNXrD2zX4xbXsf3TcVG9qmssF8eTb3eY1LlxOLwfbR9ZDs+xW1Re1Nv2dQsh6W97hV7OONGtQIEkvllfJ9RtvCLhjW9k76DbcmUOvVsE+rrNzsU8v8C2bptz0pYuMPd/saXb3hvw8wgMdFt7E4G6QG+l29ibWKnvVk+6bb2Rk+xn9IKtqPBBt6E386Am0LpPT0KFpaWksH5L4Ttq6349P6QvrJQeUt1WFkLlMX3SbWQhWgoKJ7qNLITK13Sv28hCrLJjGu59x2Wy6GeHpga6bSxItrf/R7eJBcleEesSfbpGmCUwqvN6f2Gf9anxfus2sSC/s5zEGm+7X8jcfHd1W1iYbobCWLeBhcmK8Y90G1iYUYbCqW4DCzPNUHjUbWBhjhkKh7oNLMwwQ2Hdl8N0QaQFdlg9Cy1ra59OJvKGMEx/wTqeGvSSzxsMNo1oV727SacveqxzmZen4sw6pAK0h8ibVTP/jTmo2F2hg1G80WDzddSnSk8E0D7wmHWu/wqNzrjCz+qYVMi7aTPfB7ZnrCNT0Ns2XjvMj0P3nlnHvs6MVOiwzmV+HnxezYbJIRXynvL6otBwK0kuJ6RC3g/7V4XpjoL3IfkRMv8UPbLO9V2hYaxL38g9UtG2iHf6nxQa3mjDOsk3FpRC5ljijwrT17HcQAIZT+xsWOe6ojB9HctMcG0o94k58XRVoWGU6FeR6SeXd3NFKDS80vyqJaWQOYdPKUwnKysJRLnAlSosza+6I4WpP1rGRo5SaPNOla3QcEvwq6jTbcxn9hQUpn/VLe+kdKCGOfOkpJDfr6KyT7yBKFWFRjTfcE5LhaKYc2uqCtPXkfOcEpVf06Yw/QSYbNNSCplvkeRRmP55ubJC1KF95ksI+RSmfhXPRo4KmM5ZZngjp0KuADl1t0S3wtQChg3APSss/38o/z2U/y2Vvx7K39PI35fK9y3k+4fyfXz5cRrE2nJyh/FS+TFv+XkL+bkn+flD+Tlg+Xl8+WcxGnCeRv6ZKPnn2uSfTZR/vlT+GWH557zln9WXf99C/p0Z+fee5N9da8D9Q/l3SOXfA5Z/l1v+fXz5NRXk18WQX9tEfn0a+TWGGlAnSn6tL/n12uTX3GtA3UT5tS/l1y+VX4O2AXWEa7z5VqwFLb+eN/fptgpR7h0gvq5+A3oj1LR3QI7+Fg3oUVLHRTF3t6C6SczdK6gB/Z4a0LOrAX3XDPm984wG9D+8ILyH5Suy+5C+IbqX7GfE9gOmVYvq6QwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQBd/AeVenzu8wDl+AAAAAElFTkSuQmCC" alt="">
                    <p>PhimNS</p>
                </a>
            </div>
            <div class="col-sm-6 d-none d-md-block">
                <div class="row">
                    <form action="{{route('search_movie')}}" method="get" class="col-12">
                        <input style="width:75%" type="text" name="search" id="movie-search"
                               class="" placeholder="Nhập từ tìm kiếm..."
                               autocomplete="off">
                        <button style="height: 28px" type="submit" name="search-title-movie" class="btn btn-primary btn-sm">
                            Tìm kiếm
                        </button>
                    </form>
                    <ul style="max-height: 700px;overflow-y: auto;display: none" id="result-search"
                        class="list-group"></ul>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="navbar-container">
    <div class="container">
        <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse"
                        data-target="#halim" aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <button type="button" class="navbar-toggle collapsed pull-right expand-search-form"
                        data-toggle="collapse" data-target="#search-form" aria-expanded="false">

                    <span class="hl-search" aria-hidden="true">

                    </span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="halim">
                <div class="menu-menu_1-container">
                    <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        <li class="current-menu-item active">
                            <a title="Trang Chủ" href="{{route('home_pages')}}">Trang chủ</a>
                        </li>
                        <li class="mega dropdown">
                            <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle"
                               aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach($genres as $key=>$item)
                                    <li><a title="{{$item->title}}"
                                           href="{{route('genre',['slug'=>$item->slug])}}">{{$item->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="mega dropdown">
                            <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle"
                               aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach($countries  as $key=>$item)
                                    <li><a title="{{$item->title}}"
                                           href="{{route('country',['slug'=>$item->slug])}}">{{$item->title}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="mega dropdown">
                            <a title="Năm phim" href="#" data-toggle="dropdown" class="dropdown-toggle"
                               aria-haspopup="true">Phim mới<span class="caret"></span></a>
                            <ul role="menu" class=" dropdown-menu">
                                @foreach($year_movie as $year)
                                    <li class="">
                                        <a href="{{route('year_movie',['year'=>$year->year_movie])}}"
                                           title="Phim năm {{$year->year_movie}}">{{$year->year_movie}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @foreach($categories as $key=>$item)
                            <li class="mega">
                                <a title="{{$item->title}}" href="{{route('category',['slug'=>$item->slug])}}">
                                    {{$item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container">
    @yield('content')
</div>
<div class="clearfix"></div>
<footer id="footer" class="clearfix">
    <div class="container footer-columns">
        <div class="row container">
            <p class="text-align-center">Copyright © 2023 PhimNs-abc</p>
        </div>
    </div>
</footer>
<div id='easy-top'></div>

<script type='text/javascript' src='{{asset('js/bootstrap.min.js')}}'></script>
<script type='text/javascript' src='{{asset('js/owl.carousel.min.js')}}'></script>

<script type='text/javascript' src='{{asset('js/halimtheme-core.min.js')}}'></script>

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
            navText: ['<i class="fa fa-play rotate-left"></i>', '<i class="fa fa-play rotate-right"></i>'],
            responsiveClass: true,
            responsive: {0: {items: 2}, 480: {items: 3}, 600: {items: 4}, 1000: {items: 4}}
        });
    })
</script>
<!--comment fb-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
        nonce="ZbUk7CHp">
</script>

<!--cuộn xem trailer-->
<script type='text/javascript'>
    $('.watch-trailer').click(function (e) {
        e.preventDefault();
        var aid = $(this).attr('href');
        $('html,body').animate({scrollTop: $(aid).offset().top}, 'slow');
    })
</script>

<!--top view ngay tuan thang-->
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            url: '{{route('top_movie_default')}}',
            type: 'GET',
            success: function (res) {
                $('.show-data-default').html(res);
            }
        });

        $('.filter-sidebar').click(function () {
            var href = $(this).attr('href');
            if (href == '#ngay') {
                var value = 0;
            } else if (href == '#tuan') {
                var value = 1;
            } else {
                var value = 2;
            }
            $.ajax({
                url: '{{route('top_movie')}}',
                type: 'GET',
                data: {value: value},
                success: function (res) {

                    $('.show-data-view').html(res);
                    $('.show-data-default').html('');
                }
            })
        });
    })
</script>
<!--Tìm kiếm phim file json-->
<script type="text/javascript">
    $(document).ready(function () {
        let BASE_URL = '{{URL::to('/')}}/';
        $('#movie-search').on('keyup', function () {
            $('#result-search').html('');
            let search = $(this).val();
            if (search != '') {
                $('#result-search').css('display', 'inherit');
                let expression = new RegExp(search, "i");
                $.getJSON('/json_file/movies.json', function (data) {
                    $.each(data, function (key, value) {
                        if (value.title.search(expression) != -1
                            || value.description.search(expression) != -1
                        ) {
                            let html = '<li class="list-group-item row" style="cursor:pointer;display: flex">' +
                                '<div style="width:40%" class="col-5">' +
                                '<img src="' + BASE_URL + '' + value.image_path + '" width="100%" heigth="50%" alt="">' +
                                '</div>' +
                                '<div style="width:60%;padding-left:8px" class="col-7">' +
                                '<p>' + value.title + '</p>' +
                                '|' +
                                '<p>' + value.description + '</p>' +
                                '<a href="' + BASE_URL + 'phim/' + value.slug + '/' + value.id + '">xem phim</a>' +
                                '</div>' +
                                '</li>' +
                                '<hr>';
                            $('#result-search').append(html);
                        }
                    })
                })
            } else {
                $('#result-search').css('display', 'none');
            }
        })

        $('#result-search').on('click', 'li', function () {
            let click_text = $(this).text().split('|');
            $('#movie-search').val($.trim(click_text[0]));
            $('#result-search').css('display', 'none');
        })
    })
</script>

@yield('js')
</body>
</html>































{{--<!DOCTYPE html>--}}
{{--<html lang="vi">--}}
{{--<head>--}}
{{--    <meta charset="utf-8"/>--}}
{{--    <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>--}}
{{--    <meta name="theme-color" content="#234556">--}}
{{--    <meta http-equiv="Content-Language" content="vi"/>--}}
{{--    <meta content="VN" name="geo.region"/>--}}
{{--    <meta name="DC.language" scheme="utf-8" content="vi"/>--}}
{{--    <meta name="language" content="Việt Nam">--}}


{{--    <link rel="shortcut icon"--}}
{{--          href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png"--}}
{{--          type="image/x-icon"/>--}}
{{--    <meta name="revisit-after" content="1 days"/>--}}
{{--    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'/>--}}
{{--    <title>Xem phim hay</title>--}}
{{--    <meta name="description"--}}
{{--          content="Phim hay 2021 - Xem phim hay nhất, xem phim online miễn phí, phim hot , phim nhanh"/>--}}
{{--    <link rel="canonical" href="">--}}
{{--    <link rel="next" href=""/>--}}
{{--    <meta property="og:locale" content="vi_VN"/>--}}
{{--    <meta property="og:title" content="Phim hay 2020 - Xem phim hay nhất"/>--}}
{{--    <meta property="og:description"--}}
{{--          content="Phim hay 2020 - Xem phim hay nhất, phim hay trung quốc, hàn quốc, việt nam, mỹ, hong kong , chiếu rạp"/>--}}
{{--    <meta property="og:url" content=""/>--}}
{{--    <meta property="og:site_name" content="Phim hay 2021- Xem phim hay nhất"/>--}}
{{--    <meta property="og:image" content=""/>--}}
{{--    <meta property="og:image:width" content="300"/>--}}
{{--    <meta property="og:image:height" content="55"/>--}}
{{--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://themify.me/themify-icons">--}}
{{--    <link rel='dns-prefetch' href='//s.w.org'/>--}}

{{--    <link rel='stylesheet' id='bootstrap-css' href='{{asset('css/bootstrap.min.css?ver=5.7.2')}}' media='all'/>--}}
{{--    <link rel='stylesheet' id='style-css' href='{{asset('css/style.css?ver=5.7.2')}}' media='all'/>--}}
{{--    <link rel='stylesheet' id='wp-block-library-css' href='{{asset('css/style.min.css?ver=5.7.2')}}' media='all'/>--}}
{{--    <script type='text/javascript' src='{{asset('js/jquery.min.js')}}' id='halim-jquery-js'></script>--}}
{{--    <!--cắt ra Link ccs của theme-->--}}
{{--    <link rel="stylesheet" href="{{asset('frontend/layout/style.css')}}">--}}
{{--    <style>--}}
{{--        ul#result-search {--}}
{{--            position: absolute;--}}
{{--            z-index: 999;--}}
{{--            background: #1b2d3c;--}}
{{--            width: 88%;--}}
{{--            padding: 10px;--}}
{{--            margin: 1px;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body class="home blog halimthemes halimmovies" data-masonry="">--}}
{{--<header id="header">--}}
{{--    <div class="container">--}}
{{--        <div class="row" id="headwrap">--}}
{{--            <div class="col-sm-6">--}}
{{--                <a class="logo" href="" title="phim hay">--}}
{{--                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAilBMVEX/////AAD/WVn/sbH/nJz/8fH/Kir/4uL/3t7/zs7/xsb/YGD/7e3/GBj/9fX/y8v/trb/19f/PT3/oaH/jIz/goL/fX3/c3P/bm7/paX/NDT/Dg7/SEj/+vr/wcH/vLz/VFT/IiL/aGj/k5P/UFD/LS3/X1//iYn/gID/Ojr/srL/nZ3/RUX/d3eHgOMVAAAEkklEQVR4nO2d22KiQAyGWdQFBRE84QnBc9ut7/96i9tuz4ZBAiPh/+560Zn8LTCTZCYxDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAzSPyOq5l2UHQ7XYHg9469lut+ai9241Pk+k5nG23W8c5mmaSJKZ5dJz051l4nk5O492uPZq3Wn687g0G6W8HgW1ZbseLdKqJPNcKuuu4Nd9NQmf/PFwcNpv+8hcfy/5mc1gMn/dOONnNW/G6G1iuF5Ws2nPtgZ9qmiVDXjnKoofJLNXrD2zX4xbXsf3TcVG9qmssF8eTb3eY1LlxOLwfbR9ZDs+xW1Re1Nv2dQsh6W97hV7OONGtQIEkvllfJ9RtvCLhjW9k76DbcmUOvVsE+rrNzsU8v8C2bptz0pYuMPd/saXb3hvw8wgMdFt7E4G6QG+l29ibWKnvVk+6bb2Rk+xn9IKtqPBBt6E386Am0LpPT0KFpaWksH5L4Ttq6349P6QvrJQeUt1WFkLlMX3SbWQhWgoKJ7qNLITK13Sv28hCrLJjGu59x2Wy6GeHpga6bSxItrf/R7eJBcleEesSfbpGmCUwqvN6f2Gf9anxfus2sSC/s5zEGm+7X8jcfHd1W1iYbobCWLeBhcmK8Y90G1iYUYbCqW4DCzPNUHjUbWBhjhkKh7oNLMwwQ2Hdl8N0QaQFdlg9Cy1ra59OJvKGMEx/wTqeGvSSzxsMNo1oV727SacveqxzmZen4sw6pAK0h8ibVTP/jTmo2F2hg1G80WDzddSnSk8E0D7wmHWu/wqNzrjCz+qYVMi7aTPfB7ZnrCNT0Ns2XjvMj0P3nlnHvs6MVOiwzmV+HnxezYbJIRXynvL6otBwK0kuJ6RC3g/7V4XpjoL3IfkRMv8UPbLO9V2hYaxL38g9UtG2iHf6nxQa3mjDOsk3FpRC5ljijwrT17HcQAIZT+xsWOe6ojB9HctMcG0o94k58XRVoWGU6FeR6SeXd3NFKDS80vyqJaWQOYdPKUwnKysJRLnAlSosza+6I4WpP1rGRo5SaPNOla3QcEvwq6jTbcxn9hQUpn/VLe+kdKCGOfOkpJDfr6KyT7yBKFWFRjTfcE5LhaKYc2uqCtPXkfOcEpVf06Yw/QSYbNNSCplvkeRRmP55ubJC1KF95ksI+RSmfhXPRo4KmM5ZZngjp0KuADl1t0S3wtQChg3APSss/38o/z2U/y2Vvx7K39PI35fK9y3k+4fyfXz5cRrE2nJyh/FS+TFv+XkL+bkn+flD+Tlg+Xl8+WcxGnCeRv6ZKPnn2uSfTZR/vlT+GWH557zln9WXf99C/p0Z+fee5N9da8D9Q/l3SOXfA5Z/l1v+fXz5NRXk18WQX9tEfn0a+TWGGlAnSn6tL/n12uTX3GtA3UT5tS/l1y+VX4O2AXWEa7z5VqwFLb+eN/fptgpR7h0gvq5+A3oj1LR3QI7+Fg3oUVLHRTF3t6C6SczdK6gB/Z4a0LOrAX3XDPm984wG9D+8ILyH5Suy+5C+IbqX7GfE9gOmVYvq6QwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQBd/AeVenzu8wDl+AAAAAElFTkSuQmCC" alt="">--}}
{{--                    <p>Phim hay</p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6 d-none d-md-block">--}}
{{--                <div class="row">--}}
{{--                    <form action="{{route('search_movie')}}" method="get" class="col-12">--}}
{{--                        <input style="width:75%" type="text" name="search" id="movie-search"--}}
{{--                               class="" placeholder="Nhập từ tìm kiếm..."--}}
{{--                               autocomplete="off">--}}
{{--                        <button style="height: 28px" type="submit" name="search-title-movie" class="btn btn-primary btn-sm">--}}
{{--                            Tìm kiếm--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                    <ul style="max-height: 700px;overflow-y: auto;display: none" id="result-search"--}}
{{--                        class="list-group"></ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</header>--}}


{{--<div class="navbar-container">--}}
{{--    <div class="container">--}}
{{--        <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">--}}
{{--            <div class="navbar-header">--}}
{{--                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse"--}}
{{--                        data-target="#halim" aria-expanded="false">--}}
{{--                    <span class="sr-only">Menu</span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                    <span class="icon-bar"></span>--}}
{{--                </button>--}}
{{--                <button type="button" class="navbar-toggle collapsed pull-right expand-search-form"--}}
{{--                        data-toggle="collapse" data-target="#search-form" aria-expanded="false">--}}

{{--                    <span class="hl-search" aria-hidden="true">--}}

{{--                    </span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="collapse navbar-collapse" id="halim">--}}
{{--                <div class="menu-menu_1-container">--}}
{{--                    <ul id="menu-menu_1" class="nav navbar-nav navbar-left">--}}
{{--                        <li class="current-menu-item active">--}}
{{--                            <a title="Trang Chủ" href="{{route('home_pages')}}">Trang chủ</a>--}}
{{--                        </li>--}}
{{--                        <li class="mega dropdown">--}}
{{--                            <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle"--}}
{{--                               aria-haspopup="true">Thể Loại <span class="caret"></span></a>--}}
{{--                            <ul role="menu" class=" dropdown-menu">--}}
{{--                                @foreach($genres as $key=>$item)--}}
{{--                                    <li><a title="{{$item->title}}"--}}
{{--                                           href="{{route('genre',['slug'=>$item->slug])}}">{{$item->title}}</a></li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="mega dropdown">--}}
{{--                            <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle"--}}
{{--                               aria-haspopup="true">Quốc Gia <span class="caret"></span></a>--}}
{{--                            <ul role="menu" class=" dropdown-menu">--}}
{{--                                @foreach($countries as $key=>$item)--}}
{{--                                    <li><a title="{{$item->title}}"--}}
{{--                                           href="{{route('country',['slug'=>$item->slug])}}">{{$item->title}}</a></li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="mega dropdown">--}}
{{--                            <a title="Năm phim" href="#" data-toggle="dropdown" class="dropdown-toggle"--}}
{{--                               aria-haspopup="true">Phim mới<span class="caret"></span></a>--}}
{{--                            <ul role="menu" class=" dropdown-menu">--}}
{{--                                @foreach($year_movie as $year)--}}
{{--                                    <li class="">--}}
{{--                                        <a href="{{route('year_movie',['year'=>$year->year_movie])}}"--}}
{{--                                           title="Phim năm {{$year->year_movie}}">{{$year->year_movie}}--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        @foreach($categories as $key=>$item)--}}
{{--                            <li class="mega">--}}
{{--                                <a title="{{$item->title}}" href="{{route('category',['slug'=>$item->slug])}}">--}}
{{--                                    {{$item->title}}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--        <div class="collapse navbar-collapse" id="search-form">--}}
{{--            <div id="mobile-search-form" class="halim-search-form"></div>--}}
{{--        </div>--}}
{{--        <div class="collapse navbar-collapse" id="user-info">--}}
{{--            <div id="mobile-user-login"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="container">--}}
{{--    <div class="row fullwith-slider"></div>--}}
{{--</div>--}}
{{--@include('header')--}}
{{--<div class="container">--}}
{{--    @yield('content')--}}
{{--</div>--}}
{{--<div class="clearfix"></div>--}}
{{--<footer id="footer" class="clearfix">--}}
{{--    <div class="container footer-columns">--}}
{{--        <div class="row container">--}}
{{--            <div class="widget about col-xs-12 col-sm-4 col-md-4">--}}
{{--                <div class="footer-logo">--}}
{{--                    <img class="img-responsive"--}}
{{--                         src="https://img.favpng.com/9/23/19/movie-logo-png-favpng-nRr1DmYq3SNYSLN8571CHQTEG.jpg"--}}
{{--                         alt=""/>--}}
{{--                </div>--}}
{{--                Liên hệ:--}}
{{--                <a href="/cdn-cgi/l/email-protection" class="__cf_email__"--}}
{{--                   data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[abc@gmail.com&#160;protected]--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</footer>--}}
{{--<div id='easy-top'></div>--}}

{{--<script type='text/javascript' src='{{asset('js/bootstrap.min.js?ver=5.7.2')}}' id='bootstrap-js'></script>--}}
{{--<script type='text/javascript' src='{{asset('js/owl.carousel.min.js?ver=5.7.2')}}' id='carousel-js'></script>--}}

{{--<script type='text/javascript' src='{{asset('js/halimtheme-core.min.js?ver=1626273138')}}' id='halim-init-js'></script>--}}
{{--<!--comment fb-->--}}
{{--<div id="fb-root"></div>--}}
{{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"--}}
{{--        nonce="ZbUk7CHp">--}}
{{--</script>--}}

{{--<!--cuộn xem trailer-->--}}
{{--<script type='text/javascript'>--}}
{{--    $('.watch-trailer').click(function (e) {--}}
{{--        e.preventDefault();--}}
{{--        var aid = $(this).attr('href');--}}
{{--        $('html,body').animate({scrollTop: $(aid).offset().top}, 'slow');--}}
{{--    })--}}
{{--</script>--}}

{{--<!--top view ngay tuan thang-->--}}
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function () {--}}
{{--        $.ajax({--}}
{{--            url: '{{route('top_movie_default')}}',--}}
{{--            type: 'GET',--}}
{{--            success: function (res) {--}}
{{--                $('.show-data-default').html(res);--}}
{{--            }--}}
{{--        })--}}

{{--        $('.filter-sidebar').click(function () {--}}
{{--            var href = $(this).attr('href');--}}
{{--            if (href == '#ngay') {--}}
{{--                var value = 0;--}}
{{--            } else if (href == '#tuan') {--}}
{{--                var value = 1;--}}
{{--            } else {--}}
{{--                var value = 2;--}}
{{--            }--}}
{{--            $.ajax({--}}
{{--                url: '{{route('top_movie')}}',--}}
{{--                type: 'GET',--}}
{{--                data: {value: value},--}}
{{--                success: function (res) {--}}

{{--                    $('.show-data-view').html(res);--}}
{{--                    $('.show-data-default').html('');--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}
{{--<!--Tìm kiếm phim file json-->--}}
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function () {--}}
{{--        let BASE_URL = 'http://127.0.0.1:8000/'--}}
{{--        let movie = 'phim/'--}}
{{--        $('#movie-search').on('keyup', function () {--}}
{{--            $('#result-search').html('');--}}
{{--            let search = $(this).val();--}}
{{--            if (search != '') {--}}
{{--                $('#result-search').css('display', 'inherit');--}}
{{--                let expression = new RegExp(search, "i");--}}
{{--                $.getJSON('/json_file/movies.json', function (data) {--}}
{{--                    $.each(data, function (key, value) {--}}
{{--                        if (value.title.search(expression) != -1--}}
{{--                            || value.description.search(expression) != -1--}}
{{--                        ) {--}}
{{--                            let html = '<li class="list-group-item row" style="cursor:pointer;display: flex">' +--}}
{{--                                '<div style="width:40%" class="col-5">' +--}}
{{--                                '<img src="' + BASE_URL + '' + value.image_path + '" width="100%" heigth="200px" alt="">' +--}}
{{--                                '</div>' +--}}
{{--                                '<div style="width:60%;padding-left:8px" class="col-7">' +--}}
{{--                                '<p>' + value.title + '</p>' +--}}
{{--                                '|' +--}}
{{--                                '<p>' + value.description + '</p>' +--}}
{{--                                '<a href="' + BASE_URL + 'phim/' + value.slug + '/' + value.id + '">xem phim</a>' +--}}
{{--                                '</div>' +--}}
{{--                                '</li>' +--}}
{{--                                '<hr>';--}}
{{--                            $('#result-search').append(html);--}}
{{--                        }--}}
{{--                    })--}}
{{--                })--}}
{{--            } else {--}}
{{--                $('#result-search').css('display', 'none');--}}
{{--            }--}}
{{--        })--}}

{{--        $('#result-search').on('click', 'li', function () {--}}
{{--            let click_text = $(this).text().split('|');--}}
{{--            $('#movie-search').val($.trim(click_text[0]));--}}
{{--            $('#result-search').css('display', 'none');--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}


{{--@yield('js')--}}
{{--</body>--}}
{{--</html>--}}
