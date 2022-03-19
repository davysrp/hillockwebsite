
<div class="form-group {{ $errors->has('name_kh') ? 'has-error' : '' }}">
    <label for="name_kh" class="col-md-2 control-label">Name Kh</label>
    <div class="col-md-10">
        <input class="form-control" name="name_kh" type="text" id="name_kh" value="{{ old('name_kh', optional($village)->name_kh) }}" maxlength="255" placeholder="Enter name kh here...">
        {!! $errors->first('name_kh', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($village)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('commune_id') ? 'has-error' : '' }}">
    <label for="commune_id" class="col-md-2 control-label">Commune</label>
    <div class="col-md-10">
        <select class="form-control" id="commune_id" name="commune_id">
        	    <option value="" style="display: none;" {{ old('commune_id', optional($village)->commune_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select commune</option>
        	@foreach ($Communes as $key => $Commune)
			    <option value="{{ $key }}" {{ old('commune_id', optional($village)->commune_id) == $key ? 'selected' : '' }}>
			    	{{ $Commune }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('commune_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

