
<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="text" id="photo" value="{{ old('photo', optional($packagePhoto)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('package_id') ? 'has-error' : '' }}">
    <label for="package_id" class="col-md-2 control-label">Package</label>
    <div class="col-md-10">
        <select class="form-control" id="package_id" name="package_id">
        	    <option value="" style="display: none;" {{ old('package_id', optional($packagePhoto)->package_id ?: '') == '' ? 'selected' : '' }} disabled selected>Enter package here...</option>
        	@foreach ($packages as $key => $package)
			    <option value="{{ $key }}" {{ old('package_id', optional($packagePhoto)->package_id) == $key ? 'selected' : '' }}>
			    	{{ $package }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('package_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

