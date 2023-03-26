@extends('layouts.main')

@section('main')
<ol>
@foreach($notes as $note)
<li class="blog-excerpt">
    <p>{{ $note->content }}</p>
</li>
@endforeach
</ol>
@endsection
