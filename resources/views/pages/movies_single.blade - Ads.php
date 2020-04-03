@extends('site_app')

@section('head_title', $movies_info->video_title.' | '.getcong('site_name'))

@section('head_description', str_limit(stripslashes($movies_info->video_description),160))

@section('head_image', URL::to('upload/source/'.$movies_info->video_image))

@section('head_url', Request::url())

@section('content')
  
 <link rel="stylesheet" href="{{ URL::asset('site_assets/video_player/css/video-js.min.css') }}">
 <link rel="stylesheet" href="{{ URL::asset('site_assets/video_player/css/videojs-tube.min.css') }}">
 <link rel="stylesheet" href="{{ URL::asset('site_assets/video_player/css/watermark-logo.min.css') }}">
 <link rel="stylesheet" href="{{ URL::asset('site_assets/video_player/css/videojs-seek-buttons.css') }}">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-ads/6.6.5/videojs.ads.css">



 <style type="text/css">
  .video-js .vjs-seek-button.skip-back.skip-5::before {
    content: '\e05b';
    font-size: 22px;
}
.video-js .vjs-seek-button.skip-forward.skip-10::before {
    content: '\e056';
    font-size: 22px;
}

  .videoWrapper {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 */
  padding-top: 25px;
  height: 0;
}
.videoWrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
} 

 </style>

 <div class="main-wrap">
  <div class="section section-padding vfx_video_single_section">
    <div class="container">
      <div class="video-single">
        <div class="row">
          <div class="col-xs-12">            
            <div class="content-wrap">              
				<div class="vfx_video_detail xs-top-40">
				  <div class="row">                    
					<div class="single-section col-md-8 col-sm-8 col-xs-12">
					  <main>
						
						@if($movies_info->video_type=="Embed")
						  
						  <div class="videoWrapper">{!! $movies_info->video_url!!}</div>

						@elseif($movies_info->video_type=="URL")
						  <div id="container">                   
							<video id="v_player" class="video-js vjs-big-play-centered skin-blue" controls preload="none" width="640" height="450" poster="{{URL::to('upload/source/'.$movies_info->video_image)}}" data-setup="{}">
							  <source src="{{$movies_info->video_url}}" type="video/mp4"/>  
														<!-- video source -->
												 
								<!-- worning text if needed -->
								<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
							</video>
						</div>                
						@else
						<div id="container">
						  <video id="v_player" class="video-js vjs-big-play-centered skin-blue" controls preload="none" width="640" height="450" poster="{{URL::to('upload/source/'.$movies_info->video_image)}}" data-setup="{}">
							<source src="{{URL::to('upload/source/'.$movies_info->video_url)}}" type="video/mp4"/>
													  <!-- video source -->
												 
								<!-- worning text if needed -->
								<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
							</video>
						</div>
						@endif
						
					  </main> 
					  <h3 class="vfx_video_title">{{$movies_info->video_title}}</h3> 
					  <ul class="channel_content_info">
						@if($movies_info->release_date)
						<li><i class="fa fa-calendar"></i> {{ isset($movies_info->release_date) ? date('M d Y',$movies_info->release_date) : null }}</li>
						@endif 
					   @if($movies_info->duration) 
					   <li><i class="fa fa-clock-o"></i> {{$movies_info->duration}}</li>
					   @endif
					  </ul> 
					   
					  <div class="video-attributes dtl_video">
						<div class="single-footer">
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<div class="news-share">
										<label>{{trans('words.share_text')}}: </label>
										<div class="share-social">
											<a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook"></i></a>
											<a href="https://twitter.com/intent/tweet?text={{$movies_info->video_title}}&amp;url={{url()->current()}}"><i class="fa fa-twitter"></i></a>
											<a href="http://pinterest.com/pin/create/button/?url={{url()->current()}}&media={{URL::to('upload/source/'.$movies_info->video_image)}}&description={{$movies_info->video_title}}"><i class="fa fa-pinterest"></i></a>
											<a href="https://wa.me/?text={{url()->current()}}"><i class="fa fa-whatsapp"></i></a>

										</div>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									 <div class="news-tag">
										@foreach(explode(',',$movies_info->movie_genre_id) as $genres_ids)
										<p><b><a href="{{ URL::to('genres/movies/'.App\Genres::getGenresInfo($genres_ids,'genre_slug')) }}">{{App\Genres::getGenresInfo($genres_ids,'genre_name')}}</a></b></p>
										@endforeach  

										<p><a href="{{ URL::to('language/movies/'.App\Language::getLanguageInfo($movies_info->movie_lang_id,'language_slug')) }}"><b>{{App\Language::getLanguageInfo($movies_info->movie_lang_id,'language_name')}}</b></a></p>
									</div>
								</div>
							</div>
						</div> 
							  
					  </div>            
					</div>
					<div class="col-md-4 col-sm-4 col-xs-12">             
					  <div class="sidebar_playlist">
						<div class="caption">
						   <div class="left"> <a href="#"><i class="fa fa-list"></i> {{trans('words.latest_movies')}}</a> </div>               
						   <div class="clearfix"></div>
						</div>
						@foreach($latest_movies_list as $latest_movies_data)
						<div class="playlist_item">
						  <a href="{{ URL::to('movies/'.$latest_movies_data->video_slug.'/'.$latest_movies_data->id) }}">
							<img src="{{URL::to('upload/thumbs/'.$latest_movies_data->video_image)}}" alt="show" />
							<div class="playlist_content">
							  <h3>{{$latest_movies_data->video_title}}</h3>
							 </div>        
						  </a>
						</div>
						@endforeach
							   
					  </div> 
					</div>
				  </div>
                <div class="single-section video-entry mr-top-40" id="episodes_all">
                  <h3 class="single-vfx_section_title">{{trans('words.description')}}</h3>
                  <div class="section-content">
                    <p>{!!stripslashes($movies_info->video_description)!!}</p>         
                  </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   
  <div class="section section-padding top-padding-normal vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title">{{trans('words.you_may_like')}}</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel" id="video-carousel">
          @foreach($related_movies_list as $movies_data)
           <a href="{{ URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->id) }}">
           <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.$movies_data->video_image)}}" alt="Movie Thumb"> @if($movies_data->video_access=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif
                <div class="thumb-hover"> 
            
                <i class="icon fa fa-play"></i><span class="ripple"></span>
            
              </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{$movies_data->video_title}}</h4>                
               </div>
            </div>
          </a>
          @endforeach
       
        </div>
      </div>
    </div>
  </div>
   
