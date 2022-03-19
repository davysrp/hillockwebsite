
<div class="form-group {{ $errors->has('type_id') ? 'has-error' : '' }}">
    <label for="type_id" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <select class="form-control" id="type_id" name="type_id">
        	    <option value="" style="display: none;" {{ old('type_id', optional($typeLabel)->type_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select type</option>
        	@foreach ($types as $key => $type)
			    <option value="{{ $key }}" {{ old('type_id', optional($typeLabel)->type_id) == $key ? 'selected' : '' }}>
			    	{{ $type }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('label_id') ? 'has-error' : '' }}">
    <label for="label_id" class="col-md-2 control-label">Label</label>
    <div class="col-md-10">
        <select class="form-control" id="label_id" name="label_id">
        	    <option value="" style="display: none;" {{ old('label_id', optional($typeLabel)->label_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select label</option>
        	@foreach ($labels as $key => $label)
			    <option value="{{ $key }}" {{ old('label_id', optional($typeLabel)->label_id) == $key ? 'selected' : '' }}>
			    	{{ $label }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('label_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

