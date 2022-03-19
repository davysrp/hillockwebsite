@extends('userprofile.userprofile')
@section('profile')
    <div class="">

        <?php
        $best_sellers = \App\Models\Product::all()
        ?>

        <div class="row">
            <div class="col-md-12">
                <a href="{!! route('addproperty') !!}" class="btn btn-primary mb-2">បញ្ចូលអចលនទ្រព្យ</a>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ឈ្មោះ</td>
                        <td>ទីតាំង</td>
                        <td>ស្ថានភាព</td>
                        <td>លក់/ទិញ</td>
                        <td>#</td>
                    </tr>
                    </thead>

                    @foreach($best_sellers as $item)
                        <tr>
                            <td>{!! \Illuminate\Support\Str::limit($item->name_kh,40)  !!}</td>
                            <td>{!! $item->province->name_kh  !!}</td>
                            <td>{!! $item->status  !!}</td>
                            <td>{!! $item->type->name_kh  !!}</td>
                            <td>
                                <form method="POST" action="{!! route('removeProperty', $item->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{!! route('productdetail',$item->id) !!}" class="btn btn-info  btn-sm" target="_blank"  title="Show Product">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('editproperty', $item->id ) }}" class="btn btn-primary  btn-sm" title="Edit Product">
                                            <span class="far fa-edit" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Click Ok to delete Product.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                            </td>
                        </tr>
                        {{--<div class="col-md-4">
                            <div class="pro-item">
                                <a href="{!! route('productdetail',$item->id) !!}">
                                    <div class="pro-thumbnail"
                                         style="background: url(https://m.media-amazon.com/images/I/61APQfl-EQL._AC_UX300_.jpg)">
                                        <div class="status">
                                            <small>On Sale</small>
                                        </div>
                                        <div class="btn-like">
                                            <i class="bi bi-heart"></i>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h6>{!! \Illuminate\Support\Str::limit($item->name,40)  !!}</h6></div>
                                        <div class="col-md-3">
                                            <div class="read-more">
                                                <i class="bi bi-arrow-right-short"></i>
                                            </div>

                                        </div>
                                    </div>

                                </a>
                            </div>
                        </div>--}}
                    @endforeach
                </table>

            </div>
        </div>
    </div>
@stop

@section('js')



    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZG9ybmRhdnkiLCJhIjoiY2t2bnpmaGE3NmRjbDJvcXB5bTNqYm1rMCJ9.TUFf0zVpOD_Q3P7PercKmA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11'
        });
    </script>
@stop
