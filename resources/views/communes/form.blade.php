
<div class="form-group {{ $errors->has('name_kh') ? 'has-error' : '' }}">
    <label for="name_kh" class="col-md-2 control-label">Name Kh</label>
    <div class="col-md-10">
        <input class="form-control" name="name_kh" type="text" id="name_kh" value="{{ old('name_kh', optional($commune)->name_kh) }}" maxlength="255" placeholder="Enter name kh here...">
        {!! $errors->first('name_kh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($commune)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('district_id') ? 'has-error' : '' }}">
    <label for="district_id" class="col-md-2 control-label">District</label>
    <div class="col-md-10">
        <select class="form-control" id="district_id" name="district_id">
        	    <option value="" style="display: none;" {{ old('district_id', optional($commune)->district_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select district</option>
        	@foreach ($Districts as $key => $District)
			    <option value="{{ $key }}" {{ old('district_id', optional($commune)->district_id) == $key ? 'selected' : '' }}>
			    	{{ $District }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('district_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($commune)->status) }}" maxlength="255" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

