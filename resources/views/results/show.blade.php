@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Results' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('results.results.destroy', $results->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('results.results.index') }}" class="btn btn-primary" title="Show All Results">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('results.results.create') }}" class="btn btn-success" title="Create New Results">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('results.results.edit', $results->id ) }}" class="btn btn-primary" title="Edit Results">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Results" onclick="return confirm(&quot;Click Ok to delete Results.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Label</dt>
            <dd>{{ optional($results->label)->name }}</dd>
            <dt>Type</dt>
            <dd>{{ optional($results->type)->name }}</dd>
            <dt>Dates</dt>
            <dd>{{ $results->dates }}</dd>
            <dt>One Digit</dt>
            <dd>{{ $results->one_digit }}</dd>
            <dt>Two Digit</dt>
            <dd>{{ $results->two_digit }}</dd>
            <dt>Three Digit</dt>
            <dd>{{ $results->three_digit }}</dd>
            <dt>Created At</dt>
            <dd>{{ $results->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $results->updated_at }}</dd>
            <dt>Status</dt>
            <dd>{{ $results->status }}</dd>

        </dl>

    </div>
</div>

@endsection