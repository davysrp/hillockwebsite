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


    <div class="container">
        <div class="home-package-container">
            <div class="row room-row">
                <?php
                $packages = \App\Models\Package::all();
                ?>
                @foreach($packages as $item)
                    <div class="col-md-4 p-1">
                        <div class="home-package-item">
                            <div class="home-package-item-thumb"
                                 style="background: url({!!asset('image/package/'. $item->photo) !!})"></div>
                            <div class="desc">
                                <h3>{!! $item->name !!}</h3>
                                <p>
                                    {{ Str::limit($item->short_desc, 150) }}
                                </p>
                                <div class="experience experience-{!! $item->id !!}">
                                    {!! $item->description !!}
                                </div>
                                <button class="btn moreless-button read-less-{!! $item->id !!}" data-id="{!! $item->id !!}"><i class="fa fa-angle-down"></i></span></button>
                                <center>
                                    {{--<a href="{!! route('package',['slug'=>\Illuminate\Support\Str::slug($item->slug)]) !!}"
                                       class="btn btn-view hl-bg w-100">Book Now</a>  --}}
                                    <a href="https://web.facebook.com/HillocksHotel"
                                       class="btn btn-view hl-bg w-100">Book Now</a>
                                </center>
                            </div>
                        </div>

                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
          /*  $('.moreless-button').click(function() {
                $('.experience').slideToggle();
                if ($('.moreless-button').text() == "Read more") {
                    $(this).text("Read less")
                } else {
                    $(this).text("Read more")
                }
            });*/
            $('body').delegate('.moreless-button','click',function () {
                var id = $(this).data('id');
                $('.experience-'+id).slideToggle();
               /* if ($('.read-less-'+id).text() == "Read more") {
                    $(this).text('<i class="fa fa-angle-up"></i>')
                } else {
                    $(this).text("Read more")
                }*/
            })
        })
    </script>
@stop
