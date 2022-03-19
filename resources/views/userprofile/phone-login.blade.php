@extends('layouts.app')

@section('content')

    <div class="product-detail">
        <div class="row">

            <div class="col-md-6">
                <div class="login-description">
                    <div class="login-form">
                        <h4>Welcome to Ecommerce</h4>
                        <div class="alert alert-success" id="successAuth" style="display: none;"></div>

                        <form>
                            <label>Phone Number:</label>

                            <input type="text" id="number" class="form-control" placeholder="+91 ********"
                                   value="+855966663656">

                            <div class="mt-3">
                                <div id="recaptcha-container" class="recaptcha-container"></div>
                            </div>
                            <button type="button" class="btn btn-login mt-3" onclick="sendOTP();">Send OTP</button>
                        </form>


                        <div class="verify mt-5" style="display: none" id="verify">
                            <h4>Enter verification code</h4>
                            <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                            <form>
                                <input type="text" id="verification" class="form-control"
                                       placeholder="Verification code">
                                <button type="button" class="btn btn-danger mt-3" onclick="verify()">Verify code
                                </button>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
            <div class="col-md-6">

                <div class="login-description">
                    <div class="text-left">
                        <h4>New to Ubuy ?</h4>
                        <a href="{!! route('userregister') !!}" class="btn btn-register">Create new account</a>
                        <div class="mt-3">
                            <ul class="list-group">
                                <li class="list-group-item">Delivering in 10000+ Cities</li>
                                <li class="list-group-item">Presence in 6 Continents</li>
                                <li class="list-group-item">100 Million Products</li>
                                <li class="list-group-item">10 Million Happy Customers & Counting</li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@stop
@section('js')

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.1/firebase-auth.js"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-analytics.js"></script>

    <script>
        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        var firebaseConfig = {
            apiKey: "AIzaSyBlQPJwyUqaR7rbD8zKcAz9ewnH7ise4yk",
            authDomain: "kcrealestate-dd962.firebaseapp.com",
            projectId: "kcrealestate-dd962",
            storageBucket: "kcrealestate-dd962.appspot.com",
            messagingSenderId: "939595375960",
            appId: "1:939595375960:web:883d4f1042beea04d6312d",
            measurementId: "G-BSMQ5PX20J"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>



    <script type="text/javascript">


        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container',{
            'size': 'invisible',
            'callback': (response) => {
            }
        });
        recaptchaVerifier.render();

        $('#login').on('click',function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            $.post('{!! route('phonelogin') !!}',{phonenumber: '855966663656'}, function (data) {
                if (data) {
                    window.location.href = "{!! route('user-profile') !!}";
                }
            });

        })


        function sendOTP() {
            var number = $("#number").val();
            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;
                console.log(coderesult);
                $("#successAuth").text("Message sent");
                $("#successAuth").show();
                $("#verify").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

        function verify() {
            var code = $("#verification").val();
            var number = $("#number").val();
            coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(user);


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.post('{!! route('phonelogin') !!}',{phonenumber: number}, function (data) {
                    if (data) {
                        window.location.href = "{!! route('user-profile') !!}";
                    }
                });


                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").css('display', 'block');
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

    </script>

@stop
