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
                <h4 class="mt-5 mb-5">Balances</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('balances.balance.create') }}" class="btn btn-success" title="Create New Balance">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($balances) == 0)
            <div class="panel-body text-center">
                <h4>No Balances Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Ipaddress</th>
                            <th>Topup Date</th>
                            <th>Approve Date</th>
                            <th>Approve By</th>
                            <th>Bank</th>
                            <th>Bank Name</th>
                            <th>Bank Number</th>
                            <th>Amount</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($balances as $balance)
                        <tr>
                            <td>{{ $balance->ipaddress }}</td>
                            <td>{{ $balance->topup_date }}</td>
                            <td>{{ $balance->approve_date }}</td>
                            <td>{{ optional($balance->approveBy)->id }}</td>
                            <td>{{ optional($balance->bank)->name }}</td>
                            <td>{{ $balance->bank_name }}</td>
                            <td>{{ $balance->bank_number }}</td>
                            <td>{{ $balance->amount }}</td>
                            <td>{{ $balance->status }}</td>

                            <td>

                                <form method="POST" action="{!! route('balances.balance.destroy', $balance->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('balances.balance.show', $balance->id ) }}" class="btn btn-info" title="Show Balance">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('balances.balance.edit', $balance->id ) }}" class="btn btn-primary" title="Edit Balance">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Balance" onclick="return confirm(&quot;Click Ok to delete Balance.&quot;)">
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
            {!! $balances->render() !!}
        </div>

        @endif

    </div>
@endsection
