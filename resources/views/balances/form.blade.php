
<div class="form-group {{ $errors->has('ipaddress') ? 'has-error' : '' }}">
    <label for="ipaddress" class="col-md-2 control-label">Ipaddress</label>
    <div class="col-md-10">
        <input class="form-control" name="ipaddress" type="text" id="ipaddress" value="{{ old('ipaddress', optional($balance)->ipaddress) }}" maxlength="255" placeholder="Enter ipaddress here...">
        {!! $errors->first('ipaddress', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('topup_date') ? 'has-error' : '' }}">
    <label for="topup_date" class="col-md-2 control-label">Topup Date</label>
    <div class="col-md-10">
        <input class="form-control" name="topup_date" type="datetime-local" id="topup_date" value="{{ old('topup_date', optional($balance)->topup_date) }}" placeholder="Enter topup date here...">
        {!! $errors->first('topup_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('approve_date') ? 'has-error' : '' }}">
    <label for="approve_date" class="col-md-2 control-label">Approve Date</label>
    <div class="col-md-10">
        <input class="form-control" name="approve_date" type="datetime-local" id="approve_date" value="{{ old('approve_date', optional($balance)->approve_date) }}" placeholder="Enter approve date here...">
        {!! $errors->first('approve_date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('approve_by') ? 'has-error' : '' }}">
    <label for="approve_by" class="col-md-2 control-label">Approve By</label>
    <div class="col-md-10">
        <select class="form-control" id="approve_by" name="approve_by">
        	    <option value="" style="display: none;" {{ old('approve_by', optional($balance)->approve_by ?: '') == '' ? 'selected' : '' }} disabled selected>Select approve by</option>
        	@foreach ($approveBies as $key => $approveBy)
			    <option value="{{ $key }}" {{ old('approve_by', optional($balance)->approve_by) == $key ? 'selected' : '' }}>
			    	{{ $approveBy }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('approve_by', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank_id') ? 'has-error' : '' }}">
    <label for="bank_id" class="col-md-2 control-label">Bank</label>
    <div class="col-md-10">
        <select class="form-control" id="bank_id" name="bank_id">
        	    <option value="" style="display: none;" {{ old('bank_id', optional($balance)->bank_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select bank</option>
        	@foreach ($banks as $key => $bank)
			    <option value="{{ $key }}" {{ old('bank_id', optional($balance)->bank_id) == $key ? 'selected' : '' }}>
			    	{{ $bank }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('bank_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank_name') ? 'has-error' : '' }}">
    <label for="bank_name" class="col-md-2 control-label">Bank Name</label>
    <div class="col-md-10">
        <input class="form-control" name="bank_name" type="text" id="bank_name" value="{{ old('bank_name', optional($balance)->bank_name) }}" maxlength="255" placeholder="Enter bank name here...">
        {!! $errors->first('bank_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bank_number') ? 'has-error' : '' }}">
    <label for="bank_number" class="col-md-2 control-label">Bank Number</label>
    <div class="col-md-10">
        <input class="form-control" name="bank_number" type="number" id="bank_number" value="{{ old('bank_number', optional($balance)->bank_number) }}" min="-2147483648" max="2147483647" placeholder="Enter bank number here...">
        {!! $errors->first('bank_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
    <label for="amount" class="col-md-2 control-label">Amount</label>
    <div class="col-md-10">
        <input class="form-control" name="amount" type="number" id="amount" value="{{ old('amount', optional($balance)->amount) }}" min="-9" max="9" placeholder="Enter amount here...">
        {!! $errors->first('amount', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="amount" class="col-md-2 control-label">Amount</label>
    <div class="col-md-10">

        <select class="form-control" id="status" name="status">
            <option value="" style="display: none;" {{ old('status', optional($balance)->status ?: '') == '' ? 'selected' : '' }} disabled selected>Select status</option>
            <option value="Approved" {{ old('status', optional($balance)->status) == 'Approved' ? 'selected' : '' }}>
                Approved
            </option>
            <option value="Deny" {{ old('status', optional($balance)->status) == 'Deny' ? 'selected' : '' }}>
                Deny
            </option>
            {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
        </select>
    </div>
</div>

<div class="form-group {{ $errors->has('remark') ? 'has-error' : '' }}">
    <label for="remark" class="col-md-2 control-label">Remark</label>
    <div class="col-md-10">
        <textarea class="form-control" name="remark" cols="50" rows="10" id="remark" placeholder="Enter remark here...">{{ old('remark', optional($balance)->remark) }}</textarea>
        {!! $errors->first('remark', '<p class="help-block">:message</p>') !!}
    </div>
</div>

