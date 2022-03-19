@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Spa Photo' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('spa_photos.spa_photo.destroy', $spaPhoto->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('spa_photos.spa_photo.index') }}" class="btn btn-primary" title="Show All Spa Photo">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('spa_photos.spa_photo.create') }}" class="btn btn-success" title="Create New Spa Photo">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('spa_photos.spa_photo.edit', $spaPhoto->id ) }}" class="btn btn-primary" title="Edit Spa Photo">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Spa Photo" onclick="return confirm(&quot;Click Ok to delete Spa Photo.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Photo</dt>
            <dd>{{ $spaPhoto->photo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $spaPhoto->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $spaPhoto->updated_at }}</dd>
            <dt>Spa</dt>
            <dd>{{ optional($spaPhoto->spa)->name }}</dd>

        </dl>

    </div>
</div>

@endsection