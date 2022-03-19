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
        <div class="row">

            <?php
            $dinings = \App\Models\Dining::all();
            $input = \Illuminate\Support\Facades\Request::input('dining');
            if (isset($input)) {
                $detail = \App\Models\Dining::find($input);
            } else {
                $detail = \App\Models\Dining::find(1);
            }


            ?>
            @foreach($dinings as $item)
                <div class="col-md-4 p-0">
                    <a href="?dining={!!  $item->id !!}">
                        <div class="dining-item">
                            <div class="thumb"
                                 style="background: url({!! asset('image/package/'.$item->photo) !!})">
                                <div class="overlay
                            @if(!isset($input))
                                @if($item->id==1 )
                                    overlay-active
@endif
                                @elseif($input== $item->id)
                                    overlay-active
@endif
                                    ">
                                    <h3>
                                        {!! $item->name !!}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>



    <div class="container">
        <div class="dining-detail">
            <div class="row">

                <div class="col-md-7">
                    <h3>{!! $detail->name !!}</h3>
                    <p>
                        {!! $detail->description !!}
                    </p>
                </div>
                <div class="col-md-5">
                    <div class="thumb" style="background: url({!! asset('image/package/'.$detail->photo) !!})"></div>
                </div>


            </div>
        </div>
    </div>




@endsection

@section('js')

@stop
