@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($payment->name) ? $payment->name : 'Payment' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('payments.payment.destroy', $payment->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('payments.payment.index') }}" class="btn btn-primary" title="Show All Payment">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('payments.payment.create') }}" class="btn btn-success" title="Create New Payment">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('payments.payment.edit', $payment->id ) }}" class="btn btn-primary" title="Edit Payment">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Payment" onclick="return confirm(&quot;Click Ok to delete Payment.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Api Url</dt>
            <dd>{{ $payment->api_url }}</dd>
            <dt>Name</dt>
            <dd>{{ $payment->name }}</dd>
            <dt>Api</dt>
            <dd>{{ $payment->api }}</dd>
            <dt>Secret</dt>
            <dd>{{ $payment->secret }}</dd>
            <dt>Created At</dt>
            <dd>{{ $payment->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $payment->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
