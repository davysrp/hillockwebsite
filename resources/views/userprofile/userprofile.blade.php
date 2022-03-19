@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="news-item-container">
                    <div class="category-container">
                        <div class="cat-title">
                            <h3 class="border_section">
                                Menu
                            </h3>
                        </div>
                    </div>

                    <div class="user-menu">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{!! route('user-dashboard') !!}">គណនី</a>
                            </li>
                            <li class="list-group-item"><a href="{!! route('user-edit') !!}">ព័ត៌មានគណនី</a>
                            </li>
                            <li class="list-group-item"><a href="{!! route('userproperty') !!}">អចលនទ្រព្យ</a></li>
                            <li class="list-group-item"><a href="{!! route('user-logout') !!}" methods="post">ចាកចេញ</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <div class="news-item-container">
                    <div class="category-container">
                        <div class="cat-title">
                            <h3 class="border_section">
                                ផ្ទាំងគ្រប់គ្រង
                            </h3>
                        </div>
                    </div>
                    @yield('profile')

                </div>

            </div>
        </div>
    </div>
@stop