</div>


<!--<script src="https://vjs.zencdn.net/7.6.5/video.js"></script>-->

<script src="{{ URL::asset('site_assets/video_player/js/video.js') }}"></script> 
<script>
var viavi_player = videojs("v_player", { 
	"controls": true, 
	"autoplay": false,
	"fluid": true, 
	"preload": "auto" ,
	"playbackRates": [0.5, 1, 1.5, 2],
	"width": 640,
	"height": 265 
});
</script>
<!-- Logo/watermark -->
<script src="{{ URL::asset('site_assets/video_player/js/watermark-logo.min.js') }}"></script>
<script>
  viavi_player.videoLogo({
	watermark: ' ',
	logo: "{{ URL::asset('upload/source/'.getcong('site_logo')) }}",       // default 'logo.png'
	homepage: '{{ URL::to('/') }}',
  });
</script>
<!-- End Logo/watermark -->
<!--  seek button -->
<script src="{{ URL::asset('site_assets/video_player/js/videojs-seek-buttons.min.js') }}"></script>
<script>
viavi_player.seekButtons({
	forward: 10,
	back: 5      });
</script>
<!--  END seek button --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-ads/6.6.5/videojs.ads.js"></script>  

<script>
 viavi_player.ads();

 viavi_player.on('contentchanged', function() {
// in a real plugin, you might fetch new ad inventory here
viavi_player.trigger('adsready');
});

 viavi_player.on('readyforpreroll', function() {
viavi_player.ads.startLinearAdMode();
// play your linear ad content
// in this example, we use a static mp4
viavi_player.src('http://localhost/laravel58_video_script/public/upload/source/S_landscape2.mp4');

// send event when ad is playing to remove loading spinner
viavi_player.one('adplaying', function() {
viavi_player.trigger('ads-ad-started');
});

// resume content when all your linear ads have finished
viavi_player.one('adended', function() {
viavi_player.ads.endLinearAdMode();
});
});


viavi_player.trigger('adsready');
</script>
@endsection