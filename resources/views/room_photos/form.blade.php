
<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="text" id="photo" value="{{ old('photo', optional($roomPhoto)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('room_id') ? 'has-error' : '' }}">
    <label for="room_id" class="col-md-2 control-label">Room</label>
    <div class="col-md-10">
        <select class="form-control" id="room_id" name="room_id">
        	    <option value="" style="display: none;" {{ old('room_id', optional($roomPhoto)->room_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select room</option>
        	@foreach ($rooms as $key => $room)
			    <option value="{{ $key }}" {{ old('room_id', optional($roomPhoto)->room_id) == $key ? 'selected' : '' }}>
			    	{{ $room }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('room_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

