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
                    <h1>Sponsor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sponsor</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sponsor</h3>
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
                <a href="{{ route('sponsores.sponsore.create') }}" class="btn btn-success" title="Create New Sponsore">
                    <span class="fa fa-plus" aria-hidden="true"></span> Create New
                </a>

                @if(count($sponsores) == 0)
                    <h4>No Sponsores Available.</h4>
                @else
                    <div class="table-responsive mt-3">


                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Name Kh</th>
                                <th>Position</th>
                                <th>Ordered</th>
                                <th>Status</th>
                                <th>Link</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sponsores as $sponsore)
                                <tr>
                                    <td width="10%"><img src="{!! asset('image/sponsor/'.$sponsore->photo) !!}" class="w-100"></td>
                                    <td>{{ $sponsore->name }}</td>
                                    <td>{{ $sponsore->name_kh }}</td>
                                    <td>{{ $sponsore->postion }}</td>
                                    <td>{{ $sponsore->ordered }}</td>
                                    <td> @if($sponsore->status=='Yes')
                                            <span class="badge badge-success">{{ $sponsore->status }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $sponsore->status }}</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ $sponsore->link }}">Link</a> </td>

                                    <td>

                                        <form method="POST"
                                              action="{!! route('sponsores.sponsore.destroy', $sponsore->id) !!}"
                                              accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-sm pull-right btn-xs" role="group">
                                                <a href="{{ route('sponsores.sponsore.show', $sponsore->id ) }}"
                                                   class="btn btn-info btn-sm" title="Show Sponsor">
                                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                                </a>
                                                <a href="{{ route('sponsores.sponsore.edit', $sponsore->id ) }}"
                                                   class="btn btn-primary btn-sm" title="Edit Sponsore">
                                                    <span class="fa fa-edit" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Sponsore"
                                                        onclick="return confirm(&quot;Click Ok to delete Sponsore.&quot;)">
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

                @endif

            </div>
        </div>
    </section>
@endsection
