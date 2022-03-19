@extends('layouts.app')

@section('content')


    <style>
        .login-container {
            border-radius: 10px;
            background: #fff;
            padding: 10px;
            margin-top: 100px;
            margin-bottom: 100px;

        }
        .login-container .login-header {
            padding: 10px;
            text-align: center;
            margin-bottom: 15px;
        }
        .login-container .form-control {
            border-radius: 0px;
        }
        .btn-opt{
            cursor: pointer;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <div class="login-header">
                        <img src="{!! asset('image/battambangpost.png') !!}" class="w-50 mb-3">
                        <h5>ចុះឈ្មោះជាអ្នកប្រើប្រាស់ឯកជន</h5>
                    </div>
                    <div class="log-in-body">


                        <div class="alert alert-success" id="successAuth" style="display: none;"></div>

                        {{ Form::open() }}

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><img src="{!! asset('image/cambodia-flag.png') !!}" class="w-25"> +855</span>
                            </div>
                            <input type="text" class="form-control"  id="number" placeholder="86200005" aria-label="phone"
                                   aria-describedby="basic-addon1">
                        </div>

                        <div class="mt-3">
                            <div id="recaptcha-container" class="recaptcha-container"></div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter code" id="verification"
                                   aria-label="Enter code" aria-describedby="basic-addon2">
                            <div class="input-group-append btn-opt">
                                <span class="input-group-text" id="basic-addon2" onclick="sendOTP();">Obtain SMS Code</span>
                            </div>
                        </div>
                        <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>

                        <div class="form-group">
                            <button type="button" class="btn btn-success w-100" onclick="verify()">ចូលប្រើ</button>
                        </div>
                        <div class="form-group">
                            <a href="" class="btn btn-primary w-100" >ប្រើ Username សម្រាប់ចូលប្រើ</a>
                        </div>
                        {{ Form::close() }}

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
            var numb_2='+855'+number;
            firebase.auth().signInWithPhoneNumber(numb_2, window.recaptchaVerifier).then(function (confirmationResult) {
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
            var numb_2='+855'+number;
            coderesult.confirm(code).then(function (result) {
                var user = result.user;



                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
               if(user){
                   $("#successOtpAuth").text("Auth is successful");
                   $("#successOtpAuth").css('display', 'block');
                   $.post('{!! route('phonelogin') !!}',{phonenumber: numb_2}, function (data) {
                     var val=JSON.parse(data);
                       if (val.success == 1) {
                           document.location.href = '{!! route("home") !!}'
                       }

                   });
               }




            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        }

    </script>

@stop
