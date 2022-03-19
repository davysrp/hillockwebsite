@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Menu Bar Photo</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Menu Bar Photo</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Menu Bar Photo</h3>

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
                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>
                            Photo
                        </th>
                        <th>Menu Bar</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($menuBarGalleries as $menuBarGallery)
                        <tr>
                            <td style="width: 20%">
                                <img src="{!! asset('image/menu/'.$menuBarGallery->photo) !!}" style="width: 100%">
                            </td>
                            <td>{{ optional($menuBarGallery->menuBar)->name }}</td>

                            <td>

                                <form method="POST"
                                      action="{!! route('menu_bar_galleries.menu_bar_gallery.destroy', $menuBarGallery->id) !!}"
                                      accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Menu Bar Gallery"
                                                onclick="return confirm(&quot;Click Ok to delete Menu Bar Gallery.&quot;)">
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
    </section>
@endsection
