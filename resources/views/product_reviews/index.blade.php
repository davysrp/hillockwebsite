@extends('adminlte::page')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Product Reviews</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_reviews.product_review.create') }}" class="btn btn-success" title="Create New Product Review">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($productReviews) == 0)
            <div class="panel-body text-center">
                <h4>No Product Reviews Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Star</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Comment</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productReviews as $productReview)
                        <tr>
                            <td>{{ $productReview->star }}</td>
                            <td>{{ optional($productReview->user)->name }}</td>
                            <td>{{ optional($productReview->product)->name }}</td>
                            <td>{{ $productReview->comment }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_reviews.product_review.destroy', $productReview->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_reviews.product_review.show', $productReview->id ) }}" class="btn btn-info" title="Show Product Review">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_reviews.product_review.edit', $productReview->id ) }}" class="btn btn-primary" title="Edit Product Review">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Review" onclick="return confirm(&quot;Click Ok to delete Product Review.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $productReviews->render() !!}
        </div>

        @endif

    </div>
@endsection
