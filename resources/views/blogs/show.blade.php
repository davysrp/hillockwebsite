@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($blog->name) ? $blog->name : 'Blog' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('blogs.blog.destroy', $blog->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('blogs.blog.index') }}" class="btn btn-primary" title="Show All Blog">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('blogs.blog.create') }}" class="btn btn-success" title="Create New Blog">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('blogs.blog.edit', $blog->id ) }}" class="btn btn-primary" title="Edit Blog">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Blog" onclick="return confirm(&quot;Click Ok to delete Blog.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $blog->name }}</dd>
            <dt>Photo</dt>
            <dd>{{ $blog->photo }}</dd>
            <dt>Description</dt>
            <dd>{{ $blog->description }}</dd>
            <dt>Blog Category</dt>
            <dd>{{ optional($blog->blogCategory)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $blog->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $blog->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
