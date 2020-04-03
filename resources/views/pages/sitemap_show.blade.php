<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
     
    @foreach($series_list as $series_data)     
    <url>        
        <loc>{{ URL::to('series/'.$series_data->series_slug.'/'.$series_data->id) }}</loc>
        <changefreq>Daily</changefreq>
        <priority>0.6</priority>
     </url>        
    @endforeach 
     
</urlset>