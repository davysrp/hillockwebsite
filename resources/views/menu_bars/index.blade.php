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
                    <h1>Menu Bars</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Menu Bars</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @if(count($menuBars) == 0)
        <div class="panel-body text-center">
            <h4>No Menu Bars Available.</h4>
        </div>
    @else
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menu Bars</h3>

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
                    <a href="{{ route('menu_bars.menu_bar.create') }}" class="btn btn-success" title="Create New Menu Bar">
                        <span class="fa fa-plus" aria-hidden="true"></span> Add New
                    </a>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped ">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>View</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php( $i=1)
                        @foreach($menuBars as $menuBar)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $menuBar->name }}</td>
                                <td>{{ $menuBar->slug }}</td>
                                <td>{{ $menuBar->view }}</td>
                                <td>{{ $menuBar->status }}</td>

                                <td>

                                    <form method="POST" action="{!! route('menu_bars.menu_bar.destroy', $menuBar->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            <a href="{{ route('menu_bars.menu_bar.show', $menuBar->id ) }}" class="btn btn-info  btn-sm" title="Show Menu Bar">
                                                <span class="fa fa-photo-video" aria-hidden="true"></span>

                                            </a>
                                            <a href="{{ route('menu_bars.menu_bar.edit', $menuBar->id ) }}" class="btn btn-primary  btn-sm" title="Edit Menu Bar">
                                                <span class="fa fa-pen-alt" aria-hidden="true"></span>
                                            </a>

                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Menu Bar" onclick="return confirm(&quot;Click Ok to delete Menu Bar.&quot;)">
                                                <span class="fa fa-trash" aria-hidden="true"></span>
                                            </button>
                                        </div>

                                    </form>

                                </td>
                            </tr>
                            @php( $i++)
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {!! $menuBars->render() !!}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>

    @endif

@endsection
