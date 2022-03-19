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
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th>Room</th>
                    <th>Photo</th>

                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roomPhotos as $roomPhoto)
                    <tr>
                        <td>{{ optional($roomPhoto->room)->name }}</td>
                        <td><img src="{!! asset('image/room/'.$roomPhoto->photo) !!}" class="w-25 img-rounded"></td>

                        <td>

                            <form method="POST" action="{!! route('room_photos.room_photo.destroy', $roomPhoto->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                <div class="btn-group btn-group-xs pull-right" role="group">


                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Room Photo" onclick="return confirm(&quot;Click Ok to delete Room Photo.&quot;)">
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
