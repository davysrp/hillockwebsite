@extends('adminlte::page')

@section('content')


    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-plus"></span>
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
                    <h1>Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Package</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Package</h3>

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
                    <a href="{{ route('packages.package.create') }}" class="btn btn-success" title="Create New Menu Bar">
                        <span class="fa fa-plus" aria-hidden="true"></span> Add New
                    </a>
                </div>



                <div class="table-responsive">

                    <table class="table table-striped ">
                        <thead>
                        <tr>
                            <th>Name</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($packages as $package)
                            <tr>
                                <td>{{ $package->name }}</td>

                                <td>

                                    <form method="POST" action="{!! route('packages.package.destroy', $package->id) !!}"
                                          accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            <a href="{{ route('packages.package.show', $package->id ) }}"
                                               class="btn btn-info  btn-sm" title="Show Package">
                                                <span class="fa fa-photo-video" aria-hidden="true"></span>
                                            </a>
                                            <a href="{{ route('packages.package.edit', $package->id ) }}"
                                               class="btn btn-primary btn-sm" title="Edit Package">
                                                <span class="fa fa-pen-alt" aria-hidden="true"></span>
                                            </a>

                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Package"
                                                    onclick="return confirm(&quot;Click Ok to delete Package.&quot;)">
                                                <span class="fa fa-trash" aria-hidden="true"></span>
                                            </button>
                                        </div>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {!! $packages->render() !!}
                </div>


            </div>
        </div>
    </section>


@endsection
