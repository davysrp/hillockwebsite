@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($dining->name) ? $dining->name : 'Dining' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('dinings.dining.destroy', $dining->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('dinings.dining.index') }}" class="btn btn-primary" title="Show All Dining">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('dinings.dining.create') }}" class="btn btn-success" title="Create New Dining">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('dinings.dining.edit', $dining->id ) }}" class="btn btn-primary" title="Edit Dining">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Dining" onclick="return confirm(&quot;Click Ok to delete Dining.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $dining->name }}</dd>
            <dt>Short Desc</dt>
            <dd>{{ $dining->short_desc }}</dd>
            <dt>Description</dt>
            <dd>{{ $dining->description }}</dd>
            <dt>Meta Keyword</dt>
            <dd>{{ $dining->meta_keyword }}</dd>
            <dt>Meta Description</dt>
            <dd>{{ $dining->meta_description }}</dd>
            <dt>Photo</dt>
            <dd>{{ $dining->photo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $dining->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $dining->updated_at }}</dd>
            <dt>Price</dt>
            <dd>{{ $dining->price }}</dd>
            <dt>Slug</dt>
            <dd>{{ $dining->slug }}</dd>
            <dt>Short Description</dt>
            <dd>{{ $dining->short_description }}</dd>

        </dl>

    </div>
</div>

@endsection