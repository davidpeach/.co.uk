@extends ('layouts.main')

@section('main')
    <h1>Stream</h1>
    <ol>
    @foreach($posts as $post)
        <li>
        @include('posts.partials.' . $post->streamable->getTable(), [
            'streamable' => $post->streamable,
        ])
        </li>
    @endforeach
    </ol>
@endsection
