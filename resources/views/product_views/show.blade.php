@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product View' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_views.product_view.destroy', $productView->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_views.product_view.index') }}" class="btn btn-primary" title="Show All Product View">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_views.product_view.create') }}" class="btn btn-success" title="Create New Product View">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_views.product_view.edit', $productView->id ) }}" class="btn btn-primary" title="Edit Product View">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product View" onclick="return confirm(&quot;Click Ok to delete Product View.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Product</dt>
            <dd>{{ optional($productView->Product)->name }}</dd>
            <dt>View</dt>
            <dd>{{ optional($productView->View)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productView->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productView->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection