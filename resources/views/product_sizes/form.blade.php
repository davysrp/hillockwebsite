
<div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
    <label for="size" class="col-md-2 control-label">Size</label>
    <div class="col-md-10">
        <input class="form-control" name="size" type="text" id="size" value="{{ old('size', optional($productSize)->size) }}" maxlength="255" placeholder="Enter size here...">
        {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productSize)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($products as $key => $product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productSize)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

