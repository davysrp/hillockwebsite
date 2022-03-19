@extends('layouts.app')

@section('content')


<div class="wrap-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>
                    Find our information!
                </h3>
                {!! $page->description !!}
            </div>
            <div class="col-md-6">
                <h3>
                    {!! $page->name !!}
                </h3>
                <p>Please fill out the form below to send us a note.</p>

                {!! Form::open(['route'=>'rooms.room.store','enctype'=>'multipart/form-data']) !!}



                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('title') !!}
                                {!! Form::select('title',['Miss.','Mr.','Mrs','Ms.'],null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('name') !!}
                                {!! Form::text('name',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('phone_number') !!}
                                {!! Form::text('phone_number',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('emails') !!}
                                {!! Form::text('emails',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('country') !!}
                                {!! Form::text('country',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('messages') !!}
                                {!! Form::textarea('messages',null,['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <script src="https://www.google.com/recaptcha/api.js?render=6Le-i40eAAAAADzdfBv55KeAEm7EChD93jQYqNx7"></script>
                            <script>
                            grecaptcha.ready(function() {
                                grecaptcha.execute('6Le-i40eAAAAADzdfBv55KeAEm7EChD93jQYqNx7', {action: 'homepage'}).then(function(token) {
                                    // pass the token to the backend script for verification
                                });
                            });
                            </script>
                    </div>
{{--                    6Le-i40eAAAAAOiu6xkf22MsjCTSXI4WqBpfNtKu--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::submit('send',['class'=>'btn btn-view']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

        <div class="row mt-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1482.4089418722324!2d103.86007536627957!3d13.34489004678014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3110177dbe2db8f5%3A0x7ed8d738e2d90d66!2sHillocks%20Hotel%20%26%20Spa%2C%20Siem%20Reap!5e0!3m2!1sen!2skh!4v1645024776494!5m2!1sen!2skh" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

    </div>


</div>


@endsection
