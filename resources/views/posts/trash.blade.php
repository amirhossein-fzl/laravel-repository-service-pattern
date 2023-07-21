@extends('layouts.posts')

@section('title', 'Trash posts')

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
                            <form action="{{ route('post.restore', $post->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success"><i
                                        class="bi bi-arrow-clockwise"></i></button>
                            </form>
                            <form action="{{ route('post.force_delete', $post->id) }}" method="post">
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
