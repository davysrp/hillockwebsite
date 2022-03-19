@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="title-container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>
                        {!! $page->name !!}
                    </h3>
                    <div class="divider"></div>
                </div>
            </div>
        </div>

        <?php
        $rooms = \App\Models\Room::all();
        $i = 1;
        $device = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile'))
        ?>

        @foreach($rooms as $item)
            <div class="page-room-item">

                <div class="row">
                    <div class="col-lg-12 p-0">
                        <div class="col-md-6
                        @if($device!=1)
                        @if($i%2==0) float-right pl-0 @else float-left pr-0 @endif @endif">
                            {{--<div class="thumb" style="background: url({!!asset('image/room/'. $item->photo) !!})">
                                <div class="overlay"></div>
                            </div>--}}
                            <?php

                            $menu_slides =\App\Models\RoomPhoto::where('room_id',$item->id)->get();
                            $y = 1;
                            ?>

                            <div id="carouselExample{!! $item->id !!}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($menu_slides as $slide)
                                        <div class="carousel-item @if($y==1) active @endif ">
                                            <img class="d-block w-100" src="{!! asset('image/room/'.$slide->photo) !!}" alt="First slide">
                                        </div>
                                        @php( $y++ )
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExample{!! $item->id !!}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample{!! $item->id !!}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6  @if($i%2==0) float-left @else float-right @endif">
                            <div class="desc">
                                <h3>{!! $item->name !!}</h3>

                                <p>
                                <ul class="ul-room-feature">
                                    <li class="feature-border">
                                        <div class="room-feature">
                                            <h6> Max Guest</h6>
                                            <i class="fas fa-male"></i>
                                        </div>
                                    </li>
                                    <li class="feature-border">
                                        <div class="room-feature">
                                            <h6> Bed options</h6>
                                            <i class="fas fa-bed"></i> <i class="fad fa-bed-alt"></i>
                                        </div>
                                    </li>
                                    <li class="feature-border">
                                        <div class="room-feature">
                                            <h6> Space</h6>
                                            <i class="fas fa-male"></i>
                                        </div>
                                    </li>
                                    <li class="feature-border">
                                        <div class="room-feature">
                                            <h6> Shower</h6>
                                            <i class="fas fa-shower"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="room-feature">
                                            <h6> Free Wifi</h6>
                                            <i class="fas fa-wifi"></i>
                                        </div>
                                    </li>
                                </ul>
                                </p>
                                <p>
                                    {!! $item->short_desc !!}
                                </p>
                                <hr>
                                <div class="float-left">
                                    {{--                                <p class="price">From <b>US${!! $item->price !!}</b>/Night</p>--}}
                                </div>
                                <div class="@if($device!=1) @if($i%2==0) float-left @else  float-right @endif @endif">
                                    <button class="btn btn-primary btn-view" data-toggle="modal"
                                            data-target="#staticBackdrop{!! $item->id !!}"
                                            class="btn btn-view">View Detail
                                    </button>
                                    {{--                                    <a href="{!! $item->book_now !!}" class="btn btn-view">Book Now</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop{!! $item->id !!}" data-backdrop="static" data-keyboard="false"
                 tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Suite Detail</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="room-detail">
                                <h3>{!! $item->name !!}</h3>
                                <p class="price">From <b>US${!! $item->price !!}</b>/Night</p>
                                <ul class="ul-room-feature">
                                    <li class="feature-border">
                                        <div class="room-feature">
                                            <h6> Max Guest</h6>
                                            <i class="fas fa-male"></i>
                                        </div>
                                    </li>
                                    <li class="feature-border">
                                        <div class="room-feature">
                                            <h6> Bed options</h6>
                                            <i class="fas fa-bed"></i> <i class="fad fa-bed-alt"></i>
                                        </div>
                                    </li>
                                    <li class="feature-border">
                                        <div class="room-feature">
                                            <h6> Space</h6>
                                            <i class="fas fa-male"></i>
                                        </div>
                                    </li>
                                    <li class="feature-border">
                                        <div class="room-feature">
                                            <h6> Shower</h6>
                                            <i class="fas fa-shower"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="room-feature">
                                            <h6> Free Wifi</h6>
                                            <i class="fas fa-wifi"></i>
                                        </div>
                                    </li>
                                </ul>
                                <p>
                                    {!! $item->short_desc !!}
                                </p>

                                <h3>INCLUDE Amenities</h3>
                                <div class="room-detail-amenity">
                                    {!! $item->amenities !!}

                                </div>


                            </div>
                        </div>
                        <div class="modal-footer justify-content-center ">
                            <center>
                                <a href="{!! $item->book_now !!}" class="btn btn-view btn-book">Book Now</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>

        @section('js')
            <script>
                $(document).ready(function () {
                    $('#carouselExample{!! $item->id !!}').on('slide.bs.carousel', function (e) {

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
                })
            </script>
        @stop



        @php( $i++ )
        @endforeach


    </div>

@endsection

@section('js')

@stop
