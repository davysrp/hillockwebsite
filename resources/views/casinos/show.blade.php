@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($casino->name) ? $casino->name : 'Casino' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('casinos.casino.destroy', $casino->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('casinos.casino.index') }}" class="btn btn-primary" title="Show All Casino">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('casinos.casino.create') }}" class="btn btn-success" title="Create New Casino">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('casinos.casino.edit', $casino->id ) }}" class="btn btn-primary" title="Edit Casino">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Casino" onclick="return confirm(&quot;Click Ok to delete Casino.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Photo</dt>
            <dd>{{ $casino->photo }}</dd>
            <dt>Name</dt>
            <dd>{{ $casino->name }}</dd>
            <dt>Status</dt>
            <dd>{{ $casino->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $casino->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $casino->updated_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $casino->description }}</dd>

        </dl>

    </div>
</div>

@endsection
