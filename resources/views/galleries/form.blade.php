
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($gallery)->type) }}" maxlength="255" placeholder="Enter type here...">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($gallery)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photos[]" type="file" id="photo"
               value="{{ old('photo', optional($gallery)->photo) }}" maxlength="255" multiple>
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>

    @if($gallery)
        @if($gallery->photo!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/gallery/'.$gallery->photo) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>
