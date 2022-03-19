@extends('adminlte::page')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ !empty($product->name) ? $product->name : 'Product' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ !empty($product->name) ? $product->name : 'Product' }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ !empty($product->name) ? $product->name : 'Product' }}</h3>

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
                    {!! Form::model($product,['route'=>['products.product.update',$product->id],'enctype'=>'multipart/form-data']) !!}
                    <input name="_method" type="hidden" value="PUT">
                    @include ('products.form', [
                                                'product' => $product,
                                              ])


                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="btn-group btn-group-sm pull-right" role="group">

                    <a href="{{ route('products.product.index') }}" class="btn btn-primary" title="Show All Product">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('products.product.create') }}" class="btn btn-success" title="Create New Product">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
