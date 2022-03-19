<div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
    <label for="logo" class="col-md-2 control-label">Logo</label>
    <div class="col-md-10">
        <input class="form-control" name="logo" type="file" id="photo"
               value="{{ old('logo', optional($setting)->logo) }}" maxlength="255">
        {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
    </div>
    @if($setting)
        @if($setting->logo!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/setting/'.$setting->logo) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>


<div class="form-group {{ $errors->has('favicon') ? 'has-error' : '' }}">
    <label for="photo" class="col-md-2 control-label">favicon</label>
    <div class="col-md-10">
        <input class="form-control" name="favicon" type="file" id="photo"
               value="{{ old('favicon', optional($setting)->favicon) }}" maxlength="255">
        {!! $errors->first('favicon', '<p class="help-block">:message</p>') !!}
    </div>

    @if($setting)
        @if($setting->favicon!=null)
            <div class="row mt-2">
                <div class="col-md-1">
                    <img src="{!! asset('image/setting/'.$setting->favicon) !!}" class="w-100">
                </div>
            </div>
        @endif
    @endif
</div>
<div class="form-group {{ $errors->has('seo_title') ? 'has-error' : '' }}">
    <label for="seo_title" class="col-md-2 control-label">Seo Title</label>
    <div class="col-md-10">
        <input class="form-control" name="seo_title" type="text" id="seo_title" value="{{ old('seo_title', optional($setting)->seo_title) }}" maxlength="191" placeholder="Enter seo title here...">
        {!! $errors->first('seo_title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('seo_keyword') ? 'has-error' : '' }}">
    <label for="seo_keyword" class="col-md-2 control-label">Seo Keyword</label>
    <div class="col-md-10">
        <textarea class="form-control" name="seo_keyword" cols="50" rows="10" id="seo_keyword" placeholder="Enter seo keyword here...">{{ old('seo_keyword', optional($setting)->seo_keyword) }}</textarea>
        {!! $errors->first('seo_keyword', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('seo_description') ? 'has-error' : '' }}">
    <label for="seo_description" class="col-md-2 control-label">Seo Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="seo_description" cols="50" rows="10" id="seo_description" placeholder="Enter seo description here...">{{ old('seo_description', optional($setting)->seo_description) }}</textarea>
        {!! $errors->first('seo_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('company_contact') ? 'has-error' : '' }}">
    <label for="company_contact" class="col-md-2 control-label">Company Contact</label>
    <div class="col-md-10">
        <input class="form-control" name="company_contact" type="text" id="company_contact" value="{{ old('company_contact', optional($setting)->company_contact) }}" maxlength="191" placeholder="Enter company contact here...">
        {!! $errors->first('company_contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('contact_2') ? 'has-error' : '' }}">
    <label for="contact_2" class="col-md-2 control-label">Contact</label>
    <div class="col-md-10">
        <input class="form-control" name="contact_2" type="text" id="contact_2" value="{{ old('contact_2', optional($setting)->contact_2) }}" maxlength="191" placeholder="Enter contact 2 here...">
        {!! $errors->first('contact_2', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('company_address') ? 'has-error' : '' }}">
    <label for="company_address" class="col-md-2 control-label">Company Address</label>
    <div class="col-md-10">
        <textarea class="form-control" name="company_address" cols="50" rows="10" id="company_address" placeholder="Enter company address here...">{{ old('company_address', optional($setting)->company_address) }}</textarea>
        {!! $errors->first('company_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('from_name') ? 'has-error' : '' }}">
    <label for="from_name" class="col-md-2 control-label">From Name</label>
    <div class="col-md-10">
        <input class="form-control" name="from_name" type="text" id="from_name" value="{{ old('from_name', optional($setting)->from_name) }}" maxlength="191" placeholder="Enter from name here...">
        {!! $errors->first('from_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('from_email') ? 'has-error' : '' }}">
    <label for="from_email" class="col-md-2 control-label">From Email</label>
    <div class="col-md-10">
        <input class="form-control" name="from_email" type="text" id="from_email" value="{{ old('from_email', optional($setting)->from_email) }}" maxlength="191" placeholder="Enter from email here...">
        {!! $errors->first('from_email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
    <label for="facebook" class="col-md-2 control-label">Facebook</label>
    <div class="col-md-10">
        <input class="form-control" name="facebook" type="text" id="facebook" value="{{ old('facebook', optional($setting)->facebook) }}" maxlength="191" placeholder="Enter facebook here...">
        {!! $errors->first('facebook', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telegam') ? 'has-error' : '' }}">
    <label for="telegam" class="col-md-2 control-label">Telegam</label>
    <div class="col-md-10">
        <input class="form-control" name="telegam" type="text" id="telegam" value="{{ old('telegam', optional($setting)->telegam) }}" maxlength="255" placeholder="Enter telegam here...">
        {!! $errors->first('telegam', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('linkedin') ? 'has-error' : '' }}">
    <label for="linkedin" class="col-md-2 control-label">Linkedin</label>
    <div class="col-md-10">
        <input class="form-control" name="linkedin" type="text" id="linkedin" value="{{ old('linkedin', optional($setting)->linkedin) }}" maxlength="191" placeholder="Enter linkedin here...">
        {!! $errors->first('linkedin', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
    <label for="twitter" class="col-md-2 control-label">Twitter</label>
    <div class="col-md-10">
        <input class="form-control" name="twitter" type="text" id="twitter" value="{{ old('twitter', optional($setting)->twitter) }}" maxlength="191" placeholder="Enter twitter here...">
        {!! $errors->first('twitter', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('google') ? 'has-error' : '' }}">
    <label for="google" class="col-md-2 control-label">Google</label>
    <div class="col-md-10">
        <input class="form-control" name="google" type="text" id="google" value="{{ old('google', optional($setting)->google) }}" maxlength="191" placeholder="Enter google here...">
        {!! $errors->first('google', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('copyright_text') ? 'has-error' : '' }}">
    <label for="copyright_text" class="col-md-2 control-label">Copyright Text</label>
    <div class="col-md-10">
        <input class="form-control" name="copyright_text" type="text" id="copyright_text" value="{{ old('copyright_text', optional($setting)->copyright_text) }}" maxlength="191" placeholder="Enter copyright text here...">
        {!! $errors->first('copyright_text', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('footer_text') ? 'has-error' : '' }}">
    <label for="footer_text" class="col-md-2 control-label">Footer Text</label>
    <div class="col-md-10">
        <input class="form-control" name="footer_text" type="text" id="footer_text" value="{{ old('footer_text', optional($setting)->footer_text) }}" maxlength="191" placeholder="Enter footer text here...">
        {!! $errors->first('footer_text', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('terms') ? 'has-error' : '' }}">
    <label for="terms" class="col-md-2 control-label">Terms</label>
    <div class="col-md-10">
        <textarea class="form-control" name="terms" cols="50" rows="10" id="terms" placeholder="Enter terms here...">{{ old('terms', optional($setting)->terms) }}</textarea>
        {!! $errors->first('terms', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('disclaimer') ? 'has-error' : '' }}">
    <label for="disclaimer" class="col-md-2 control-label">Disclaimer</label>
    <div class="col-md-10">
        <textarea class="form-control" name="disclaimer" cols="50" rows="10" id="disclaimer" placeholder="Enter disclaimer here...">{{ old('disclaimer', optional($setting)->disclaimer) }}</textarea>
        {!! $errors->first('disclaimer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('google_analytics') ? 'has-error' : '' }}">
    <label for="google_analytics" class="col-md-2 control-label">Google Analytics</label>
    <div class="col-md-10">
        <textarea class="form-control" name="google_analytics" cols="50" rows="10" id="google_analytics" placeholder="Enter google analytics here...">{{ old('google_analytics', optional($setting)->google_analytics) }}</textarea>
        {!! $errors->first('google_analytics', '<p class="help-block">:message</p>') !!}
    </div>
</div>

