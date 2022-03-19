@extends('adminlte::page')
@section('content')

<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Room Photo</h3>

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
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                    <tr>
                        <th>Package</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($packagePhotos as $packagePhoto)
                        <tr>
                            <td>{{ optional($packagePhoto->package)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('package_photos.package_photo.destroy', $packagePhoto->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">

                                        <button type="submit" class="btn btn-danger btn-sm"  title="Delete Package Photo" onclick="return confirm(&quot;Click Ok to delete Package Photo.&quot;)">
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
    </div>
</section>

@endsection
