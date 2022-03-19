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
                    <h1>Coupons</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Coupons</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    @if(count($coupons) == 0)
        <div class="panel-body text-center">
            <h4>No Coupons Available.</h4>
        </div>
    @else
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

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
                    <div class="btn-group btn-group-sm pull-right" role="group">
                        <a href="{{ route('coupons.coupon.create') }}" class="btn btn-success" title="Create New Coupon">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>
                    </div>
                    <div class="table-responsive">

                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>End Date</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->name }}</td>
                                    <td>{{ $coupon->discount }}</td>
                                    <td>{{ $coupon->status }}</td>
                                    <td>{{ $coupon->end_date }}</td>

                                    <td>

                                        <form method="POST"
                                              action="{!! route('coupons.coupon.destroy', $coupon->id) !!}"
                                              accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('coupons.coupon.show', $coupon->id ) }}"
                                                   class="btn btn-info" title="Show Coupon">
                                                    <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('coupons.coupon.edit', $coupon->id ) }}"
                                                   class="btn btn-primary" title="Edit Coupon">
                                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger" title="Delete Coupon"
                                                        onclick="return confirm(&quot;Click Ok to delete Coupon.&quot;)">
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
                <!-- /.card-body -->
                <div class="card-footer">
                    {!! $coupons->render() !!}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>

    @endif
@endsection
