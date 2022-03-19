@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($commune->name) ? $commune->name : 'Commune' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('communes.commune.destroy', $commune->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('communes.commune.index') }}" class="btn btn-primary" title="Show All Commune">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('communes.commune.create') }}" class="btn btn-success" title="Create New Commune">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('communes.commune.edit', $commune->id ) }}" class="btn btn-primary" title="Edit Commune">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Commune" onclick="return confirm(&quot;Click Ok to delete Commune.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name Kh</dt>
            <dd>{{ $commune->name_kh }}</dd>
            <dt>Name</dt>
            <dd>{{ $commune->name }}</dd>
            <dt>District</dt>
            <dd>{{ optional($commune->District)->name }}</dd>
            <dt>Status</dt>
            <dd>{{ $commune->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $commune->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $commune->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection