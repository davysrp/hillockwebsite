@extends('layouts.app')

@section('content')

    <?php
    $best_sellers = \App\Models\Product::all();
    ?>

    <div class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="checkout-form">
                        <h4>Shopping Cart {{ count((array) session('cart')) }} item(s)</h4>

                        <div class="mt-5">
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    {{--<div class="item-rating" data-id="{{ $id }}">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="thumbnail" style="--}}{{--
                                            @if($details->photo!='')
                                                background: url({!! $details->photo !!})
                                            @else
                                                background: url({!! asset('assets/img/person.svg') !!})
                                            @endif
                                                --}}{{--"></div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6>{!! $details['name'] !!}</h6>
                                            </div>
                                            <div class="col-md-2 text-center">
                                                <h6>${!! number_format($details['price'],2) !!}</h6>

                                                <input type="number" class="form-control update-cart"
                                                       value="{!! $details['quantity'] !!}">
                                                <br>
                                                <button class="btn btn-danger remove-from-cart"><i class="bi bi-trash"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>--}}

                                    <div class="item-card" data-id="{{ $id }}">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="thumbnail" style=""></div>
                                            </div>
                                            <div class="col-md-5">{!! $details['name'] !!}</div>
                                            <div class="col-md-2">${!! number_format($details['price'],2) !!}</div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control update-cart"
                                                       value="{!! $details['quantity'] !!}">
                                            </div>
                                            <div class="col-md-1">
                                                <button class="btn btn-danger btn-sm remove-from-cart">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                         fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                        <path fill-rule="evenodd"
                                                              d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @endif
                        </div>


                        <a href="{!! route('index') !!}" class="btn btn-login mt-5">Continue shopping <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                            </svg></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <h4>Order Summary</h4>
                    @php $total = 0 @endphp
                    @foreach((array) session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp
                    @endforeach

                    <ul class="list-group list-group-horizontal mb-2">
                        <li class="list-group-item">Subtotal <span
                                class="float-right">$ {{ number_format($total,2)  }}</span></li>
                        <li class="list-group-item">Shipping Fee:<span class="float-right">
Calculating at checkout</span></li>
                        <li class="list-group-item">Customs: <span class="float-right">
Calculating at checkout</span></li>
                        <li class="list-group-item">Estimated Total: <span class="float-right">KHR79,344.00</span></li>
                    </ul>
                    <div class="text-center">
                        <a class="btn btn-register text-white w-100" href="{!! route('checkoutpay') !!}">Proceed Checkout</a>
                    </div>

                    <div class="mt-3">
                        <h4>Discount Codes</h4>
                        <div class="form-group">
                            <input class="form-control" placeholder="Apply coupon">
                        </div>
                        <a class="btn btn-register text-white">Apply coupon</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="product-detail">
        <div class="container-fluid">
            <?php
            $best_sellers = \App\Models\Product::all();
            ?>
            <div class="category-container">
                <div class="cat-title">
                    <h3 class="border_section">
                        Products may you like
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach($best_sellers as $item)
                    <div class="col-md-3">
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
    </div>
@stop

@section('js')
    <script type="text/javascript">

        $(".update-cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('updatecart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('removecard') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });

    </script>

@stop
