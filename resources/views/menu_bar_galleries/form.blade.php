
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($menuBarGallery)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="text" id="photo" value="{{ old('photo', optional($menuBarGallery)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('menu_bar_id') ? 'has-error' : '' }}">
    <label for="menu_bar_id" class="col-md-2 control-label">Menu Bar</label>
    <div class="col-md-10">
        <select class="form-control" id="menu_bar_id" name="menu_bar_id">
        	    <option value="" style="display: none;" {{ old('menu_bar_id', optional($menuBarGallery)->menu_bar_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select menu bar</option>
        	@foreach ($menuBars as $key => $menuBar)
			    <option value="{{ $key }}" {{ old('menu_bar_id', optional($menuBarGallery)->menu_bar_id) == $key ? 'selected' : '' }}>
			    	{{ $menuBar }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('menu_bar_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

