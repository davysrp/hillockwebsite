
<div class="form-group {{ $errors->has('icon') ? 'has-error' : '' }}">
    <label for="icon" class="col-md-2 control-label">Icon</label>
    <div class="col-md-10">
        <input class="form-control" name="icon" type="text" id="icon" value="{{ old('icon', optional($feature)->icon) }}" maxlength="255" placeholder="Enter icon here...">
        {!! $errors->first('icon', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($feature)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name_kh') ? 'has-error' : '' }}">
    <label for="name_kh" class="col-md-2 control-label">Name Kh</label>
    <div class="col-md-10">
        <input class="form-control" name="name_kh" type="text" id="name_kh" value="{{ old('name_kh', optional($feature)->name_kh) }}" maxlength="255" placeholder="Enter name kh here...">
        {!! $errors->first('name_kh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

