<!doctype html>
<meta charset=utf-8 />
<title>David Peach's website</title>
@vite(['resources/css/app.css'])
<body class="px-2">
<h1 class="text-4xl text-center my-4">David Peach</h1>
<ul>
    <li>
        <h3 class="text-center">Laravel</h3>
        <p>PHP is my programming language of choice, ever since the days of WordPress 3.5. Since then I have passed through CodeIgniter, OpenCart, Custom in-house frameworks (lol), to finally arrive home.</p>
    </li>
    <li>
        <h3 class="text-center">VueJS</h3>
    </li>
    <li>
        <h3 class="text-center">Inertia</h3>
    </li>
    <li>
        <h3 class="text-center">Tailwind</h3>
    </li>
</ul>
<ol>
    @foreach($streamables as $streamable)

    @endforeach
</ol>
</body>
