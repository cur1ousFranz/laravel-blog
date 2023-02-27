<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@isset($title){{ $title }} @else Code Snippet Stuff @endisset</title>
    <meta name="description" content="@isset($description){{ $description }}@endisset">
    <meta property="og:local" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="@isset($title){{ $title }}@endisset">
    <meta property="og:description" content="@isset($description){{ $description }}@endisset">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ url('img/logo.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="CodeSnippetStuffLogo">
    <meta property="og:site_name" content="CodeSnippetStuff">
    <meta property="author" content="CodeSnippetStuff">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4812454445865215"
    crossorigin="anonymous"></script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo.png') }}"/>
    <script src="https://cdn.tiny.cloud/1/t6ma4oxtlblgdc5mskjxpxgs6ham551qbxdkw09lip31ej1k/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link rel="stylesheet"
      href="//unpkg.com/@highlightjs/cdn-assets@11.7.0/styles/default.min.css">

    <style>
        code {
            border-radius: 10px;
            overflow-x: auto;
        }

        p {
            text-align: justify;
            font-family:Arial, Helvetica, sans-serif
        }

    </style>

</head>

<body class="antialiased min-h-screen bg-gray-50">

    <x-layouts.nav-bar/>

    <main class="max-w-screen-xl mx-auto mb-12">
        {{ $slot }}
    </main>

    <x-layouts.footer/>

    
    @vite('resources/js/app.js')
    <script src="//unpkg.com/@highlightjs/cdn-assets@11.7.0/highlight.min.js"></script>
    @stack('child-scripts')
    
</body>

</html>




