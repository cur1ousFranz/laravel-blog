<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@isset($title){{ $title }} @else CodeSnippetStuff @endisset</title>
    <meta name="description" content="@isset($description){{ $description }}@endisset">
    <meta property="og:local" content="en_US">
    <meta property="og:type" content="article">
    <meta property="og:title" content="@isset($title){{ $title }}@endisset">
    <meta property="og:description" content="@isset($description){{ $description }}@endisset">
    <meta property="og:url" content="@isset($image){{ $image }}@endisset">
    <meta property="og:image" content="@isset($image){{ $image }}@endisset">
    <meta property="og:image:alt" content="@isset($alt){{ $alt }}@endisset">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:site_name" content="CodeSnippetStuff">
    <meta property="author" content="CodeSnippetStuff">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4812454445865215"
    crossorigin="anonymous"></script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/logo.png') }}"/>
    <script src="https://cdn.tiny.cloud/1/t6ma4oxtlblgdc5mskjxpxgs6ham551qbxdkw09lip31ej1k/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <link rel="stylesheet" href="//unpkg.com/@highlightjs/cdn-assets@11.7.0/styles/default.min.css">
    
    {{-- <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script> --}}

    <script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
    </script>

    <style>
        code {
            border-radius: 10px;
            overflow-x: auto;
        }

        p {
            text-align: justify;
            font-family:Arial, Helvetica, sans-serif;
            font-size: 1.125rem/* 18px */;
            line-height: 1.75rem/* 28px */;
        }

    </style>

</head>

<body class="antialiased min-h-screen bg-gray-50">

    <x-layouts.nav-bar/>

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4812454445865215"
        crossorigin="anonymous"></script>
    <!-- 1ST HORIZONTAL -->
    <ins class="adsbygoogle"
        style="display:block"
        data-ad-client="ca-pub-4812454445865215"
        data-ad-slot="4415877212"
        data-ad-format="auto"
        data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

    <main class="max-w-screen-xl mx-auto mb-12">
        <div class="flex justify-end">
            <a class="absolute right-0 text-center w-full px-4 py-2 text-sm space-x-1 -tracking-tight hover:underline text-gray-700 bg-green-400 hover:bg-green-500 lg:w-fit lg:text-end" href="https://vrlps.co/ksqmnq8/cp" target="_blank">
                <span class="inline-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-gift-fill" viewBox="0 0 16 16">
                        <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A2.968 2.968 0 0 1 3 2.506V2.5zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43a.522.522 0 0 0 .023.07zM9 3h2.932a.56.56 0 0 0 .023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0V3zm6 4v7.5a1.5 1.5 0 0 1-1.5 1.5H9V7h6zM2.5 16A1.5 1.5 0 0 1 1 14.5V7h6v9H2.5z"/>
                        </svg>
                </span>
                Get your free<span class="font-semibold">$25</span> Free hosting!
            </a>
        </div>
        {{ $slot }}
    </main>

    <x-layouts.footer/>
    
    @vite('resources/js/app.js')
    <script src="//unpkg.com/@highlightjs/cdn-assets@11.7.0/highlight.min.js"></script>
    @stack('child-scripts')
    
</body>

</html>




