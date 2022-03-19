
<div class="form-group {{ $errors->has('label_id') ? 'has-error' : '' }}">
    <label for="label_id" class="col-md-2 control-label">Label</label>
    <div class="col-md-10">
        <select class="form-control" id="label_id" name="label_id">
        	    <option value="" style="display: none;" {{ old('label_id', optional($results)->label_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select label</option>
        	@foreach ($labels as $key => $label)
			    <option value="{{ $key }}" {{ old('label_id', optional($results)->label_id) == $key ? 'selected' : '' }}>
			    	{{ $label }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('label_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type_id') ? 'has-error' : '' }}">
    <label for="type_id" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <select class="form-control" id="type_id" name="type_id">
        	    <option value="" style="display: none;" {{ old('type_id', optional($results)->type_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select type</option>
        	@foreach ($types as $key => $type)
			    <option value="{{ $key }}" {{ old('type_id', optional($results)->type_id) == $key ? 'selected' : '' }}>
			    	{{ $type }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dates') ? 'has-error' : '' }}">
    <label for="dates" class="col-md-2 control-label">Dates</label>
    <div class="col-md-10">
        <input class="form-control" name="dates" type="text" id="dates" value="{{ old('dates', optional($results)->dates) }}" placeholder="Enter dates here...">
        {!! $errors->first('dates', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('one_digit') ? 'has-error' : '' }}">
    <label for="one_digit" class="col-md-2 control-label">One Digit</label>
    <div class="col-md-10">
        <input class="form-control" name="one_digit" type="number" id="one_digit" value="{{ old('one_digit', optional($results)->one_digit) }}" min="-2147483648" max="2147483647" placeholder="Enter one digit here...">
        {!! $errors->first('one_digit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('two_digit') ? 'has-error' : '' }}">
    <label for="two_digit" class="col-md-2 control-label">Two Digit</label>
    <div class="col-md-10">
        <input class="form-control" name="two_digit" type="number" id="two_digit" value="{{ old('two_digit', optional($results)->two_digit) }}" min="-2147483648" max="2147483647" placeholder="Enter two digit here...">
        {!! $errors->first('two_digit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('three_digit') ? 'has-error' : '' }}">
    <label for="three_digit" class="col-md-2 control-label">Three Digit</label>
    <div class="col-md-10">
        <input class="form-control" name="three_digit" type="number" id="three_digit" value="{{ old('three_digit', optional($results)->three_digit) }}" min="-2147483648" max="2147483647" placeholder="Enter three digit here...">
        {!! $errors->first('three_digit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($results)->status) }}" maxlength="255" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

