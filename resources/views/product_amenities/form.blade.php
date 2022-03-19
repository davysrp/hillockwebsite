
<div class="form-group {{ $errors->has('product_id') ? 'has-error' : '' }}">
    <label for="product_id" class="col-md-2 control-label">Product</label>
    <div class="col-md-10">
        <select class="form-control" id="product_id" name="product_id">
        	    <option value="" style="display: none;" {{ old('product_id', optional($productAmenity)->product_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select product</option>
        	@foreach ($products as $key => $product)
			    <option value="{{ $key }}" {{ old('product_id', optional($productAmenity)->product_id) == $key ? 'selected' : '' }}>
			    	{{ $product }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('amenity_id') ? 'has-error' : '' }}">
    <label for="amenity_id" class="col-md-2 control-label">Amenity</label>
    <div class="col-md-10">
        <select class="form-control" id="amenity_id" name="amenity_id">
        	    <option value="" style="display: none;" {{ old('amenity_id', optional($productAmenity)->amenity_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select amenity</option>
        	@foreach ($amenities as $key => $amenity)
			    <option value="{{ $key }}" {{ old('amenity_id', optional($productAmenity)->amenity_id) == $key ? 'selected' : '' }}>
			    	{{ $amenity }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('amenity_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

