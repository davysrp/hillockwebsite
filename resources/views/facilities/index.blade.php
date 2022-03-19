@extends('adminlte::page')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="fa fa-check"></span>
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
                    <h1>Facilities & Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Facilities & Services</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Facilities & Services</h3>
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

                <div class="btn-group btn-group-sm pull-right mb-2" role="group">
                    <a href="{{ route('facilities.facility.create') }}" class="btn btn-success" title="Create New Facility">
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
                        @foreach($facilities as $facility)
                            <tr>
                                <td>{{ $facility->name }}</td>

                                <td>

                                    <form method="POST" action="{!! route('facilities.facility.destroy', $facility->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}

                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            {{--<a href="{{ route('facilities.facility.show', $facility->id ) }}" class="btn btn-info" title="Show Facility">
                                                <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                            </a>--}}
                                            <a href="{{ route('facilities.facility.edit', $facility->id ) }}" class="btn btn-primary btn-sm" title="Edit Facility">
                                                <span class="fa fa-pen-alt" aria-hidden="true"></span>
                                            </a>

                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Facility" onclick="return confirm(&quot;Click Ok to delete Facility.&quot;)">
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
            <!-- /.card-body -->
            <div class="card-footer">
                {!! $facilities->render() !!}
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
