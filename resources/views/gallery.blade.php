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
    </div>

    <div class="container-fluid">

        <div class="home-room-container">
            <div class="row room-row">
                <?php
                $galleries = \App\Models\Gallery::all();

                $types = \App\Models\Gallery::distinct()->get('type');
                ?>
                {{--   @foreach($galleries as $item)
                       <div class="col-md-4 p-1">
                           <div class="gallery-item"
                                style="background: url({!! asset('image/gallery/'.$item->photo) !!})"></div>
                       </div>
                   @endforeach--}}
            </div>


            <div class="gallery">

                <div class="filters filter-button-group text-center">
                    <ul>
                        <h4>
                            <li class="active" data-filter="*">All</li>
                            @foreach($types as $item)
                                <li data-filter=".{!! $item->type !!}">{!! $item->type !!}</li>
                            @endforeach
                        </h4>
                    </ul>
                </div>
                <div class="content grid">
                    @foreach($galleries as $item)


                        <div class="col-md-3 p-1  {!! $item->type !!} grid-item ">
                            <a href="{!! asset('image/gallery/'.$item->photo) !!}">
                                <div class="gallery-item"
                                     style="background: url({!! asset('image/gallery/'.$item->photo) !!})">
                                    <div class="overlay">
{{--                                        <h6>{!! $item->name !!}</h6>--}}
                                    </div>

                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>



@endsection

@section('css')
    <link rel="stylesheet" href="{!! asset('assets/Magnific/dist/magnific-popup.css') !!}">
@endsection
@section('js')
    <script src="{!! asset('assets/Magnific/dist/jquery.magnific-popup.min.js') !!}"></script>
    <script src="{!! asset('assets/js/isotope.pkgd.min.js') !!}"></script>

    <script>
        $(document).ready(function () {

            $('.grid').isotope({
                itemSelector: '.grid-item'
            });

// filter items on button click
            $('.filter-button-group').on('click', 'li', function () {
                var filterValue = $(this).attr('data-filter');
                $('.grid').isotope({filter: filterValue});
                $('.filter-button-group li').removeClass('active');
                $(this).addClass('active');
            });


            $('.gallery').each(function () { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
        })
    </script>
@stop
