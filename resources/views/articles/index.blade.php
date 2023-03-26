@extends('layouts.main')

@section('main')
<ol>
@foreach($articles as $article)
<li class="blog-excerpt">
    <h2>{{ $article->title }}</h2>
    <p>{{ $article->content }}</p>
</li>
@endforeach
</ol>
@endsection
