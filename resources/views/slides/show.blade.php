@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Slide' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('slides.slide.destroy', $slide->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('slides.slide.index') }}" class="btn btn-primary" title="Show All Slide">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('slides.slide.create') }}" class="btn btn-success" title="Create New Slide">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('slides.slide.edit', $slide->id ) }}" class="btn btn-primary" title="Edit Slide">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Slide" onclick="return confirm(&quot;Click Ok to delete Slide.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Photo</dt>
            <dd>{{ $slide->photo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $slide->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $slide->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection