<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{!! \Artesaos\SEOTools\Facades\SEOMeta::generate(true) !!}
{!! \Artesaos\SEOTools\Facades\OpenGraph::generate(true) !!}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/OwlCarousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles.css') }}" rel="stylesheet">
    @yield('meta-js')
    @yield('css')

</head>
<body>

@php

    $menubars=\App\Models\MenuBar::orderBy('id','ASC')->get();

$setting=\App\Models\Setting::find(1);

@endphp
<div class="main-header">


    {{--    <div class="top-header">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-3">
                        <a href="https://kitchencafeso.com/vn5rf6nefz?key=20a5e7f0b1dfa54940c9d4b9541085cc">
                            <img src="{!! asset('image/setting/'.$setting->logo) !!}" class="w-50">
                        </a>
                    </div>
                </div>
            </div>
        </div>--}}
    <nav class="navbar navbar-expand-lg hl-bg-tran">
        <div class="container-fluid">
            <a class="navbar-brand" href="{!! route('home') !!}"
               data-abc="true">
                <img src="{!! asset('image/setting/'.$setting->logo) !!}" class="scroll-logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                    aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon" style="background: url({!! asset('image/download.svg') !!})"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav ml-auto">
                    @foreach($menubars as $item)
                        <li class="nav-item"><a class="nav-link"
                                                href="{!! route('welcome',['slug'=>\Illuminate\Support\Str::slug($item->slug)]) !!}"
                                                data-abc="true">{!! $item->icon !!} {!! $item->name !!}</a>
                        </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</div>
<?php
$slides = \App\Models\Slide::all();
$i = 1;
$x = 0;
?>
<div class="">


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        {{--<ol class="carousel-indicators">
            @foreach($slides as $item)
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class=" @if($x==0) active @endif"></li>
                @php($x++)
            @endforeach
        </ol>--}}
        <div class="carousel-inner">
            @foreach($slides as $item)
                <div class="carousel-item  @if($i==1) active @endif">
                    <div class="d-block w-100 overlay">
                        {{--                    <img class="d-block w-100" src="{!! asset('image/gallery/'.$item->photo) !!}" alt="First slide">--}}
                        <div class="thumb"
                             style="background: url({!! asset('image/gallery/'.$item->photo) !!})"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3>Hillocks Hotel and Spa</h3>
                        <p>An Upscale Luxury Boutique Hotel, Siem Reap, Cambodia.</p>
                    </div>
                </div>
                @php($i++)
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

        <a href="#" class="scroll-down" address="true"></a>
    </div>


    <div class="reservation-form">
        <div class="container">
            <div class="row">
                <div class="col-md-2 p-0">
                    <h6>FAST & EASY CONFIRMATION</h6>
                </div>
                <div class="col-md-2 p-1">
                    <div class="form-group check-form">
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="Recipient's username"
                                   aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i
                                        class="fas fa-calendar-alt"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 p-1">
                    <div class="form-group check-form">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Recipient's username"
                                       aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i
                                        class="fas fa-calendar-alt"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 p-1">

                    <div class="form-group">
                        <div class="input-group">
                            <select name="numofadult" class="form-control input-select selectpicker clickable"
                                    placeholder="2 Adults" required="">
                                <option value="1">1 Adult</option>
                                <option value="2" selected="">2 Adults</option>
                                <option value="3">3 Adults</option>
                                <option value="4">4 Adults</option>
                                <option value="5">5 Adults</option>
                                <option value="6">6 Adults</option>
                                <option value="7">7 Adults</option>
                                <option value="8">8 Adults</option>
                                <option value="9">9 Adults</option>
                                <option value="10">10 Adults</option>
                                <option value="11">11 Adults</option>
                                <option value="12">12+ Adults</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 p-1">
                    <div class="form-group">
                        <select name="numofchild" class="form-control input-select selectpicker clickable"
                                placeholder="0 Children" required="">
                            <option value="0" selected="">0 Children</option>
                            <option value="1">1 Children</option>
                            <option value="2">2 Children</option>
                            <option value="3">3 Children</option>
                            <option value="4">4 Children</option>
                            <option value="5">5 Children</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-1 p-1">
                    <div class="form-group">
                        <select name="numofroom" class="form-control input-select selectpicker clickable"
                                placeholder="1 Room" required="">
                            <option value="1" selected="">1 Room</option>
                            <option value="2">2 Rooms</option>
                            <option value="3">3 Rooms</option>
                            <option value="4">4 Rooms</option>
                            <option value="5">5 Rooms</option>
                            <option value="6">6 Rooms</option>
                            <option value="7">7 Rooms</option>
                            <option value="8">8 Rooms</option>
                            <option value="9">9 Rooms</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <button type="submit" class="btn  btn-check">Check Best Rate</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@yield('content')


<div class="book-botton-container">

    <div class="container">
        <div class="row text-center">
            <div class="col p-0">
                <a href="">
                    <div class="book-box">
                        <i class="fas fa-calendar-alt"></i>
                        <p>Book Now</p>
                    </div>
                </a>

            </div>
            <div class="col p-0">
                <a href="">
                    <div class="call-box">
                        <i class="fa fa-phone-alt"></i>
                        <p>Call Now</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="footer-container" style="background: url({!! asset('image/spa.jpg') !!})">
    <div class="overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center">
                    <a href="#">
                        <img src="{!! asset('image/setting/'.$setting->logo) !!}" class="w-50">
                    </a>
                </div>
                <div class="col-md-3">
                    <h3>Address</h3>
                    <p>{!! $setting->company_address !!}</p>
                </div>
                <div class="col-md-3">
                    <h3>Reservation</h3>
                    <p><i class="fas fa-phone-alt"></i>
                        <span class="phone-contact-1">{!! $setting->company_contact !!}</span> <br>
                        <span class="phone-contact-2">{!! $setting->contact_2 !!}</span>

                    </p>
                    <p><i class="far fa-envelope"></i> {!! $setting->from_email !!}</p>
                </div>
                <div class="col-md-3">
                    <h3>Follow Us</h3>
                    <div class="social-medial">
                        <p>
                            <a href=""> <i class="fab fa-facebook"></i></a>
                            <a href=""> <i class="fab fa-telegram-plane"></i></a>
                            <a href=""> <i class="fab fa-instagram"></i></a>

                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="hl-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center">© 2022 Copy Right <a href="">{!! $setting->from_name !!}</a></p>
            </div>
        </div>


    </div>
</footer>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
<script src="{!! asset('assets/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! asset('assets/OwlCarousel/dist/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('assets/js/jquery.justified.min.js') !!}"></script>
<script src="{!! asset('assets/js/script.js') !!}"></script>

<script>
    $(document).ready(function () {

        $('#carouselExample').on('slide.bs.carousel', function (e) {

            var $e = $(e.relatedTarget);
            var idx = $e.index();
            var itemsPerSlide = 6;
            var totalItems = $('.carousel-item').length;

            console.log(totalItems);
            if (idx >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - idx);
                for (var i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $('.carousel-item').eq(i).appendTo('.carousel-inner');
                    } else {
                        $('.carousel-item').eq(0).appendTo('.carousel-inner');
                    }
                }
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            /////// Prevent closing from click inside dropdown
            document.querySelectorAll('.dropdown-menu').forEach(function (element) {
                element.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            })
        });

    });

</script>
@yield('js')
{{--<script type='text/javascript' src='//kitchencafeso.com/cd/51/43/cd51434cc6fd6f3ff4bb3314ba867e90.js'></script>--}}
</body>
</html>
