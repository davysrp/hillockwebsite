
<div class="form-group {{ $errors->has('api_url') ? 'has-error' : '' }}">
    <label for="api_url" class="col-md-2 control-label">Api Url</label>
    <div class="col-md-10">
        <input class="form-control" name="api_url" type="text" id="api_url" value="{{ old('api_url', optional($payment)->api_url) }}" maxlength="255" placeholder="Enter api url here...">
        {!! $errors->first('api_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($payment)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('api') ? 'has-error' : '' }}">
    <label for="api" class="col-md-2 control-label">Api</label>
    <div class="col-md-10">
        <textarea class="form-control" name="api" cols="50" rows="10" id="api" placeholder="Enter api here...">{{ old('api', optional($payment)->api) }}</textarea>
        {!! $errors->first('api', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('secret') ? 'has-error' : '' }}">
    <label for="secret" class="col-md-2 control-label">Secret</label>
    <div class="col-md-10">
        <textarea class="form-control" name="secret" cols="50" rows="10" id="secret" placeholder="Enter secret here...">{{ old('secret', optional($payment)->secret) }}</textarea>
        {!! $errors->first('secret', '<p class="help-block">:message</p>') !!}
    </div>
</div>

