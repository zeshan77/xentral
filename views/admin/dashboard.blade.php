@extends('layouts.dashboard')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h2>Posts</h2>
        <a href="/admin/posts/create" class="btn btn-primary">+ Create new post</a>
    </div>
    @include('partials.alerts')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($posts as $post)
            <tr>
                <td scope="row">{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a class="btn-link" href="#">edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No posts found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection