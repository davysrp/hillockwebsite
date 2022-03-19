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
                <h4 class="mt-5 mb-5">Promotions</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('promotions.promotion.create') }}" class="btn btn-success"
                   title="Create New Promotion">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($promotions) == 0)
            <div class="panel-body text-center">
                <h4>No Promotions Available.</h4>
            </div>
        @else
            <div class="panel-body panel-body-with-table">
                <div class="table-responsive">

                    <table class="table table-striped ">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($promotions as $promotion)
                            <tr>
                                <td>{{ $promotion->name }}</td>
                                <td>{{ $promotion->status }}</td>

                                <td>

                                    <form method="POST"
                                          action="{!! route('promotions.promotion.destroy', $promotion->id) !!}"
                                          accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            {{-- <a href="{{ route('promotions.promotion.show', $promotion->id ) }}" class="btn btn-info" title="Show Promotion">
                                                 <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                             </a>--}}
                                            <a href="{{ route('promotions.promotion.edit', $promotion->id ) }}"
                                               class="btn btn-primary  btn-sm" title="Edit Promotion">
                                                <span class="fa fa-edit" aria-hidden="true"></span>
                                            </a>

                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Promotion"
                                                    onclick="return confirm(&quot;Click Ok to delete Promotion.&quot;)">
                                                <span class="fa fa-trash" aria-hidden="true"></span>
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
                {!! $promotions->render() !!}
            </div>

        @endif

    </div>


@endsection


