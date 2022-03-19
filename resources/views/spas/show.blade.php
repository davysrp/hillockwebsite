@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($spa->name) ? $spa->name : 'Spa' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('spas.spa.destroy', $spa->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('spas.spa.index') }}" class="btn btn-primary" title="Show All Spa">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('spas.spa.create') }}" class="btn btn-success" title="Create New Spa">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('spas.spa.edit', $spa->id ) }}" class="btn btn-primary" title="Edit Spa">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Spa" onclick="return confirm(&quot;Click Ok to delete Spa.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $spa->name }}</dd>
            <dt>Short Desc</dt>
            <dd>{{ $spa->short_desc }}</dd>
            <dt>Description</dt>
            <dd>{{ $spa->description }}</dd>
            <dt>Meta Keyword</dt>
            <dd>{{ $spa->meta_keyword }}</dd>
            <dt>Meta Description</dt>
            <dd>{{ $spa->meta_description }}</dd>
            <dt>Photo</dt>
            <dd>{{ $spa->photo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $spa->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $spa->updated_at }}</dd>
            <dt>Price</dt>
            <dd>{{ $spa->price }}</dd>
            <dt>Slug</dt>
            <dd>{{ $spa->slug }}</dd>
            <dt>Short Description</dt>
            <dd>{{ $spa->short_description }}</dd>

        </dl>

    </div>
</div>

@endsection