@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Feature' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_features.product_feature.destroy', $productFeature->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_features.product_feature.index') }}" class="btn btn-primary" title="Show All Product Feature">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_features.product_feature.create') }}" class="btn btn-success" title="Create New Product Feature">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_features.product_feature.edit', $productFeature->id ) }}" class="btn btn-primary" title="Edit Product Feature">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Feature" onclick="return confirm(&quot;Click Ok to delete Product Feature.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Product</dt>
            <dd>{{ optional($productFeature->product)->name }}</dd>
            <dt>Feature</dt>
            <dd>{{ optional($productFeature->feature)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productFeature->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productFeature->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection