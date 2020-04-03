@extends('site_app')
 

@if($tv_info->seo_title)
	@section('head_title', stripslashes($tv_info->seo_title).' | '.getcong('site_name'))
@else
	@section('head_title', stripslashes($tv_info->channel_name).' | '.getcong('site_name') )
@endif

@if($tv_info->seo_description)
	@section('head_description', stripslashes($tv_info->seo_description))
@else
	@section('head_description', Str::limit(stripslashes($tv_info->channel_description),160))
@endif

@if($tv_info->seo_keyword)
	@section('head_keywords', stripslashes($tv_info->seo_keyword)) 
@endif


@section('head_image', URL::to('upload/source/'.$tv_info->channel_thumb) )

@section('head_url', Request::url())

@section('content')
  
 <link rel="stylesheet" href="{{ URL::asset('site_assets/video_player/css/video-js.min.css') }}">
 <link rel="stylesheet" href="{{ URL::asset('site_assets/video_player/css/videojs-tube.min.css') }}">
 <link rel="stylesheet" href="{{ URL::asset('site_assets/video_player/css/watermark-logo.min.css') }}">
 <link rel="stylesheet" href="{{ URL::asset('site_assets/video_player/css/videojs-seek-buttons.css') }}">

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
					<div class="single-section col-md-8 col-sm-12 col-xs-12">
					  <main>
						
						 
						 
						<div id="container">
						  @if($tv_info->channel_url_type=="embed")

					 		<iframe width="560" height="315" src="https://www.youtube.com/embed/Xul18B9zJY4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

						  @else

						  <video id="v_player" class="video-js vjs-big-play-centered skin-blue" controls preload="none" width="640" height="450" poster="{{URL::to('upload/source/'.$tv_info->channel_thumb)}}" data-setup="{}">
							 
													  <!-- video source -->
												 
								<!-- worning text if needed -->
								<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
							</video>
						    @endif	
						</div>
						 
						
					  </main> 
					  <h3 class="vfx_video_title">{{stripslashes($tv_info->channel_name)}}</h3> 
					   
					  <div class="video-attributes dtl_video">
						<div class="single-footer">
							<div class="row">
								<div class="col-md-6 col-xs-12">
									<div class="news-share">
										<label>{{trans('words.share_text')}}: </label>
										<div class="share-social">
											<a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank"><i class="fa fa-facebook"></i></a>
											<a href="https://twitter.com/intent/tweet?text={{$tv_info->channel_name}}&amp;url={{url()->current()}}"><i class="fa fa-twitter"></i></a>
											<a href="http://pinterest.com/pin/create/button/?url={{url()->current()}}&media={{URL::to('upload/source/'.$tv_info->channel_thumb)}}&description={{$tv_info->channel_name}}"><i class="fa fa-pinterest"></i></a>
											<a href="whatsapp://send?text={{url()->current()}}" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>

										</div>
									</div>
								</div>
								<div class="col-md-6 col-xs-12">
									 
								</div>
							</div>
						</div> 
							  
					  </div>

					  @if(get_ads('sports_single_ad_top')->status!=0)
					  <div class="add_banner_section">					     
					      <div class="row">
					        <div class="col-md-12">
					          {!!get_ads('sports_single_ad_top')->ad_code!!}
					        </div>
					      </div>					     
					  </div>
					  @endif

					  <div class="single-section video-entry mr-top-30" id="episodes_all">
						  <h3 class="single-vfx_section_title">{{trans('words.description')}}</h3>
						  <div class="section-content">
							@if(strlen($tv_info->channel_description) > 500)
							<div class="listing-section">
								  <div class="show-more">
									<div class="pricing-list-container">
									   {!!stripslashes($tv_info->channel_description)!!}
									</div>
								  </div>
								  <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a> 
							</div>
							@else
                				{!!stripslashes($tv_info->channel_description)!!}
							@endif
						  </div>
						</div>	
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">            
					    
					    @if(get_ads('sports_single_ad_sidebar')->status!=0)
						<div class="add_banner_section">					     
						  <div class="row">
						    <div class="col-md-12">
						      {!!get_ads('sports_single_ad_sidebar')->ad_code!!}
						    </div>
						  </div>					     
						</div>
						@endif

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
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        @foreach($related_livetv_list as $related_data)
            <a href="{{ URL::to('live-tv/'.$related_data->channel_slug.'/'.$related_data->id) }}">
            <div class="vfx_video_item">
              <div class="vfx_upcomming_item_block"> 
                <img class="img-responsive" src="{{URL::to('upload/source/'.$related_data->channel_thumb)}}" alt="show"> 
                <div class="vfx_upcomming_detail">
                  <h4 class="vfx_video_title">{{Str::limit($related_data->channel_name,25)}}</h4>
                 </div>            
             </div>                  
           </div>
           </a>
        @endforeach
        </div>         
      </div>
    </div>
  </div>
   
</div>

@if(get_ads('sports_single_ad_bottom')->status!=0)
<div class="add_banner_section">					     
  <div class="row">
    <div class="col-md-12">
      {!!get_ads('sports_single_ad_bottom')->ad_code!!}
    </div>
  </div>					     
</div>
@endif
 
<script src="{{ URL::asset('site_assets/video_player/js/video.js') }}"></script> 

@if($tv_info->channel_url_type=="hls")
<script src="https://unpkg.com/videojs-flash/dist/videojs-flash.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.min.js"></script>


<script>
var viavi_player = videojs("v_player", { 
                "controls": true, 
                "autoplay": true,
                "fluid": true, 
                "preload": "auto" ,
                //"playbackRates": [0.5, 1, 1.5, 2],
                "width": 640,
                "height": 265,
                sources: [
                        	{ src: 'http://mysisli.com/36bay2/gin/giniko_1tvafg_800kb_36bay2/tracks-v1a1/mono.m3u8', type: 'application/x-mpegURL'}
                        ],
            });
</script>        
@endif

@if($tv_info->channel_url_type=="mpeg-dash")

<script src="{{ URL::asset('site_assets/video_player/plugins/dash-js/dash.all.min.js') }}"></script>
<script src="{{ URL::asset('site_assets/video_player/plugins/videojs-dash.min.js') }}"></script>
  
<script>
var viavi_player = videojs("v_player", { 
                "controls": true, 
                "autoplay": true,
                "fluid": true, 
                "preload": "auto" ,
                //"playbackRates": [0.5, 1, 1.5, 2],
                "width": 640,
                "height": 265,
                sources: [
                        	{ src: '{{$tv_info->channel_url}}', type: 'application/dash+xml'}
                        ],
            });
</script>

@endif
   

 


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

   
 
@endsection