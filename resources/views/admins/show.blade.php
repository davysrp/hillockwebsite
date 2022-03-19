@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($admin->name) ? $admin->name : 'Admin' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admins.admin.destroy', $admin->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admins.admin.index') }}" class="btn btn-primary" title="Show All Admin">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('admins.admin.create') }}" class="btn btn-success" title="Create New Admin">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('admins.admin.edit', $admin->id ) }}" class="btn btn-primary" title="Edit Admin">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Admin" onclick="return confirm(&quot;Click Ok to delete Admin.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $admin->name }}</dd>
            <dt>Email</dt>
            <dd>{{ $admin->email }}</dd>
            <dt>Email Verified At</dt>
            <dd>{{ $admin->email_verified_at }}</dd>
            <dt>Password</dt>
            <dd>{{ $admin->password }}</dd>
            <dt>Remember Token</dt>
            <dd>{{ $admin->remember_token }}</dd>
            <dt>Created At</dt>
            <dd>{{ $admin->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $admin->updated_at }}</dd>
            <dt>Type</dt>
            <dd>{{ $admin->type }}</dd>
            <dt>Phonenumber</dt>
            <dd>{{ $admin->phonenumber }}</dd>

        </dl>

    </div>
</div>

@endsection