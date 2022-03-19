
<div class="form-group {{ $errors->has('name_kh') ? 'has-error' : '' }}">
    <label for="name_kh" class="col-md-2 control-label">Name Kh</label>
    <div class="col-md-10">
        <input class="form-control" name="name_kh" type="text" id="name_kh" value="{{ old('name_kh', optional($district)->name_kh) }}" maxlength="255" placeholder="Enter name kh here...">
        {!! $errors->first('name_kh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($district)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('province_id') ? 'has-error' : '' }}">
    <label for="province_id" class="col-md-2 control-label">Province</label>
    <div class="col-md-10">
        <select class="form-control" id="province_id" name="province_id">
        	    <option value="" style="display: none;" {{ old('province_id', optional($district)->province_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select province</option>
        	@foreach ($Provinces as $key => $Province)
			    <option value="{{ $key }}" {{ old('province_id', optional($district)->province_id) == $key ? 'selected' : '' }}>
			    	{{ $Province }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('province_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('updatedat') ? 'has-error' : '' }}">
    <label for="updatedat" class="col-md-2 control-label">Updatedat</label>
    <div class="col-md-10">
        <input class="form-control" name="updatedat" type="text" id="updatedat" value="{{ old('updatedat', optional($district)->updatedat) }}" placeholder="Enter updatedat here...">
        {!! $errors->first('updatedat', '<p class="help-block">:message</p>') !!}
    </div>
</div>

