@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Withdraw' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('withdraws.withdraw.destroy', $withdraw->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('withdraws.withdraw.index') }}" class="btn btn-primary" title="Show All Withdraw">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('withdraws.withdraw.create') }}" class="btn btn-success" title="Create New Withdraw">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('withdraws.withdraw.edit', $withdraw->id ) }}" class="btn btn-primary" title="Edit Withdraw">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Withdraw" onclick="return confirm(&quot;Click Ok to delete Withdraw.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Ipaddress</dt>
            <dd>{{ $withdraw->ipaddress }}</dd>
            <dt>Topup Date</dt>
            <dd>{{ $withdraw->topup_date }}</dd>
            <dt>Approve Date</dt>
            <dd>{{ $withdraw->approve_date }}</dd>
            <dt>Approve By</dt>
            <dd>{{ optional($withdraw->approveBy)->id }}</dd>
            <dt>Bank</dt>
            <dd>{{ optional($withdraw->bank)->name }}</dd>
            <dt>Bank Name</dt>
            <dd>{{ $withdraw->bank_name }}</dd>
            <dt>Bank Number</dt>
            <dd>{{ $withdraw->bank_number }}</dd>
            <dt>Amount</dt>
            <dd>{{ $withdraw->amount }}</dd>
            <dt>Created At</dt>
            <dd>{{ $withdraw->created_at }}</dd>
            <dt>Remark</dt>
            <dd>{{ $withdraw->remark }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $withdraw->updated_at }}</dd>
            <dt>Status</dt>
            <dd>{{ $withdraw->status }}</dd>

        </dl>

    </div>
</div>

@endsection