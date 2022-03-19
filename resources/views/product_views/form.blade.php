
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productView)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($Products as $key => $Product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productView)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $Product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('view_id') ? 'has-error' : '' }}">
    <label for="view_id" class="col-md-2 control-label">View</label>
    <div class="col-md-10">
        <select class="form-control" id="view_id" name="view_id">
        	    <option value="" style="display: none;" {{ old('view_id', optional($productView)->view_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select view</option>
        	@foreach ($Views as $key => $View)
			    <option value="{{ $key }}" {{ old('view_id', optional($productView)->view_id) == $key ? 'selected' : '' }}>
			    	{{ $View }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('view_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

