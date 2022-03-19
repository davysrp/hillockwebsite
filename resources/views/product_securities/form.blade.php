
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productSecurity)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($products as $key => $product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productSecurity)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('security_id') ? 'has-error' : '' }}">
    <label for="security_id" class="col-md-2 control-label">Security</label>
    <div class="col-md-10">
        <select class="form-control" id="security_id" name="security_id">
        	    <option value="" style="display: none;" {{ old('security_id', optional($productSecurity)->security_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select security</option>
        	@foreach ($securities as $key => $security)
			    <option value="{{ $key }}" {{ old('security_id', optional($productSecurity)->security_id) == $key ? 'selected' : '' }}>
			    	{{ $security }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('security_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

