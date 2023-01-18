<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
                 <!-- jquery ui -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- datatables.net -->
    <link rel="stylesheet" href="///cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                                        Logout
                                    </a>
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">abc</a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if(Auth::user())
                    @include('layouts.navbar')
                @endif
            </div>
            @yield('content')
        </main>
    </div>



    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- jquery ui -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- datatables.net -->
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <!-- jquery ui -->
    <script>
        $( function() {
            $(".order_position").sortable({
                placeholder: 'ui-state-highlight',
                update: function (event,ui){
                    var array_id = [];
                    $('.order_position tr').each(function (){
                        array_id.push($(this).attr('id'));
                    });
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
                        },
                        url:'{{route('resorting')}}',
                        type:'post',
                        data:{array_id:array_id},
                        success:function(){
                            alert('Sắp xếp thứ tự danh mục phim thành công');
                        }
                    })
                }
            });
        });
    </script>
    <!-- datatables.net -->
    <script>
        $(document).ready( function () {
            $('#movie_table').DataTable({
            });
        } );
    </script>
    <!--Thay đổi phim theo năm-->
    <script>
        $('.select-year').change(function(){
            let year = $(this).find(':selected').val();
            let movie_id = $(this).attr('id');
            $.ajax({
                url: '{{route('update_year_movie')}}',
                type:'GET',
                data:{year:year,movie_id:movie_id},
                success: function(){
                    alert('Thay đổi năm phim '+year+' thành công');
                }
            })
        })
    </script>
    <!--Thay đổi top-view-->
    <script>
        $('.select-top-view').change(function(){
            let top_view = $(this).find(':selected').val();
            let movie_id = $(this).attr('id');
            $.ajax({
                url: '{{route('update_top_view')}}',
                type:'GET',
                data:{top_view:top_view,movie_id:movie_id},
                success: function(){
                    alert('Thay đổi top phim theo '+top_view+' thành công');
                }
            })
        })
    </script>
    <script>
        $('.select-season').change(function(){
            let season_movie = $(this).find(':selected').val();
            let movie_id = $(this).attr('id');
            $.ajax({
                url: '{{route('update_season_movie')}}',
                type:'GET',
                data:{season_movie:season_movie,movie_id:movie_id},
                success: function(){
                    alert('Thay đổi mùa phim theo '+season_movie+' thành công');
                }
            })
        })
    </script>


    <!--Thêm tập phim-->
    <script type="text/javascript">
        $(document).on('change','.select-episode-movie',function (){
            var movie_id = $(this).find(':selected').val();
           $.ajax({
               url:'{{route('movie_episode')}}',
               type:'get',
               data:{movie_id:movie_id},
               success:function (res){
                   $('.episode-movie').html(res);
               }
           })
        })
    </script>
</body>
</html>
