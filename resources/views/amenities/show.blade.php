@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($amenity->name) ? $amenity->name : 'Amenity' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('amenities.amenity.destroy', $amenity->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('amenities.amenity.index') }}" class="btn btn-primary" title="Show All Amenity">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('amenities.amenity.create') }}" class="btn btn-success" title="Create New Amenity">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('amenities.amenity.edit', $amenity->id ) }}" class="btn btn-primary" title="Edit Amenity">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Amenity" onclick="return confirm(&quot;Click Ok to delete Amenity.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Icon</dt>
            <dd>{{ $amenity->icon }}</dd>
            <dt>Name</dt>
            <dd>{{ $amenity->name }}</dd>
            <dt>Name Kh</dt>
            <dd>{{ $amenity->name_kh }}</dd>
            <dt>Created At</dt>
            <dd>{{ $amenity->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $amenity->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
