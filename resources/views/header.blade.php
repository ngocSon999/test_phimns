<header id="header">
    <div class="container">
        <div class="row" id="headwrap">
            <div class="col-md-6">
                <a class="logo" href="{{route('home_pages')}}" title="PhimNS">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAilBMVEX/////AAD/WVn/sbH/nJz/8fH/Kir/4uL/3t7/zs7/xsb/YGD/7e3/GBj/9fX/y8v/trb/19f/PT3/oaH/jIz/goL/fX3/c3P/bm7/paX/NDT/Dg7/SEj/+vr/wcH/vLz/VFT/IiL/aGj/k5P/UFD/LS3/X1//iYn/gID/Ojr/srL/nZ3/RUX/d3eHgOMVAAAEkklEQVR4nO2d22KiQAyGWdQFBRE84QnBc9ut7/96i9tuz4ZBAiPh/+560Zn8LTCTZCYxDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAzSPyOq5l2UHQ7XYHg9469lut+ai9241Pk+k5nG23W8c5mmaSJKZ5dJz051l4nk5O492uPZq3Wn687g0G6W8HgW1ZbseLdKqJPNcKuuu4Nd9NQmf/PFwcNpv+8hcfy/5mc1gMn/dOONnNW/G6G1iuF5Ws2nPtgZ9qmiVDXjnKoofJLNXrD2zX4xbXsf3TcVG9qmssF8eTb3eY1LlxOLwfbR9ZDs+xW1Re1Nv2dQsh6W97hV7OONGtQIEkvllfJ9RtvCLhjW9k76DbcmUOvVsE+rrNzsU8v8C2bptz0pYuMPd/saXb3hvw8wgMdFt7E4G6QG+l29ibWKnvVk+6bb2Rk+xn9IKtqPBBt6E386Am0LpPT0KFpaWksH5L4Ttq6349P6QvrJQeUt1WFkLlMX3SbWQhWgoKJ7qNLITK13Sv28hCrLJjGu59x2Wy6GeHpga6bSxItrf/R7eJBcleEesSfbpGmCUwqvN6f2Gf9anxfus2sSC/s5zEGm+7X8jcfHd1W1iYbobCWLeBhcmK8Y90G1iYUYbCqW4DCzPNUHjUbWBhjhkKh7oNLMwwQ2Hdl8N0QaQFdlg9Cy1ra59OJvKGMEx/wTqeGvSSzxsMNo1oV727SacveqxzmZen4sw6pAK0h8ibVTP/jTmo2F2hg1G80WDzddSnSk8E0D7wmHWu/wqNzrjCz+qYVMi7aTPfB7ZnrCNT0Ns2XjvMj0P3nlnHvs6MVOiwzmV+HnxezYbJIRXynvL6otBwK0kuJ6RC3g/7V4XpjoL3IfkRMv8UPbLO9V2hYaxL38g9UtG2iHf6nxQa3mjDOsk3FpRC5ljijwrT17HcQAIZT+xsWOe6ojB9HctMcG0o94k58XRVoWGU6FeR6SeXd3NFKDS80vyqJaWQOYdPKUwnKysJRLnAlSosza+6I4WpP1rGRo5SaPNOla3QcEvwq6jTbcxn9hQUpn/VLe+kdKCGOfOkpJDfr6KyT7yBKFWFRjTfcE5LhaKYc2uqCtPXkfOcEpVf06Yw/QSYbNNSCplvkeRRmP55ubJC1KF95ksI+RSmfhXPRo4KmM5ZZngjp0KuADl1t0S3wtQChg3APSss/38o/z2U/y2Vvx7K39PI35fK9y3k+4fyfXz5cRrE2nJyh/FS+TFv+XkL+bkn+flD+Tlg+Xl8+WcxGnCeRv6ZKPnn2uSfTZR/vlT+GWH557zln9WXf99C/p0Z+fee5N9da8D9Q/l3SOXfA5Z/l1v+fXz5NRXk18WQX9tEfn0a+TWGGlAnSn6tL/n12uTX3GtA3UT5tS/l1y+VX4O2AXWEa7z5VqwFLb+eN/fptgpR7h0gvq5+A3oj1LR3QI7+Fg3oUVLHRTF3t6C6SczdK6gB/Z4a0LOrAX3XDPm984wG9D+8ILyH5Suy+5C+IbqX7GfE9gOmVYvq6QwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQBd/AeVenzu8wDl+AAAAAElFTkSuQmCC" alt="">
                    <p>PhimNS</p>
                </a>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <form action="{{route('search_movie')}}" method="get" class="col-12">
                        <input type="text" name="search" id="movie-search"
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
                                @foreach($countries as $key=>$item)
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
        <div class="collapse navbar-collapse" id="search-form">
            <div id="mobile-search-form" class="halim-search-form"></div>
        </div>
        <div class="collapse navbar-collapse" id="user-info">
            <div id="mobile-user-login"></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row fullwith-slider"></div>
</div>
