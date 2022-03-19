@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="title-container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>
                        {!! $spa->name !!}
                    </h3>
                    <div class="divider"></div>
                </div>
            </div>
        </div>
        <div class="room-detail">
            {!! $spa->description !!}
        </div>


    </div>

@endsection

@section('js')

@stop
