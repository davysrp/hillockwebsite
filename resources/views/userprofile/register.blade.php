@extends('layouts.app')

@section('content')

    <div class="product-detail">
        <div class="row">
            <div class="col-md-6">
                <img src="{!! asset('assets/img/create_account_banner.jpg') !!}">
            </div>
            <div class="col-md-6">
                <div class="login-description">
                    <h4 class="text-left">Welcome to Ecommerce</h4>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">+855</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                   aria-describedby="basic-addon1">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-login" value="Login">
                        </div>
                        <p>Already have an account ? <a href="{!! route('userlogin') !!}">login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
