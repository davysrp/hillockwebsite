@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($slot->name) ? $slot->name : 'Slot' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('slots.slot.destroy', $slot->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('slots.slot.index') }}" class="btn btn-primary" title="Show All Slot">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('slots.slot.create') }}" class="btn btn-success" title="Create New Slot">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('slots.slot.edit', $slot->id ) }}" class="btn btn-primary" title="Edit Slot">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Slot" onclick="return confirm(&quot;Click Ok to delete Slot.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Photo</dt>
            <dd>{{ $slot->photo }}</dd>
            <dt>Name</dt>
            <dd>{{ $slot->name }}</dd>
            <dt>Status</dt>
            <dd>{{ $slot->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $slot->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $slot->updated_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $slot->description }}</dd>

        </dl>

    </div>
</div>

@endsection
