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
    <link href="{{ asset('assets/flex/flexslider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/styles.css') }}" rel="stylesheet">
    @yield('meta-js')

    <style>
        .content-wrapper {
            position: relative;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background-color: #161616;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: calc(100% + 50px) auto;
            height: 100vh;
            transition: all 0.5s;
            width: 100%;
        }

        .home-overlay {
            padding-top: 25vh;
            text-align: center;
            height: 100vh;
            background: #0000009c;
        }

        .home-search-form {
            background: #00000059;
            padding: 30px 15px 15px 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="content-wrapper" style="background: url({!! asset('image/skyscrapers-sunset.jpg') !!}) no-repeat center">
    <div class="home-overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <a href="{!! route('home') !!}"> <img src="{!! asset('image/battambangpost.png') !!}" class="w-100"></a>
                </div>
            </div>
            <div class="home-search-form mt-5">
                <div class="row justify-content-center">

                    <?php
                    $category = \App\Models\Category::pluck('name_kh', 'id');
                    $provinces = \App\Models\Province::pluck('name_kh', 'id');
                    ?>
                    <div class="col-md-12">
                        <h4 class="text-white mb-3">ស្វែងរកអចលនទ្រព្យនៅកម្ពុជា</h4>
                        {{ Form::open(array('route' => 'home','method'=>'get')) }}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">

                                        {!! Form::select('category',$category,null,['class'=>'form-control','placeholder'=>'រើសរើសប្រភេទអចលនទ្រព្យ']) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::select('province',$provinces,null,['class'=>'form-control','placeholder'=>'រើសរើសប្រភេទអចលនទ្រព្យ']) !!}

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i> ចូលមើល</button>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-success w-100 "><i class="fa fa-plus"></i> ដាក់លក់</button>
                                    </div>

                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{!! asset('assets/js/jquery.min.js') !!}"></script>
<script src="{!! asset('assets/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! asset('assets/js/readmore.min.js') !!}"></script>
<script src="{!! asset('assets/flex/jquery.flexslider.js') !!}"></script>
</body>
</html>
