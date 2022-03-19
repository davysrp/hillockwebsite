@extends('adminlte::page')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Setting' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('settings.setting.destroy', $setting->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('settings.setting.index') }}" class="btn btn-primary" title="Show All Setting">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('settings.setting.create') }}" class="btn btn-success" title="Create New Setting">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('settings.setting.edit', $setting->id ) }}" class="btn btn-primary" title="Edit Setting">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Setting" onclick="return confirm(&quot;Click Ok to delete Setting.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Logo</dt>
            <dd>{{ $setting->logo }}</dd>
            <dt>Favicon</dt>
            <dd>{{ $setting->favicon }}</dd>
            <dt>Seo Title</dt>
            <dd>{{ $setting->seo_title }}</dd>
            <dt>Seo Keyword</dt>
            <dd>{{ $setting->seo_keyword }}</dd>
            <dt>Seo Description</dt>
            <dd>{{ $setting->seo_description }}</dd>
            <dt>Company Contact</dt>
            <dd>{{ $setting->company_contact }}</dd>
            <dt>Company Address</dt>
            <dd>{{ $setting->company_address }}</dd>
            <dt>From Name</dt>
            <dd>{{ $setting->from_name }}</dd>
            <dt>From Email</dt>
            <dd>{{ $setting->from_email }}</dd>
            <dt>Facebook</dt>
            <dd>{{ $setting->facebook }}</dd>
            <dt>Telegam</dt>
            <dd>{{ $setting->telegam }}</dd>
            <dt>Linkedin</dt>
            <dd>{{ $setting->linkedin }}</dd>
            <dt>Twitter</dt>
            <dd>{{ $setting->twitter }}</dd>
            <dt>Google</dt>
            <dd>{{ $setting->google }}</dd>
            <dt>Copyright Text</dt>
            <dd>{{ $setting->copyright_text }}</dd>
            <dt>Footer Text</dt>
            <dd>{{ $setting->footer_text }}</dd>
            <dt>Terms</dt>
            <dd>{{ $setting->terms }}</dd>
            <dt>Disclaimer</dt>
            <dd>{{ $setting->disclaimer }}</dd>
            <dt>Google Analytics</dt>
            <dd>{{ $setting->google_analytics }}</dd>
            <dt>Created At</dt>
            <dd>{{ $setting->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $setting->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
