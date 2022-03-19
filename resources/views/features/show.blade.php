@extends('adminlte::page')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($feature->name) ? $feature->name : 'Feature' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('features.feature.destroy', $feature->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('features.feature.index') }}" class="btn btn-primary" title="Show All Feature">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('features.feature.create') }}" class="btn btn-success" title="Create New Feature">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('features.feature.edit', $feature->id ) }}" class="btn btn-primary" title="Edit Feature">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Feature" onclick="return confirm(&quot;Click Ok to delete Feature.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Icon</dt>
            <dd>{{ $feature->icon }}</dd>
            <dt>Name</dt>
            <dd>{{ $feature->name }}</dd>
            <dt>Name Kh</dt>
            <dd>{{ $feature->name_kh }}</dd>
            <dt>Created At</dt>
            <dd>{{ $feature->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $feature->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
