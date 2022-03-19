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
                <h4 class="mt-5 mb-5">Admins</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('admins.admin.create') }}" class="btn btn-success" title="Create New Admin">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($admins) == 0)
            <div class="panel-body text-center">
                <h4>No Admins Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Email Verified At</th>
                            <th>Password</th>
                            <th>Remember Token</th>
                            <th>Type</th>
                            <th>Phonenumber</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->email_verified_at }}</td>
                            <td>{{ $admin->password }}</td>
                            <td>{{ $admin->remember_token }}</td>
                            <td>{{ $admin->type }}</td>
                            <td>{{ $admin->phonenumber }}</td>

                            <td>

                                <form method="POST" action="{!! route('admins.admin.destroy', $admin->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('admins.admin.show', $admin->id ) }}" class="btn btn-info" title="Show Admin">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('admins.admin.edit', $admin->id ) }}" class="btn btn-primary" title="Edit Admin">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Admin" onclick="return confirm(&quot;Click Ok to delete Admin.&quot;)">
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
            {!! $admins->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection