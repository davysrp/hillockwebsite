
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($category)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-2 control-label">Slug</label>
    <div class="col-md-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($category)->slug) }}" maxlength="255" placeholder="Enter slug here...">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="file" id="photo" value="{{ old('photo', optional($category)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">


        {!! Form::select('status',['Yes'=>'Yes','No'=>'No'],null,['class'=>'form-control']) !!}
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
    <label for="short_description" class="col-md-2 control-label">Short Description</label>
    <div class="col-md-10">

        <textarea name="short_description" type="text" id="short_description" value="{{ old('short_description', optional($category)->short_description) }}" maxlength="255" placeholder="Enter short description here..."></textarea>
        {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
    <label for="parent_id" class="col-md-2 control-label">Parent</label>
    <div class="col-md-10">
        <select class="form-control" id="parent_id" name="parent_id">
        	    <option value="" style="display: none;" {{ old('parent_id', optional($category)->parent_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select parent</option>
        	@foreach ($parents as $key => $parent)
			    <option value="{{ $key }}" {{ old('parent_id', optional($category)->parent_id) == $key ? 'selected' : '' }}>
			    	{{ $parent }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


@section('css')
    <link rel="stylesheet" href="{!! asset('vendor/select2/css/select2.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}">
@stop
@section('js')
    <!-- Select2 -->
    <script src="{!! asset('vendor/select2/js/select2.full.min.js') !!}"></script>
    <script>
        $(document).ready(function () {
            $('select').select2({
                theme: 'bootstrap4'
            })
        })
    </script>

    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        var route_prefix = "/filemanager";
        $('#short_description').ckeditor({
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });

    </script>
@stop
