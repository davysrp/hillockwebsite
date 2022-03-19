@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Amenity' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_amenities.product_amenity.destroy', $productAmenity->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_amenities.product_amenity.index') }}" class="btn btn-primary" title="Show All Product Amenity">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_amenities.product_amenity.create') }}" class="btn btn-success" title="Create New Product Amenity">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_amenities.product_amenity.edit', $productAmenity->id ) }}" class="btn btn-primary" title="Edit Product Amenity">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Amenity" onclick="return confirm(&quot;Click Ok to delete Product Amenity.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Product</dt>
            <dd>{{ optional($productAmenity->product)->name }}</dd>
            <dt>Amenity</dt>
            <dd>{{ optional($productAmenity->amenity)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productAmenity->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productAmenity->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection