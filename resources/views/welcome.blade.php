<!doctype html>
<meta charset=utf-8 />
<title>David Peach's website</title>
@vite('resources/css/sty;e.css')
<h1 class=site-title>David Peach</h1>
<p class=introduction>Welcome to my personal homepage. I am in the process of getting all of my old posts imported. You can also find me at <a href=https://mastodon.davidpeach.co.uk rel=me>my own Mastodon instance</a>, as well as on <a href=https://github.com/davidpeach rel=me>Github</a> and <a href=https://twitter.com/iamdavidpeach>Twitter</a>.</p>

<h2>Latest Posts</h2>
<ol reversed class=latest-posts>
    @foreach($posts as $post)
    <li class="blog-excerpt">
        <h3>
            <a href="{{ $post->permalink }}">{{ $post->title }}</a>
        </h3>
        <p>{{ $post->excerpt }}</p>
    @endforeach
</ol>
