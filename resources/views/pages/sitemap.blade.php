<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>{{ URL::to('/sitemap-misc.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ URL::to('/sitemap-movies.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ URL::to('/sitemap-show.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ URL::to('/sitemap-sports.xml') }}</loc>
    </sitemap>
    <sitemap>
        <loc>{{ URL::to('/sitemap-livetv.xml') }}</loc>
    </sitemap>
</sitemapindex>

