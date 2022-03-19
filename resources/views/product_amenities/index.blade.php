@extends('layouts.app')

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
                <h4 class="mt-5 mb-5">Product Amenities</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('product_amenities.product_amenity.create') }}" class="btn btn-success" title="Create New Product Amenity">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($productAmenities) == 0)
            <div class="panel-body text-center">
                <h4>No Product Amenities Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Amenity</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($productAmenities as $productAmenity)
                        <tr>
                            <td>{{ optional($productAmenity->product)->name }}</td>
                            <td>{{ optional($productAmenity->amenity)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('product_amenities.product_amenity.destroy', $productAmenity->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('product_amenities.product_amenity.show', $productAmenity->id ) }}" class="btn btn-info" title="Show Product Amenity">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('product_amenities.product_amenity.edit', $productAmenity->id ) }}" class="btn btn-primary" title="Edit Product Amenity">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Product Amenity" onclick="return confirm(&quot;Click Ok to delete Product Amenity.&quot;)">
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
            {!! $productAmenities->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection