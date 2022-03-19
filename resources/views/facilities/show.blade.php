@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($facility->name) ? $facility->name : 'Facility' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('facilities.facility.destroy', $facility->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('facilities.facility.index') }}" class="btn btn-primary" title="Show All Facility">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('facilities.facility.create') }}" class="btn btn-success" title="Create New Facility">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('facilities.facility.edit', $facility->id ) }}" class="btn btn-primary" title="Edit Facility">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Facility" onclick="return confirm(&quot;Click Ok to delete Facility.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $facility->name }}</dd>
            <dt>Short Desc</dt>
            <dd>{{ $facility->short_desc }}</dd>
            <dt>Description</dt>
            <dd>{{ $facility->description }}</dd>
            <dt>Meta Keyword</dt>
            <dd>{{ $facility->meta_keyword }}</dd>
            <dt>Photo</dt>
            <dd>{{ $facility->photo }}</dd>
            <dt>Meta Description</dt>
            <dd>{{ $facility->meta_description }}</dd>
            <dt>Created At</dt>
            <dd>{{ $facility->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $facility->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection