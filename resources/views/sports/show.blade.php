@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($sport->name) ? $sport->name : 'Sport' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sports.sport.destroy', $sport->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sports.sport.index') }}" class="btn btn-primary" title="Show All Sport">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sports.sport.create') }}" class="btn btn-success" title="Create New Sport">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sports.sport.edit', $sport->id ) }}" class="btn btn-primary" title="Edit Sport">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sport" onclick="return confirm(&quot;Click Ok to delete Sport.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Photo</dt>
            <dd>{{ $sport->photo }}</dd>
            <dt>Name</dt>
            <dd>{{ $sport->name }}</dd>
            <dt>Status</dt>
            <dd>{{ $sport->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $sport->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $sport->updated_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $sport->description }}</dd>

        </dl>

    </div>
</div>

@endsection
