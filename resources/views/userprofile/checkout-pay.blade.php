@extends('layouts.app')

@section('content')

    <?php
    $best_sellers = \App\Models\Product::all();
    ?>

    <div class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="checkout-form">
                        <h4>Shipping Information</h4>
                        <div class="shipping">

                            <form>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Phonenumber">
                                </div>
                                <div class="form-group">
                                    <label>State or Province</label>
                                    <input type="text" class="form-control" placeholder="State or Province">
                                </div>
                                <div class="form-group">
                                    <label>Area</label>
                                    <input type="text" class="form-control" placeholder="Area">
                                </div>
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" class="form-control" placeholder="Street">
                                </div>
                                <div class="form-group">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" placeholder="Zip Code">
                                </div>
                                <div class="form-group">
                                    <label>Address Type</label>
                                    <select class="form-control">
                                        <option>Home</option>
                                        <option>Office</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-register">Save</button>
                                </div>

                            </form>
                        </div>


                        <h4>Shipping Method</h4>
                        <div class="shipping">

                        </div>

                    </div>
                </div>

                <div class="col-md-6">


                    <div class="mt-5">
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $details)

                                <div class="item-card" data-id="{{ $id }}">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="thumbnail" style=""></div>
                                        </div>
                                        <div class="col-md-5">{!! $details['name'] !!}</div>
                                        <div class="col-md-2">${!! number_format($details['price'],2) !!}</div>
                                        <div class="col-md-3">
                                            <span>{!! $details['quantity'] !!}</span>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        @endif
                    </div>


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
                        <a class="btn btn-register text-white w-100">Proceed Pay</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

@section('js')


@stop

