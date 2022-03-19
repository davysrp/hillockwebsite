
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($facility)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('short_desc') ? 'has-error' : '' }}">
    <label for="short_desc" class="col-md-2 control-label">Short Desc</label>
    <div class="col-md-10">
        <textarea class="form-control" name="short_desc" cols="50" rows="10" id="short_desc" placeholder="Enter short desc here...">{{ old('short_desc', optional($facility)->short_desc) }}</textarea>
        {!! $errors->first('short_desc', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description">{{ old('description', optional($facility)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('meta_keyword') ? 'has-error' : '' }}">
    <label for="meta_keyword" class="col-md-2 control-label">Meta Keyword</label>
    <div class="col-md-10">
        <input class="form-control" name="meta_keyword" type="text" id="meta_keyword" value="{{ old('meta_keyword', optional($facility)->meta_keyword) }}" maxlength="255" placeholder="Enter meta keyword here...">
        {!! $errors->first('meta_keyword', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="file" id="photo"
               value="{{ old('photo', optional($facility)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>

    @if($facility)
        @if($facility->photo!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/facility/'.$facility->photo) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>



<div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
    <label for="meta_description" class="col-md-2 control-label">Meta Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="meta_description" cols="50" rows="10" id="meta_description" placeholder="Enter meta description here...">{{ old('meta_description', optional($facility)->meta_description) }}</textarea>
        {!! $errors->first('meta_description', '<p class="help-block">:message</p>') !!}
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


