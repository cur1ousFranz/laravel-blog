<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@isset($title){{ $title }} @else Snippet @endisset</title>
    <meta name="description" content="@isset($description){{ $description }}@endisset">
    <meta property="og:title" content="@isset($title){{ $title }}@endisset">
    <meta property="og:description" content="@isset($description){{ $description }}@endisset">
    
    <link rel="icon" type="image/svg+xml" href="{{ asset('storage/logo/logo.png') }}"/>
    <script src="https://cdn.tiny.cloud/1/t6ma4oxtlblgdc5mskjxpxgs6ham551qbxdkw09lip31ej1k/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">

    @vite('resources/js/app.js')
    @vite('resources/css/code-snippet.css')

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

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    @stack('child-scripts')
</body>

</html>




