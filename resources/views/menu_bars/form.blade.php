
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($menuBar)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
    <label for="slug" class="col-md-2 control-label">Slug</label>
    <div class="col-md-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{ old('slug', optional($menuBar)->slug) }}" maxlength="255" placeholder="Enter slug here...">
        {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="file" id="photo"
               value="{{ old('photo', optional($menuBar)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>

    @if($menuBar)
        @if($menuBar->photo!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/menu/'.$menuBar->photo) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>
<div class="form-group {{ $errors->has('feature_photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Feature Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="feature_photo" type="file" id="feature_photo"
               value="{{ old('feature_photo', optional($menuBar)->feature_photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>

    @if($menuBar)
        @if($menuBar->feature_photo!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/menu/'.$menuBar->feature_photo) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>



<div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
    <label for="short_description" class="col-md-2 control-label">Short description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="short_description" cols="50" rows="10"  placeholder="Enter short_description here...">{{ old('description', optional($menuBar)->description) }}</textarea>
        {!! $errors->first('short_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="remark" class="col-md-2 control-label">Remark</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" placeholder="Enter remark here...">{{ old('description', optional($menuBar)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>





<div class="form-group {{ $errors->has('view') ? 'has-error' : '' }}">
    <label for="view" class="col-md-2 control-label">View</label>
    <div class="col-md-10">
        <input class="form-control" name="view" type="text" id="view" value="{{ old('view', optional($menuBar)->view) }}" maxlength="255" placeholder="Enter view here...">
        {!! $errors->first('view', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($menuBar)->status) }}" maxlength="255" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <label for="photo" class="col-md-2 control-label">Photo Detail</label>
    <div class="col-md-10">
        <input class="form-control" name="photo_gallery[]" type="file" id="photo" multiple >
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
            });
        })
    </script>


    <script type="text/javascript">

        var i = 0;

        $("#add").click(function () {

            ++i;

            $("#dynamicTable").append('<tr><td><input value="Ep" type="text" name="addmore[' + i + '][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore[' + i + '][vdoid]" placeholder="Enter your video" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });

        $(document).on('click', '.remove-tr', function () {
            $(this).parents('tr').remove();
        });

    </script>
    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        var route_prefix = "/filemanager";
        $('#description').ckeditor({
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });

    </script>


@stop
