<!doctype html>
<meta charset=utf-8 />
<title>David Peach's website</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<h1 class=site-title>David Peach</h1>
{{-- <p class=introduction>Welcome to my personal homepage. I am in the process of getting all of my old posts imported. You can also find me at <a href=https://mastodon.davidpeach.co.uk rel=me>my own Mastodon instance</a>, as well as on <a href=https://github.com/davidpeach rel=me>Github</a> and <a href=https://twitter.com/iamdavidpeach>Twitter</a>.</p> --}}
@yield('main')
