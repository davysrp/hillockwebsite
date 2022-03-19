
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productFeature)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($products as $key => $product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productFeature)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('feature_id') ? 'has-error' : '' }}">
    <label for="feature_id" class="col-md-2 control-label">Feature</label>
    <div class="col-md-10">
        <select class="form-control" id="feature_id" name="feature_id">
        	    <option value="" style="display: none;" {{ old('feature_id', optional($productFeature)->feature_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select feature</option>
        	@foreach ($features as $key => $feature)
			    <option value="{{ $key }}" {{ old('feature_id', optional($productFeature)->feature_id) == $key ? 'selected' : '' }}>
			    	{{ $feature }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('feature_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

