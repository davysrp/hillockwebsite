@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($sponsore->name) ? $sponsore->name : 'Sponsore' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('sponsores.sponsore.destroy', $sponsore->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('sponsores.sponsore.index') }}" class="btn btn-primary" title="Show All Sponsore">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sponsores.sponsore.create') }}" class="btn btn-success" title="Create New Sponsore">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('sponsores.sponsore.edit', $sponsore->id ) }}" class="btn btn-primary" title="Edit Sponsore">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Sponsore" onclick="return confirm(&quot;Click Ok to delete Sponsore.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $sponsore->name }}</dd>
            <dt>Name Kh</dt>
            <dd>{{ $sponsore->name_kh }}</dd>
            <dt>Photo</dt>
            <dd>{{ $sponsore->photo }}</dd>
            <dt>Postion</dt>
            <dd>{{ $sponsore->postion }}</dd>
            <dt>Ordered</dt>
            <dd>{{ $sponsore->ordered }}</dd>
            <dt>Status</dt>
            <dd>{{ $sponsore->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $sponsore->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $sponsore->updated_at }}</dd>
            <dt>Link</dt>
            <dd>{{ $sponsore->link }}</dd>

        </dl>

    </div>
</div>

@endsection
