@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create New Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Create New Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create New Product</h3>

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
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                    <div class="btn-group btn-group-sm float-right" role="group">
                        <a href="{{ route('provinces.province.index') }}" class="btn btn-primary" title="Show All Province">
                            <span class="fa fa-th-list" aria-hidden="true"></span> View All
                        </a>
                    </div>



                <form method="POST" action="{{ route('provinces.province.store') }}" enctype="multipart/form-data" accept-charset="UTF-8" id="create_province_form" name="create_province_form" class="form-horizontal">
                    {{ csrf_field() }}
                    @include ('provinces.form', [
                                                'province' => null,
                                              ])

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input class="btn btn-primary" type="submit" value="Add">
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>

@endsection


