@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($promotion->name) ? $promotion->name : 'Promotion' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('promotions.promotion.destroy', $promotion->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('promotions.promotion.index') }}" class="btn btn-primary" title="Show All Promotion">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('promotions.promotion.create') }}" class="btn btn-success" title="Create New Promotion">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('promotions.promotion.edit', $promotion->id ) }}" class="btn btn-primary" title="Edit Promotion">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Promotion" onclick="return confirm(&quot;Click Ok to delete Promotion.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Photo</dt>
            <dd>{{ $promotion->photo }}</dd>
            <dt>Name</dt>
            <dd>{{ $promotion->name }}</dd>
            <dt>Status</dt>
            <dd>{{ $promotion->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $promotion->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $promotion->updated_at }}</dd>
            <dt>Description</dt>
            <dd>{{ $promotion->description }}</dd>

        </dl>

    </div>
</div>

@endsection
