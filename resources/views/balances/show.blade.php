@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Balance' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('balances.balance.destroy', $balance->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('balances.balance.index') }}" class="btn btn-primary" title="Show All Balance">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('balances.balance.create') }}" class="btn btn-success" title="Create New Balance">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('balances.balance.edit', $balance->id ) }}" class="btn btn-primary" title="Edit Balance">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Balance" onclick="return confirm(&quot;Click Ok to delete Balance.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Ipaddress</dt>
            <dd>{{ $balance->ipaddress }}</dd>
            <dt>Topup Date</dt>
            <dd>{{ $balance->topup_date }}</dd>
            <dt>Approve Date</dt>
            <dd>{{ $balance->approve_date }}</dd>
            <dt>Approve By</dt>
            <dd>{{ optional($balance->approveBy)->id }}</dd>
            <dt>Bank</dt>
            <dd>{{ optional($balance->bank)->name }}</dd>
            <dt>Bank Name</dt>
            <dd>{{ $balance->bank_name }}</dd>
            <dt>Bank Number</dt>
            <dd>{{ $balance->bank_number }}</dd>
            <dt>Amount</dt>
            <dd>{{ $balance->amount }}</dd>
            <dt>Created At</dt>
            <dd>{{ $balance->created_at }}</dd>
            <dt>Remark</dt>
            <dd>{{ $balance->remark }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $balance->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
