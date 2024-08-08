<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <url>
            <loc>{{ Config('app.url') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('customer.helpdesk.register') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('customer.helpdesk.login') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('blog') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('about') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('contact') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('carrers') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('faq') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('offers') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('affiliates') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('viewAllTestimonial') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('terms') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('privacy') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('allServices') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>{{ route('cancelPolicy') }}</loc>
            <changefreq>monthly</changefreq>
            <priority>0.80</priority>
        </url>
        @foreach ($services as $service)
            <url>
                <loc>{{ Config('app.url') }}services/{{ $service->slug }}</loc>
                <lastmod>{{ $service->updated_at->format('d/m/Y') }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.90</priority>
            </url>
        @endforeach

        @foreach ($posts as $post)
            <url>
                <loc>{{ Config('app.url') }}post/{{ $post->slug }}</loc>
                <lastmod>{{ $post->updated_at->format('d/m/Y g:i A') }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.90</priority>
            </url>
        @endforeach

        @foreach ($post_categories as $post_category)
            <url>
                <loc>{{ Config('app.url') }}post/category/{{ $post_category->slug }}</loc>
                <lastmod>{{ $post_category->updated_at->format('d/m/Y g:i A') }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.90</priority>
            </url>
        @endforeach

        @foreach ($post_tags as $post_tag)
            <url>
                <loc>{{ Config('app.url') }}post/tag/{{ $post_tag->slug }}</loc>
                <lastmod>{{ $post_tag->updated_at->format('d/m/Y g:i A') }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.90</priority>
            </url>
        @endforeach
    </urlset>

</sitemapindex>
