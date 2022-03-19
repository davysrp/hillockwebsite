@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Package Photo' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('package_photos.package_photo.destroy', $packagePhoto->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('package_photos.package_photo.index') }}" class="btn btn-primary" title="Show All Package Photo">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('package_photos.package_photo.create') }}" class="btn btn-success" title="Create New Package Photo">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('package_photos.package_photo.edit', $packagePhoto->id ) }}" class="btn btn-primary" title="Edit Package Photo">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Package Photo" onclick="return confirm(&quot;Click Ok to delete Package Photo.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Photo</dt>
            <dd>{{ $packagePhoto->photo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $packagePhoto->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $packagePhoto->updated_at }}</dd>
            <dt>Package</dt>
            <dd>{{ optional($packagePhoto->package)->name }}</dd>

        </dl>

    </div>
</div>

@endsection