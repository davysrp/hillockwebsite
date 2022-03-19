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
                <div class="col-md-6">
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
                <div class="col-md-6">
                    <div class="desc">
                        <h3>{!! $room->name !!}</h3>
                        <p class="price">Price <b>US${!! $room->price !!}</b></p>
                        <p>
                            {!! $room->short_desc !!}
                        </p>
                        <a href="" class="btn btn-view">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="room-detail">
            <h3>Package detail</h3>
            <div class="room-detail-amenity">
                {!! $room->description !!}
            </div>
        </div>


    </div>

@endsection

@section('js')

@stop
