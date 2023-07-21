@extends('layouts.main')

@section('title', 'Create Post')

@section('content')
    <h1 class="text-center">Create Post</h1>
    <div class="card mt-5">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('post.store') }}" method="post">
                @csrf
                <div class="row g-3">
                    <div class="col">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                            name="title" placeholder="Title ..." aria-label="Title ..." value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="slug">Slug</label>
                        <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror"
                            name="slug" placeholder="Slug ..." aria-label="Slug ..." value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="published" value="true"
                                {{ old('status', 'true') == 'true' ? 'checked' : '' }}>
                            <label class="form-check-label" for="published">
                                Published
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="darf" value="false"
                                {{ old('status') == 'false' ? 'checked' : '' }}>
                            <label class="form-check-label" for="darf">
                                Draft
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6">{{ old('content') }}</textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="d-flex mt-5 justify-content-center">
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
