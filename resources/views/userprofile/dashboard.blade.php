@extends('userprofile.userprofile')
@section('profile')
    <div class="">
        <?php

        $user = \App\Models\Member::find(\Illuminate\Support\Facades\Auth::guard('member')->id());
        ?>
        {!! Form::model($user,['route'=>['updatepassword',$user->id],'enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('username','ឈ្មោះប្រើប្រាស់(Username)') !!}
            {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'ឈ្មោះប្រើប្រាស់(Username)']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','លេខកូដ') !!}
            {!! Form::password('password',['class'=>'form-control','placeholder'=>'******']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('confirm_password','បញ្ចាំក់លេខកូដ') !!}
            {!! Form::password('confirm_password',['class'=>'form-control','placeholder'=>'******']) !!}
        </div>
        <div class="form-group">
            <button class="btn btn-register">រក្សាទុក</button>
        </div>
        {!! Form::close() !!}
    </div>
@stop
