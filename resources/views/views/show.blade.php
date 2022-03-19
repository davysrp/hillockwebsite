@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($view->name) ? $view->name : 'View' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('views.view.destroy', $view->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('views.view.index') }}" class="btn btn-primary" title="Show All View">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('views.view.create') }}" class="btn btn-success" title="Create New View">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('views.view.edit', $view->id ) }}" class="btn btn-primary" title="Edit View">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete View" onclick="return confirm(&quot;Click Ok to delete View.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Icon</dt>
            <dd>{{ $view->icon }}</dd>
            <dt>Name</dt>
            <dd>{{ $view->name }}</dd>
            <dt>Name Kh</dt>
            <dd>{{ $view->name_kh }}</dd>
            <dt>Created At</dt>
            <dd>{{ $view->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $view->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
