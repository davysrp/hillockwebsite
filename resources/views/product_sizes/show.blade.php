@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Size' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_sizes.product_size.destroy', $productSize->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_sizes.product_size.index') }}" class="btn btn-primary" title="Show All Product Size">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_sizes.product_size.create') }}" class="btn btn-success" title="Create New Product Size">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_sizes.product_size.edit', $productSize->id ) }}" class="btn btn-primary" title="Edit Product Size">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Size" onclick="return confirm(&quot;Click Ok to delete Product Size.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Size</dt>
            <dd>{{ $productSize->size }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($productSize->product)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productSize->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productSize->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection