@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Photo' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_photos.product_photo.destroy', $productPhoto->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_photos.product_photo.index') }}" class="btn btn-primary" title="Show All Product Photo">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_photos.product_photo.create') }}" class="btn btn-success" title="Create New Product Photo">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_photos.product_photo.edit', $productPhoto->id ) }}" class="btn btn-primary" title="Edit Product Photo">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Photo" onclick="return confirm(&quot;Click Ok to delete Product Photo.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Product</dt>
            <dd>{{ optional($productPhoto->product)->name }}</dd>
            <dt>Photo</dt>
            <dd>{{ $productPhoto->photo }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productPhoto->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productPhoto->updated_at }}</dd>
            <dt>Status</dt>
            <dd>{{ $productPhoto->status }}</dd>
            <dt>Description</dt>
            <dd>{{ $productPhoto->description }}</dd>

        </dl>

    </div>
</div>

@endsection