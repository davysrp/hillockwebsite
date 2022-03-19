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
        $facilities = \App\Models\Facility::all();
        $i = 1;
        ?>
        @foreach($facilities as $item)
            <div class="facility-item">
                <div class="row">
                    <div class="col-lg-12 p-0">
                        <div class="col-md-6 @if($i%2==0) float-right pl-0 @else float-left pr-0 @endif ">
                            <div class="thumb"
                                 style="background: url({!!asset('image/facility/'. $item->photo) !!})"></div>
                        </div>
                        <div class="col-md-6  @if($i%2==0) float-left @else float-right @endif">
                            <div class="desc">
                                <h3>{!! $item->name !!}</h3>
                                <p>
                                    {!! $item->short_desc !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php( $i++ )
        @endforeach
    </div>

@endsection

@section('js')

@stop
