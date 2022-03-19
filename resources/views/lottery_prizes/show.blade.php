@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Lottery Prize' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('lottery_prizes.lottery_prize.destroy', $lotteryPrize->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('lottery_prizes.lottery_prize.index') }}" class="btn btn-primary" title="Show All Lottery Prize">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('lottery_prizes.lottery_prize.create') }}" class="btn btn-success" title="Create New Lottery Prize">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('lottery_prizes.lottery_prize.edit', $lotteryPrize->id ) }}" class="btn btn-primary" title="Edit Lottery Prize">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Lottery Prize" onclick="return confirm(&quot;Click Ok to delete Lottery Prize.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Digit</dt>
            <dd>{{ $lotteryPrize->digit }}</dd>
            <dt>Prize</dt>
            <dd>{{ $lotteryPrize->prize }}</dd>
            <dt>Wine</dt>
            <dd>{{ $lotteryPrize->wine }}</dd>
            <dt>Created At</dt>
            <dd>{{ $lotteryPrize->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $lotteryPrize->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection