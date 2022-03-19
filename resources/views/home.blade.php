@extends('layouts.app')

@section('content')



    <div class="wrap-home">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h5>Hillocks Hotel & Spa</h5>
                    <h2>Finest Luxury Hotels & Resort</h2>
                    <div class="divider"></div>
                    <p>
                        {!! $home->short_description !!}
                    </p>
                </div>
            </div>

            <div class="direct-book" style="background: url({!! asset('image/directbook.jpg') !!})">
                <div class="direct-book-overlay">
                    <div class="row">
                        <div class="col-md-5">
                            <h3>Booking your stay now</h3>
                        </div>
                        <div class="col-md-2">
                            <div class="direct-book-call"
                                 style="background: url({!! asset('image/call.png') !!})"></div>
                        </div>
                        <div class="col-md-5">
                            <h3>Direct Call +855 95 345 676</h3>
                        </div>
                    </div>
                </div>
            </div>


            <div class="title-container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>
                            Suite & Villa
                        </h3>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>


            <div class="home-room-container">
                <div class="row room-row">
                    <div class="owl-carousel owl-theme" id="news-slider">
                        @foreach($rooms as $item)
                            <div class="p-1">
                                <a href="{!! route('room',['slug'=>\Illuminate\Support\Str::slug($item->name) ]) !!}">
                                    <div class="room-item">

                                        <div class="room-item-thumb"
                                             style="background: url({!!asset('image/room/'. $item->photo) !!})">
                                            <div class="price-tag hl-bg">
                                                <small>
                                                    From <b>${!! $item->price !!}</b>/night
                                                </small>
                                            </div>
                                            <div class="room-item-overlay">
                                                <h3>{!! $item->name !!}</h3>
                                                {{--<div class="desc">
                                                    <p>Hillocks Hotel & Spa, an upscale luxury boutique Hotel located </p>
                                                </div>--}}

                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="home-spa-container" style="background: url({!! asset('image/menu/'.$spa->photo) !!})">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6"></div>

                <div class="col-md-6 float-right">
                    <div class="spa-desc">
                        <h3>{!! $spa->name !!}</h3>
                        <p>{!! $spa->short_description !!}</p>
                        <a href="{!! route('welcome',['slug'=>$item->slug]) !!}" class="btn btn-view hl-bg">View
                            More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $r = \App\Models\MenuBar::find(9);

    ?>

    <div class="container">
        <div class="home-restaurant">
            <div class="row">
                <div class="col-md-7">
                    <h6>RESTAURANT & BAR</h6>
                    <h3>Deliciously From
                        Our Chefs</h3>
                    <p>
                        {!! $r->description !!}
                    </p>
                </div>
                <div class="col-md-5">
                    <div class="thumb" style="background: url({!! asset('image/menu/'.$r->photo) !!})"></div>
                </div>
            </div>
        </div>
    </div>




    <div class="container">
        <div class="title-container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>
                        our feature
                    </h3>
                    <div class="divider"></div>
                </div>
            </div>
        </div>

        <?php
        $menu = \App\Models\MenuBar::where('show_home', 'Yes')->get();
        ?>

        <div class="row room-row">
            @foreach($menu as $item)
                <div class="col-md-3 p-0 col-6">
                    <div class="feature-item">
                        <a href="{!! route('welcome',['slug'=>\Illuminate\Support\Str::slug($item->slug)]) !!}">
                            <div class="feature-thumb"
                                 style="background: url({!! asset('image/menu/'.$item->feature_photo)  !!})">
                                <div class="feature-overlay">
                                    <h4>{!! $item->name !!}</h4>
                                    <p class="sub-title">Experiences</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')

@stop
