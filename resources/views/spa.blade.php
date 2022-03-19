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

                    {!! $page->description !!}
                    <div class="text-center mt-3">
                        <a href="#" class="btn btn-view hl-bg">Book your stay</a>
                    </div>

                </div>
            </div>
        </div>
        <?php
        $facilities = \App\Models\Spa::all();
        $i = 1;
        ?>
        @foreach($facilities as $item)
            <div class="facility-item">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <div class="col-md-6 @if($i%2==0) float-right pl-0 @else float-left pr-0 @endif ">
                          {{--  <div class="thumb"
                                 style="background: url({!!asset('image/package/'. $item->photo) !!})"></div>--}}
                            <?php

                            $menu_slides = \App\Models\SpaPhoto::where('spa_id',$item->id)->get();
                            $y = 1;
                            ?>

                            <div id="carouselExample{!! $item->id !!}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($menu_slides as $slide)
                                        <div class="carousel-item @if($y==1) active @endif ">
                                            <img class="d-block w-100" src="{!! asset('image/spa/'.$slide->photo) !!}" alt="First slide">
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
                                    {!! $item->short_desc !!}
                                </p>
                                <div class="@if($i%2==0) float-left @else  float-right @endif">
                                    <a class="btn btn-primary btn-view"  href="{!! route('spa',$item->id) !!}"

                                          >View Detail
                                    </a>
                                    {{--                                    <a href="{!! $item->book_now !!}" class="btn btn-view">Book Now</a>--}}
                                </div>
                            </div>
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
