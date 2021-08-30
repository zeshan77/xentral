@extends('layouts.front')

@section('content')

    <h1>Posts</h1>
    <div class="list-group">
        @forelse($posts as $post)
            <a href="/posts/show/?slug={{ $post->slug }}" class="list-group-item list-group-item-action flex-column align-items-start mb-3">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-2">{{ $post->title }}</h5>
                    <small>{{ \Illuminate\Support\Carbon::parse($post->created_at)->diffForHumans() }}</small>
                </div>
                <p class="mb-1">{!! $post->excerpt !!}</p>
            </a>
        @empty
            <p>No posts found.</p>
        @endforelse
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @for($i = 1; $i <= $total_pages; $i++)
                @if($i == 1 && $active_page > 1)
                    <li class="page-item"><a class="page-link disabled" href="/?page={{ $active_page - 1 }}">Previous</a></li>
                @endif
                <li class="page-item {{ $i == $active_page ? 'active' : '' }}"><a class="page-link" href="/?page={{ $i }}">{{ $i }}</a></li>
                @if($i == $total_pages && $active_page < $total_pages)
                    <li class="page-item"><a class="page-link" href="?page={{ $active_page + 1 }}">Next</a></li>
                @endif
            @endfor
        </ul>
    </nav>
@endsection