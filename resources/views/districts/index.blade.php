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
                <h4 class="mt-5 mb-5">Districts</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('districts.district.create') }}" class="btn btn-success" title="Create New District">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($districts) == 0)
            <div class="panel-body text-center">
                <h4>No Districts Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name Kh</th>
                            <th>Name</th>
                            <th>Province</th>
                            <th>Updatedat</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($districts as $district)
                        <tr>
                            <td>{{ $district->name_kh }}</td>
                            <td>{{ $district->name }}</td>
                            <td>{{ optional($district->Province)->name }}</td>
                            <td>{{ $district->updatedat }}</td>

                            <td>

                                <form method="POST" action="{!! route('districts.district.destroy', $district->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('districts.district.show', $district->id ) }}" class="btn btn-info" title="Show District">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('districts.district.edit', $district->id ) }}" class="btn btn-primary" title="Edit District">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete District" onclick="return confirm(&quot;Click Ok to delete District.&quot;)">
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
            {!! $districts->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection