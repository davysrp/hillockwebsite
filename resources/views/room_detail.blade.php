@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="title-container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>
                        {!! $room->name !!}
                    </h3>
                    <div class="divider"></div>
                </div>
            </div>
        </div>


        <div class="page-room-item">
            <div class="row">
                <div class="col-md-12">
                    <?php

                    $menu_slides =\App\Models\RoomPhoto::where('room_id',$room->id)->get();
                    $i = 1;
                    $x = 0;
                    ?>
                    <div class="">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">   @foreach($menu_slides as $item)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="@if($x==0) active @endif"></li>

                                    @php( $x++ )
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($menu_slides as $item)
                                    <div class="carousel-item @if($i==1) active @endif ">
                                        <img class="d-block w-100" src="{!! asset('image/room/'.$item->photo) !!}" alt="First slide">
                                    </div>
                                    @php( $i++ )
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
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="room-detail">
            <h3>{!! $room->name !!}</h3>
            <p class="price">From <b>US${!! $room->price !!}</b>/Night</p>
            <ul class="ul-room-feature">
                <li  class="feature-border">
                    <div class="room-feature">
                        <h6> Max Guest</h6>
                        <i class="fas fa-male"></i>
                    </div>
                </li>
                <li  class="feature-border">
                    <div class="room-feature">
                        <h6> Bed options</h6>
                        <i class="fas fa-bed"></i> <i class="fad fa-bed-alt"></i>
                    </div>
                </li>
                <li  class="feature-border">
                    <div class="room-feature">
                        <h6> Space</h6>
                        <i class="fas fa-male"></i>
                    </div>
                </li>
                <li  class="feature-border">
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
                {!! $room->short_desc !!}
            </p>

            <h3>INCLUDE Amenities</h3>
            <div class="room-detail-amenity">
                {!! $room->amenities !!}

            </div>
            <a href="{!! $room->book_now !!}" class="btn btn-view">Book Now</a>
            {{-- <h3>Complimentary</h3>
             <div class="room-detail-amenity">
                 {!! $room->complimentary !!}
             </div>--}}
        </div>


    </div>

@endsection

@section('js')

@stop
