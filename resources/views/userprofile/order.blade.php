@extends('userprofile.userprofile')
@section('profile')
    <div class="">
        <h5>My Ordered</h5>
        <?php
        $best_sellers = \App\Models\Product::all();
        ?>

        <div class="row">
            @foreach($best_sellers as $item)
                <div class="col-md-4">
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
                </div>
            @endforeach
        </div>
    </div>
@stop
