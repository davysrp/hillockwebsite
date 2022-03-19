
<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photos[]" type="file" id="photo"
               value="{{ old('photo', optional($slide)->photo) }}" maxlength="255" multiple>
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>

    @if($slide)
        @if($slide->photo!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/gallery/'.$slide->photo) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>
