@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($blogCategory->name) ? $blogCategory->name : 'Blog Category' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('blog_categories.blog_category.destroy', $blogCategory->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('blog_categories.blog_category.index') }}" class="btn btn-primary" title="Show All Blog Category">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('blog_categories.blog_category.create') }}" class="btn btn-success" title="Create New Blog Category">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('blog_categories.blog_category.edit', $blogCategory->id ) }}" class="btn btn-primary" title="Edit Blog Category">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Blog Category" onclick="return confirm(&quot;Click Ok to delete Blog Category.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $blogCategory->name }}</dd>
            <dt>Photo</dt>
            <dd>{{ $blogCategory->photo }}</dd>
            <dt>Description</dt>
            <dd>{{ $blogCategory->description }}</dd>
            <dt>Created At</dt>
            <dd>{{ $blogCategory->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $blogCategory->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
