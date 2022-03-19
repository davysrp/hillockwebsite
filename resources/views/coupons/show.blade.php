@extends('adminlte::page')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($coupon->name) ? $coupon->name : 'Coupon' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('coupons.coupon.destroy', $coupon->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('coupons.coupon.index') }}" class="btn btn-primary" title="Show All Coupon">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('coupons.coupon.create') }}" class="btn btn-success" title="Create New Coupon">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('coupons.coupon.edit', $coupon->id ) }}" class="btn btn-primary" title="Edit Coupon">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Coupon" onclick="return confirm(&quot;Click Ok to delete Coupon.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $coupon->name }}</dd>
            <dt>Discount</dt>
            <dd>{{ $coupon->discount }}</dd>
            <dt>Created At</dt>
            <dd>{{ $coupon->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $coupon->updated_at }}</dd>
            <dt>Status</dt>
            <dd>{{ $coupon->status }}</dd>
            <dt>End Date</dt>
            <dd>{{ $coupon->end_date }}</dd>

        </dl>

    </div>
</div>

@endsection
