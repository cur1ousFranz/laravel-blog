<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now('UTC')->toIso8601String() }}</lastmod>
        <priority>1.00</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/about</loc>
        <lastmod>{{ \Carbon\Carbon::now('UTC')->toIso8601String() }}</lastmod>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>{{ url('/') }}/disclaimer</loc>
        <lastmod>{{ \Carbon\Carbon::now('UTC')->toIso8601String() }}</lastmod>
        <priority>0.80</priority>
    </url>

    @foreach ($questions as $question)
        <url>
            <loc>{{ url('/') }}/question/{{ $question->slug }}</loc>
            <lastmod>{{ $question->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            @if ($question->image)
                <image:image>
                    <image:loc>{{ $question->image->img_path }}</image:loc>
                    <image:title>{{ $question->image->img_title }}</image:title>
                    <image:caption>{{ $question->image->img_caption }}</image:caption>
                    <image:alt>{{ $question->image->img_alt }}</image:alt>
                </image:image>
            @endif
        </url>
    @endforeach
</urlset>