<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@isset($description){{ $description }}@endisset">

    <title>@isset($title){{ $title }}@endisset</title>
    
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
    </style>

</head>

<body class="antialiased">

    <x-layouts.nav-bar/>

    {{ $slot }}

    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    @stack('child-scripts')
</body>

</html>



