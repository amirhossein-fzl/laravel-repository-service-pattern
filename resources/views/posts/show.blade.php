@extends('layouts.main')

@section('title', $post->title)

@section('content')
<div class="card">
    <div class="card-body">
        <h1>{{ $post->title }}</h1>

        <article class="mt-5">
            {{ $post->content }}
        </article>
    </div>
</div>
@endsection
