@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Type Label' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('type_labels.type_label.destroy', $typeLabel->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('type_labels.type_label.index') }}" class="btn btn-primary" title="Show All Type Label">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('type_labels.type_label.create') }}" class="btn btn-success" title="Create New Type Label">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('type_labels.type_label.edit', $typeLabel->id ) }}" class="btn btn-primary" title="Edit Type Label">
                        <span class="fa fa-pen-alt" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Type Label" onclick="return confirm(&quot;Click Ok to delete Type Label.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Type</dt>
            <dd>{{ optional($typeLabel->type)->name }}</dd>
            <dt>Label</dt>
            <dd>{{ optional($typeLabel->label)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $typeLabel->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $typeLabel->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
