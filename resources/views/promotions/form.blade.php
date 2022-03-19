<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input type="file" name="photo" placeholder="image">
        {{--<input class="form-control" name="photo" type="text" id="photo"
               value="{{ old('photo', optional($promotion)->photo) }}" maxlength="255">--}}

        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name"
               value="{{ old('name', optional($promotion)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status"
               value="{{ old('status', optional($promotion)->status) }}" maxlength="255"
               placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10"
                  id="description">{{ old('description', optional($promotion)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@section('css')
    <link href="{!! asset('vendor/dropzone/dropzone.css') !!}">
@stop
@section('js')
    <script src="{!! asset('vendor/dropzone/dropzone.js') !!}"></script>

@stop
