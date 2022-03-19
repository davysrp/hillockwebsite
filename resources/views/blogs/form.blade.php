<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($blog)->name) }}"
               maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo" type="file" id="photo"
               value="{{ old('photo', optional($blog)->photo) }}" maxlength="255">
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>

    @if($blog)
        @if($blog->photo!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/blog/'.$blog->photo) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>



<div class="form-group {{ $errors->has('photo2') ? 'has-error' : '' }}">
    <label for="photo2" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo2" type="file" id="photo"
               value="{{ old('photo2', optional($blog)->photo2) }}" maxlength="255">
        {!! $errors->first('photo2', '<p class="help-block">:message</p>') !!}
    </div>
    @if($blog)
        @if($blog->photo2!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/blog/'.$blog->photo2) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>
<div class="form-group {{ $errors->has('photo3') ? 'has-error' : '' }}">
    <label for="photo3" class="col-md-2 control-label">Photo</label>
    <div class="col-md-10">
        <input class="form-control" name="photo3" type="file" id="photo"
               value="{{ old('photo3', optional($blog)->photo3) }}" maxlength="255">
        {!! $errors->first('photo3', '<p class="help-block">:message</p>') !!}
    </div>

    @if($blog)
        @if($blog->photo3!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/blog/'.$blog->photo3) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>


<div class="form-group">
    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('header','Header') !!}
    {!! Form::textarea('header',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('onclick','OnClick') !!}
    {!! Form::textarea('onclick',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('coin','Coin') !!}
    {!! Form::text('coin',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('links','Link') !!}
    {!! Form::text('links',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('label','Link Label') !!}
    {!! Form::text('label',null,['class'=>'form-control']) !!}
</div>


<div class="form-group {{ $errors->has('blog_category_id') ? 'has-error' : '' }}">
    <label for="blog_category_id" class="col-md-2 control-label">Blog Category</label>
    <div class="col-md-10">
        <select class="form-control" id="blog_category_id" name="blog_category_id">
            <option value="" style="display: none;"
                    {{ old('blog_category_id', optional($blog)->blog_category_id ?: '') == '' ? 'selected' : '' }} disabled
                    selected>Select blog category
            </option>
            @foreach ($blogCategories as $key => $blogCategory)
                <option
                    value="{{ $key }}" {{ old('blog_category_id', optional($blog)->blog_category_id) == $key ? 'selected' : '' }}>
                    {{ $blogCategory }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('blog_category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<table class="table table-bordered" id="dynamicTable">
    <tr>
        <th>Name</th>
        <th>Video</th>
        <th>Action</th>
    </tr>
    <tr>
        <td><input type="text" name="addmore[0][name]" placeholder="Enter your Name" class="form-control"/></td>
        <td><input type="text" name="addmore[0][vdoid]" placeholder="Enter your video" class="form-control"/></td>
        <td>
            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
        </td>
    </tr>

    @if($blog)
        @php
            $video=\Illuminate\Support\Facades\DB::table('blog_videos')->where('blog_id',$blog->id)->get();
$x=100;
        @endphp

        @foreach($video as $item)
            <tr>
                <td><input type="text" name="addmore[{!! $x !!}][name]" placeholder="Enter your Name" class="form-control" value="{!! $item->name !!}"/>
                </td>
                <td><input type="text" name="addmore[{!! $x !!}][vdoid]" placeholder="Enter your video"
                           class="form-control" value="{!! $item->video !!}"/></td>
                <td>
                    <button type="button" class="btn btn-danger remove-tr">Remove</button>
                </td>
            </tr>
            @php( $x++ )
        @endforeach
    @endif
</table>



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

