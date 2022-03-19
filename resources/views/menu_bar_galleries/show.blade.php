@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($menuBarGallery->name) ? $menuBarGallery->name : 'Menu Bar Gallery' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('menu_bar_galleries.menu_bar_gallery.destroy', $menuBarGallery->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('menu_bar_galleries.menu_bar_gallery.index') }}" class="btn btn-primary" title="Show All Menu Bar Gallery">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('menu_bar_galleries.menu_bar_gallery.create') }}" class="btn btn-success" title="Create New Menu Bar Gallery">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('menu_bar_galleries.menu_bar_gallery.edit', $menuBarGallery->id ) }}" class="btn btn-primary" title="Edit Menu Bar Gallery">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Menu Bar Gallery" onclick="return confirm(&quot;Click Ok to delete Menu Bar Gallery.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $menuBarGallery->name }}</dd>
            <dt>Photo</dt>
            <dd>{{ $menuBarGallery->photo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $menuBarGallery->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $menuBarGallery->updated_at }}</dd>
            <dt>Menu Bar</dt>
            <dd>{{ optional($menuBarGallery->menuBar)->name }}</dd>

        </dl>

    </div>
</div>

@endsection