@extends('userprofile.userprofile')
@section('profile')
    <div class="">
        <h5>Account Information</h5>
        <div class="user-form">
            <?php

            $user = \App\Models\Member::find(\Illuminate\Support\Facades\Auth::guard('member')->id());
            ?>
            {!! Form::model($user,['route'=>['updateuserprofile',$user->id],'enctype'=>'multipart/form-data']) !!}

            <div class="form-group">
                {!! Form::label('name','នាមត្រកូល និងនាមខ្លួន') !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Email']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email','លេខទូរស័ព្ទ') !!}
                {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phonenumber','លេខទូរស័ព្ទ') !!}
                {!! Form::text('phonenumber',null,['class'=>'form-control','placeholder'=>'លេខទូរស័ព្ទ','readonly']) !!}
            </div>

            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('sex','ភេទ') !!}
                    {!! Form::select('sex',['Male'=>'ប្រុស','Female'=>'ស្រី'],null,['class'=>'form-control','placeholder'=>'ជ្រើសរើសភេទ']) !!}
                </div>
            </div>
                <div class="form-group">
                    {!! Form::label('telegram','Telegram') !!}
                    {!! Form::text('telegram',null,['class'=>'form-control','placeholder'=>'Telegram']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('facebook','Facebook') !!}
                    {!! Form::text('facebook',null,['class'=>'form-control','placeholder'=>'Facebook']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('whatapp','WhaApp') !!}
                    {!! Form::text('whatapp',null,['class'=>'form-control','placeholder'=>'WhaApp']) !!}
                </div>


            <div class="form-group">
                <button class="btn btn-register">រក្សាទុក</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop
