@extends('layouts.admin')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($type->name) ? $type->name : 'Type' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('types.type.destroy', $type->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('types.type.index') }}" class="btn btn-primary" title="Show All Type">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('types.type.create') }}" class="btn btn-success" title="Create New Type">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('types.type.edit', $type->id ) }}" class="btn btn-primary" title="Edit Type">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Type" onclick="return confirm(&quot;Click Ok to delete Type.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $type->name }}</dd>
            <dt>Closing Time</dt>
            <dd>{{ $type->closing_time }}</dd>
            <dt>Created At</dt>
            <dd>{{ $type->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $type->updated_at }}</dd>
            <dt>Code</dt>
            <dd>{{ $type->code }}</dd>

        </dl>

    </div>
</div>

@endsection
