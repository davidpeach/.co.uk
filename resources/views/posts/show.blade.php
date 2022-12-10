<!doctype html>
<meta charset=utf-8 />
<title>David Peach</title>
@vite('resources/css/sty;e.css')
<p class=site-title>
    <a href=/>
        David Peach
    </a>
</p>

<h1>
{{ $post->title }}
</h1>

{!! $post->content !!}
