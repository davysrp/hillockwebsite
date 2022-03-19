@extends('adminlte::page')


@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($label->name) ? $label->name : 'Label' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('labels.label.destroy', $label->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('labels.label.index') }}" class="btn btn-primary" title="Show All Label">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('labels.label.create') }}" class="btn btn-success" title="Create New Label">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('labels.label.edit', $label->id ) }}" class="btn btn-primary" title="Edit Label">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Label" onclick="return confirm(&quot;Click Ok to delete Label.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $label->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $label->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $label->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
