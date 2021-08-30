@extends('layouts.front')

@section('content')
    <h1 class="display-4">{{ $post['title'] }}</h1>
    <blockquote class="blockquote">
        <footer class="blockquote-footer">{{ $post['name'] }}</footer>
    </blockquote>
    <p class="lead">{!! $post['content'] !!}</p>
@endsection