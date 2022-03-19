@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($security->name) ? $security->name : 'Security' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('securities.security.destroy', $security->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('securities.security.index') }}" class="btn btn-primary" title="Show All Security">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('securities.security.create') }}" class="btn btn-success" title="Create New Security">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('securities.security.edit', $security->id ) }}" class="btn btn-primary" title="Edit Security">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Security" onclick="return confirm(&quot;Click Ok to delete Security.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Icon</dt>
            <dd>{{ $security->icon }}</dd>
            <dt>Name</dt>
            <dd>{{ $security->name }}</dd>
            <dt>Name Kh</dt>
            <dd>{{ $security->name_kh }}</dd>
            <dt>Created At</dt>
            <dd>{{ $security->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $security->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
