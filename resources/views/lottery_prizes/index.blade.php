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
                <h4 class="mt-5 mb-5">Lottery Prizes</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('lottery_prizes.lottery_prize.create') }}" class="btn btn-success" title="Create New Lottery Prize">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($lotteryPrizes) == 0)
            <div class="panel-body text-center">
                <h4>No Lottery Prizes Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Digit</th>
                            <th>Prize</th>
                            <th>Wine</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($lotteryPrizes as $lotteryPrize)
                        <tr>
                            <td>{{ $lotteryPrize->digit }}</td>
                            <td>{{ $lotteryPrize->prize }}</td>
                            <td>{{ $lotteryPrize->wine }}</td>

                            <td>

                                <form method="POST" action="{!! route('lottery_prizes.lottery_prize.destroy', $lotteryPrize->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
{{--                                        <a href="{{ route('lottery_prizes.lottery_prize.show', $lotteryPrize->id ) }}" class="btn btn-info" title="Show Lottery Prize">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>--}}
                                        <a href="{{ route('lottery_prizes.lottery_prize.edit', $lotteryPrize->id ) }}" class="btn btn-primary btn-sm" title="Edit Lottery Prize">
                                            <span class="fa fa-pen-alt" aria-hidden="true"></span>
                                        </a>
{{--
                                        <button type="submit" class="btn btn-danger" title="Delete Lottery Prize" onclick="return confirm(&quot;Click Ok to delete Lottery Prize.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>--}}
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
            {!! $lotteryPrizes->render() !!}
        </div>

        @endif

    </div>
@endsection
