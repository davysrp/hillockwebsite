@extends('adminlte::page')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($casino->name) ? $casino->name : 'Casino' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('casinos.casino.index') }}" class="btn btn-primary" title="Show All Casino">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('casinos.casino.create') }}" class="btn btn-success" title="Create New Casino">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('casinos.casino.update', $casino->id) }}" id="edit_casino_form" name="edit_casino_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('casinos.form', [
                                        'casino' => $casino,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
