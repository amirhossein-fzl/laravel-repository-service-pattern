@extends('layouts.posts')

@section('title', 'All posts')

@section('content')
    @if (session('success:message') || session('error:message'))
        <div class="alert {{ session('success:message') ? 'alert-success' : 'alert-danger' }}">
            <p class="mb-0">
                @if (session('success:message'))
                    {{ session('success:message') }}
                @else
                    {{ session('error:message') }}
                @endif
            </p>
        </div>
    @endif
    <table class="table">
        <thead class="table-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Statue</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>
                        <strong>{{ $post->title }}</strong>
                    </td>
                    <td>
                        @if ($post->status)
                            <span class="badge text-bg-success">published</span>
                        @else
                            <span class="badge text-bg-danger">draft</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('post.show', $post->slug) }}" class="btn btn-sm btn-primary"><i
                                    class="bi bi-box-arrow-up-right"></i></a>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-success"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('post.delete', $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="4">
                        <p class="text-center mb-0">Nothing post</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
