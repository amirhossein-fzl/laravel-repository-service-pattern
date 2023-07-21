@extends('layouts.main')

@section('title')
    @yield('title')
@endsection

@section('content')
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'post.index' ? ' active' : '' }}"
                href="{{ route('post.index') }}">Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'post.trash' ? ' active' : '' }}"
                href="{{ route('post.trash') }}">Trash</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == 'post.create' ? ' active' : '' }}" href="#">Link</a>
        </li>
    </ul>

    @yield('content')
@endsection
