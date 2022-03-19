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

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">View</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="btn-group btn-group-sm pull-right mb-3" role="group">
                    <a href="{{ route('views.view.create') }}" class="btn btn-success" title="Create New View">
                        <span class="fa fa-plus" aria-hidden="true"></span> Add New
                    </a>
                </div>
                <div class="table-responsive">

                    <table class="table table-striped ">
                        <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Name Kh</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($views as $view)
                            <tr>
                                <td>{!! $view->icon !!}</td>
                                <td>{{ $view->name }}</td>
                                <td>{{ $view->name_kh }}</td>

                                <td>

                                    <form method="POST" action="{!! route('views.view.destroy', $view->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                          {{--  <a href="{{ route('views.view.show', $view->id ) }}" class="btn btn-info" title="Show View">
                                                <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                            </a>--}}
                                            <a href="{{ route('views.view.edit', $view->id ) }}" class="btn btn-primary btn-sm" title="Edit View">
                                                <span class="fa fa-edit" aria-hidden="true"></span>
                                            </a>

                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete View" onclick="return confirm(&quot;Click Ok to delete View.&quot;)">
                                                <span class="fa fa-trash-alt" aria-hidden="true"></span>
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
        </div>
    </section>
@endsection
