
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($sponsore)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_kh') ? 'has-error' : '' }}">
    <label for="name_kh" class="col-md-2 control-label">Name Kh</label>
    <div class="col-md-10">
        <input class="form-control" name="name_kh" type="text" id="name_kh" value="{{ old('name_kh', optional($sponsore)->name_kh) }}" maxlength="255" placeholder="Enter name kh here...">
        {!! $errors->first('name_kh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="file" id="photo" value="{{ old('photo', optional($sponsore)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}

        @if($sponsore)
        <div class="row mt-3 mb-3">
            <div class="col-md-3">
                <img src="{!! asset('image/sponsor/'.$sponsore->photo) !!}" class="w-100">
            </div>
        </div>
        @endif
    </div>
</div>



<div class="form-group {{ $errors->has('postion') ? 'has-error' : '' }}">
    <label for="postion" class="col-md-2 control-label">Position</label>
    <div class="col-md-10">
        {!! Form::select('postion',['Header'=>'Header','Banner'=>'Banner','Footer'=>'Footer','Right'=>'Right','Left'=>'Left'],null,['class'=>'form-control','placeholder'=>'រើសរើសទីតាំង']) !!}
        {!! $errors->first('postion', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        {!! Form::select('status',['Yes'=>'Yes','No'=>'No'],null,['class'=>'form-control','placeholder'=>'រើសរើស']) !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('ordered') ? 'has-error' : '' }}">
    <label for="ordered" class="col-md-2 control-label">Ordered</label>
    <div class="col-md-10">
        <input class="form-control" name="ordered" type="text" id="ordered" value="{{ old('ordered', optional($sponsore)->ordered) }}" maxlength="255" placeholder="Enter ordered here...">
        {!! $errors->first('ordered', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
    <label for="link" class="col-md-2 control-label">Link</label>
    <div class="col-md-10">
        <input class="form-control" name="link" type="text" id="link" value="{{ old('link', optional($sponsore)->link) }}" maxlength="255" placeholder="Enter link here...">
        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
    </div>
</div>

