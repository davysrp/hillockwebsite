@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Product Review' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('product_reviews.product_review.destroy', $productReview->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('product_reviews.product_review.index') }}" class="btn btn-primary" title="Show All Product Review">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('product_reviews.product_review.create') }}" class="btn btn-success" title="Create New Product Review">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('product_reviews.product_review.edit', $productReview->id ) }}" class="btn btn-primary" title="Edit Product Review">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Product Review" onclick="return confirm(&quot;Click Ok to delete Product Review.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Star</dt>
            <dd>{{ $productReview->star }}</dd>
            <dt>User</dt>
            <dd>{{ optional($productReview->user)->name }}</dd>
            <dt>Product</dt>
            <dd>{{ optional($productReview->product)->name }}</dd>
            <dt>Comment</dt>
            <dd>{{ $productReview->comment }}</dd>
            <dt>Created At</dt>
            <dd>{{ $productReview->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $productReview->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection