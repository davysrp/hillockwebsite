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
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Products</h3>
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
                @if(count($blogCategories) == 0)
                    <h4>No Blog Categories Available.</h4>
                @else

                    <div class="btn-group btn-group-sm pull-right mb-3" role="group">
                        <a href="{{ route('blog_categories.blog_category.create') }}" class="btn btn-success"
                           title="Create New Blog Category">
                            <span class="fa fa-plus" aria-hidden="true"></span> Add New
                        </a>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($blogCategories as $blogCategory)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $blogCategory->name }}</td>

                                    <td>

                                        <form method="POST"
                                              action="{!! route('blog_categories.blog_category.destroy', $blogCategory->id) !!}"
                                              accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('blog_categories.blog_category.edit', $blogCategory->id ) }}"
                                                   class="btn btn-primary btn-sm" title="Edit Blog Category">
                                                    <span class="fa fa-edit" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Blog Category"
                                                        onclick="return confirm(&quot;Click Ok to delete Blog Category.&quot;)">
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

                    {!! $blogCategories->render() !!}

                @endif
            </div>
        </div>
    </section>
@endsection
