@extends('layouts.dashboard')

@section('content')

    <div class="d-flex justify-content-between mb-3">
        <h2>Fill the following form to create a new Post</h2>
        <a href="/admin" class="btn btn-primary">Show all</a>
    </div>

    @include('partials.alerts')

    <form class="pb-5 border p-5" action="/admin/posts/store" method="post">
        <div class="form-group mb-5">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Type title" required>
        </div>

        <div class="form-group mb-5">
            <label for="title">Author</label>
            <select name="author_id" id="author_id" class="form-control" required>
                <option>Choose author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-5">
            <label for="excerpt">Summary</label>
            <textarea class="form-control" id="excerpt" name="excerpt" placeholder="Type summary of the post" required></textarea>
        </div>

        <div class="form-group mb-5">
            <label for="content">Content</label>
            <textarea rows="15" class="form-control" id="content" name="content" placeholder="Type content of the post" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection