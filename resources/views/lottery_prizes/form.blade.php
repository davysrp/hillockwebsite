
<div class="form-group {{ $errors->has('digit') ? 'has-error' : '' }}">
    <label for="digit" class="col-md-2 control-label">Digit</label>
    <div class="col-md-10">
        <input class="form-control" name="digit" type="text" id="digit" value="{{ old('digit', optional($lotteryPrize)->digit) }}" maxlength="255" placeholder="Enter digit here...">
        {!! $errors->first('digit', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prize') ? 'has-error' : '' }}">
    <label for="prize" class="col-md-2 control-label">Prize</label>
    <div class="col-md-10">
        <input class="form-control" name="prize" type="number" id="prize" value="{{ old('prize', optional($lotteryPrize)->prize) }}" min="-2147483648" max="2147483647" placeholder="Enter prize here...">
        {!! $errors->first('prize', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('wine') ? 'has-error' : '' }}">
    <label for="wine" class="col-md-2 control-label">Wine</label>
    <div class="col-md-10">
        <input class="form-control" name="wine" type="number" id="wine" value="{{ old('wine', optional($lotteryPrize)->wine) }}" min="-2147483648" max="2147483647" placeholder="Enter wine here...">
        {!! $errors->first('wine', '<p class="help-block">:message</p>') !!}
    </div>
</div>

