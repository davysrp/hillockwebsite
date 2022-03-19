
<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="text" id="photo" value="{{ old('photo', optional($spaPhoto)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('spa_id') ? 'has-error' : '' }}">
    <label for="spa_id" class="col-md-2 control-label">Spa</label>
    <div class="col-md-10">
        <select class="form-control" id="spa_id" name="spa_id">
        	    <option value="" style="display: none;" {{ old('spa_id', optional($spaPhoto)->spa_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select spa</option>
        	@foreach ($spas as $key => $spa)
			    <option value="{{ $key }}" {{ old('spa_id', optional($spaPhoto)->spa_id) == $key ? 'selected' : '' }}>
			    	{{ $spa }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('spa_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

