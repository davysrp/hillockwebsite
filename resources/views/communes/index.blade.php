@extends('layouts.app')

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
                <h4 class="mt-5 mb-5">Communes</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('communes.commune.create') }}" class="btn btn-success" title="Create New Commune">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($communes) == 0)
            <div class="panel-body text-center">
                <h4>No Communes Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name Kh</th>
                            <th>Name</th>
                            <th>District</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($communes as $commune)
                        <tr>
                            <td>{{ $commune->name_kh }}</td>
                            <td>{{ $commune->name }}</td>
                            <td>{{ optional($commune->District)->name }}</td>
                            <td>{{ $commune->status }}</td>

                            <td>

                                <form method="POST" action="{!! route('communes.commune.destroy', $commune->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('communes.commune.show', $commune->id ) }}" class="btn btn-info" title="Show Commune">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('communes.commune.edit', $commune->id ) }}" class="btn btn-primary" title="Edit Commune">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Commune" onclick="return confirm(&quot;Click Ok to delete Commune.&quot;)">
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
            {!! $communes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection