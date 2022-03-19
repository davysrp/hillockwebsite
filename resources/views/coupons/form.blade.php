
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($coupon)->name) }}" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <select class="form-control" id="type" name="type">
            <option value="" style="display: none;"
                    {{ old('type', optional($coupon)->category_id ?: '') == '' ? 'selected' : '' }} disabled
                    selected>Select category
            </option>
            <?php
            $types=[
                'Percentage',
                'Amount'
            ]
            ?>
            @foreach ($types as $item)
                <option
                    value="{{ $item }}" {{ old('type', optional($coupon)->type) == $item ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('discount') ? 'has-error' : '' }}">
    <label for="discount" class="col-md-2 control-label">Discount</label>
    <div class="col-md-10">
        <input class="form-control" name="discount" type="text" id="discount" value="{{ old('discount', optional($coupon)->discount) }}" min="0" max="255" placeholder="Enter discount here...">
        {!! $errors->first('discount', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <select class="form-control" id="status" name="status">
            <option value="" style="display: none;"
                    {{ old('status', optional($coupon)->status ?: '') == '' ? 'selected' : '' }} disabled
                    selected>Select category
            </option>
            <?php
            $types=[
                'Yes',
                'No'
            ]
            ?>
            @foreach ($types as $item)
                <option
                    value="{{ $item }}" {{ old('status', optional($coupon)->type) == $item ? 'selected' : '' }}>
                    {{ $item }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}">
    <label for="end_date" class="col-md-2 control-label">End Date</label>
    <div class="col-md-10">
        <input class="form-control" name="start_date" type="text" id="end_date" value="{{ old('start_date', optional($coupon)->start_date) }}" placeholder="Enter start date here...">
        {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}">
    <label for="end_date" class="col-md-2 control-label">End Date</label>
    <div class="col-md-10">
        <input class="form-control" name="end_date" type="text" id="end_date" value="{{ old('end_date', optional($coupon)->end_date) }}" placeholder="Enter end date here...">
        {!! $errors->first('end_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-2 control-label">Category</label>
    <div class="col-md-10">
        <select class="form-control" id="category_id" name="category_id">
            <option value="" style="display: none;"
                    {{ old('category_id', optional($coupon)->category_id ?: '') == '' ? 'selected' : '' }} disabled
                    selected>Select category
            </option>
            @foreach ($categories as $key => $category)
                <option
                    value="{{ $key }}" {{ old('category_id', optional($coupon)->category_id) == $key ? 'selected' : '' }}>
                    {{ $category }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@section('adminlte_css')
    <link rel="stylesheet" href="{!! asset('vendor/daterangepicker/daterangepicker.css') !!}" type="text/css">
@stop
@section('adminlte_js')
    <script src="{!! asset('vendor/moment/moment.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/daterangepicker/daterangepicker.js') !!}" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('#start_date').datetimepicker({
                format: 'L'
            });
        })
    </script>
@stop

