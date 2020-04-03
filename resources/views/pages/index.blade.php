@extends('site_app')

@section('head_title', getcong('site_name') )

@section('head_url', Request::url())

@section('content')

<div class="vfx_banner_slider-area text-white">
  <div id="vfx_banner_slider" class="owl-carousel vfx_banner_slider">
    
    @foreach($slider as $slider_data)
    <div class="banner-item" style="background-image:url({{URL::to('upload/source/'.$slider_data->slider_image)}});">
      <div class="overlay-70"> 
        @if($slider_data->slider_type=="Movies")
        <a class="" href="{{ URL::to('movies/'.App\Movies::getMoviesInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id) }}">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a>
        @elseif($slider_data->slider_type=="Shows")
        <a class="" href="{{ URL::to('series/'.App\Series::getSeriesInfo($slider_data->slider_post_id,'series_slug').'/'.$slider_data->slider_post_id) }}">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a>
        @elseif($slider_data->slider_type=="Sports")
        <a class="" href="{{ URL::to('sports/'.App\Sports::getSportsInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id) }}">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a>
        @elseif($slider_data->slider_type=="LiveTV")
        <a class="" href="{{ URL::to('live-tv/'.App\LiveTV::getLiveTvInfo($slider_data->slider_post_id,'channel_slug').'/'.$slider_data->slider_post_id) }}">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a>  
        @else
          <a class="" href="#">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
          </a>
        @endif
        <div class="vfx_banner_content">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-8"> 
                <h2 class="banner-title">
                  
                  @if($slider_data->slider_type=="Movies")
                  <a class="" href="{{ URL::to('movies/'.App\Movies::getMoviesInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id) }}">
                      {{$slider_data->slider_title}}
                  </a>
                  @elseif($slider_data->slider_type=="Shows")
                  <a class="" href="{{ URL::to('series/'.App\Series::getSeriesInfo($slider_data->slider_post_id,'series_slug').'/'.$slider_data->slider_post_id) }}">
                      {{$slider_data->slider_title}}
                  </a>
                  @elseif($slider_data->slider_type=="Sports")
                  <a class="" href="{{ URL::to('sports/'.App\Sports::getSportsInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id) }}">
                      {{$slider_data->slider_title}}
                  </a>
                  @elseif($slider_data->slider_type=="LiveTV")
                  <a class="" href="{{ URL::to('live-tv/'.App\LiveTV::getLiveTvInfo($slider_data->slider_post_id,'channel_slug').'/'.$slider_data->slider_post_id) }}">
                      {{$slider_data->slider_title}}
                  </a>  
                  @else
                    <a href="#">{{$slider_data->slider_title}}</a>
                  @endif                  
                
                </h2>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
 
  </div>
</div>

<div class="main-wrap">   

  @if(get_ads('home_ad_top')->status!=0)
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {!!get_ads('home_ad_top')->ad_code!!}
        </div>
      </div>
    </div>  
  </div>
  @endif

  @if(Auth::check() && $recently_watched->count() >0)
  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title">
              Recenty Views
            </h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel vfx_tvshow_carousel recently_item_watched" id="vfx_tvshow_carousel">
          
          @foreach($recently_watched as $i=>$watched_videos)   
          
          <div class="vfx_video_item">
            <div class="vfx_upcomming_item_block"> 
              @if($watched_videos->video_type=="Movies")
                <a href="{{ URL::to('movies/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id) }}">
                  <img class="img-responsive" src="{{URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image)}}" alt="Movies"></a> 
              @endif    
              @if($watched_videos->video_type=="Sports")
                <a href="{{ URL::to('sports/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id) }}">
                  <img class="img-responsive" src="{{URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image)}}" alt="Sports"></a> 
              @endif
              @if($watched_videos->video_type=="Episodes")
               <?php $episode_series_id=\App\Episodes::getEpisodesInfo($watched_videos->video_id,'episode_series_id');?>

                <a href="{{ URL::to('series/'.\App\Series::getSeriesInfo($episode_series_id,'series_slug').'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id) }}">
                  <img class="img-responsive" src="{{URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image)}}" alt="Episode"></a> 
              @endif

              @if($watched_videos->video_type=="LiveTV")
                <a href="{{ URL::to('live-tv/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id) }}">
                  <img class="img-responsive" src="{{URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_thumb)}}" alt="tv"></a> 
              @endif                  
                
                     
            </div> 
          </div>
       
          @endforeach 
      
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('movies/latest') }}">{{trans('words.latest_movies')}}</a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel" id="video-carousel">
          
          @foreach(explode(",",$home_sections->section1_latest_movie) as $latest_movie)            
            @if(App\Movies::getMoviesInfo($latest_movie,'status')==1)
            
            @if(Auth::check())              
                <a class="icon" href="{{ URL::to('movies/'.App\Movies::getMoviesInfo($latest_movie,'video_slug').'/'.App\Movies::getMoviesInfo($latest_movie,'id')) }}">              
            @else
               @if(App\Movies::getMoviesInfo($latest_movie,'video_access')=='Paid')
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               @else
                <a class="icon" href="{{ URL::to('movies/'.App\Movies::getMoviesInfo($latest_movie,'video_slug').'/'.App\Movies::getMoviesInfo($latest_movie,'id')) }}">
               @endif  
            @endif
              
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.App\Movies::getMoviesInfo($latest_movie,'video_image_thumb'))}}" alt="Movie Thumb"> @if(App\Movies::getMoviesInfo($latest_movie,'video_access')=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif
                <div class="thumb-hover">            
            <i class="icon fa fa-play"></i><span class="ripple"></span>
            
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{ Str::limit(App\Movies::getMoviesInfo($latest_movie,'video_title'),12)}}</h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> {{App\Movies::getMoviesInfo($latest_movie,'duration')}}</p>
               </div>
            </div>
           </a> 
            @endif
          @endforeach
       
      
        </div>
      </div>
    </div>
  </div>
   
  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('series/latest') }}">{{trans('words.latest_shows')}}</a></h2>
          </div>
        </div>
     
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        @foreach(explode(",",$home_sections->section2_latest_series) as $latest_series)            
          @if(App\Series::getSeriesInfo($latest_series,'status')==1)


            <a href="{{ URL::to('series/'.App\Series::getSeriesInfo($latest_series,'series_slug').'/'.App\Series::getSeriesInfo($latest_series,'id')) }}">
            <div class="vfx_video_item">
             <div class="vfx_upcomming_item_block"> 
              <img class="img-responsive" src="{{URL::to('upload/source/'.App\Series::getSeriesInfo($latest_series,'series_poster'))}}" alt="show">                            
             </div>                  
			 <div class="vfx_upcomming_detail">
			  <h4 class="vfx_video_title">{{Str::limit(App\Series::getSeriesInfo($latest_series,'series_name'),25) }}</h4>
			 </div> 
           </div>
           </a>  
          @endif
        @endforeach 

        </div>
      </div>
    </div>
  </div> 

    <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('movies/popular') }}">{{trans('words.popular_movies')}}</a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel" id="video-carousel">
          
          @foreach(explode(",",$home_sections->section3_popular_movie) as $popular_movie)            
            @if(App\Movies::getMoviesInfo($popular_movie,'status')==1)
            
            @if(Auth::check())              
                <a class="icon" href="{{ URL::to('movies/'.App\Movies::getMoviesInfo($popular_movie,'video_slug').'/'.App\Movies::getMoviesInfo($popular_movie,'id')) }}">              
            @else
               @if(App\Movies::getMoviesInfo($popular_movie,'video_access')=='Paid')
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               @else
                <a class="icon" href="{{ URL::to('movies/'.App\Movies::getMoviesInfo($popular_movie,'video_slug').'/'.App\Movies::getMoviesInfo($popular_movie,'id')) }}">
               @endif  
            @endif 
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.App\Movies::getMoviesInfo($popular_movie,'video_image_thumb'))}}" alt="Movie Thumb"> @if(App\Movies::getMoviesInfo($popular_movie,'video_access')=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif
                <div class="thumb-hover">           
            <i class="icon fa fa-play"></i><span class="ripple"></span>
           
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{ Str::limit(App\Movies::getMoviesInfo($popular_movie,'video_title'),12)}}</h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> {{App\Movies::getMoviesInfo($popular_movie,'duration')}}</p>
               </div>
            </div>
            </a>
            @endif
          @endforeach
       
      
        </div>
      </div>
    </div>
  </div>

  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('series/popular') }}">{{trans('words.popular_shows')}}</a></h2>
          </div>
        </div>     
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        @foreach(explode(",",$home_sections->section3_popular_series) as $popular_series)            
          @if(App\Series::getSeriesInfo($popular_series,'status')==1)
            <a href="{{ URL::to('series/'.App\Series::getSeriesInfo($popular_series,'series_slug').'/'.App\Series::getSeriesInfo($popular_series,'id')) }}">
            <div class="vfx_video_item">
              <div class="vfx_upcomming_item_block">
				<img class="img-responsive" src="{{URL::to('upload/source/'.App\Series::getSeriesInfo($popular_series,'series_poster'))}}" alt="show">                 
              </div>                  
			  <div class="vfx_upcomming_detail">
                  <h4 class="vfx_video_title">{{Str::limit(App\Series::getSeriesInfo($popular_series,'series_name'),25) }}</h4>
              </div>            
           </div>
           </a>  
          @endif
        @endforeach

        </div>
      </div>
    </div>
  </div> 
  
  @if($home_sections->section3_type=="Series")

  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('language/series/'.App\Language::getLanguageInfo($section3_lang_id,'language_slug')) }}">{{$home_sections->section3_title}}</a></h2>
          </div>
        </div>
      </div>
      <div class="row">
        @if(App\Language::getLanguageInfo($section3_lang_id,'language_slug'))
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        @foreach($home_sections_list3 as $list3_data)
            <a href="{{ URL::to('series/'.$list3_data->series_slug.'/'.$list3_data->id) }}">
            <div class="vfx_video_item">
			  <div class="vfx_upcomming_item_block">
                <img class="img-responsive" src="{{URL::to('upload/source/'.$list3_data->series_poster)}}" alt="show"> 
                <div class="vfx_upcomming_detail">
                  <h4 class="vfx_video_title">{{Str::limit($list3_data->series_name,25)}}</h4>
                </div>            
              </div>                  
           </div>
           </a>
        @endforeach   
        </div>
        @endif
      </div>
    </div>
  </div> 

  @else  
  <div class="section section-padding vfx_tvshow_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('language/movies/'.App\Language::getLanguageInfo($section3_lang_id,'language_slug')) }}">{{$home_sections->section3_title}}</a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        @if(App\Language::getLanguageInfo($section3_lang_id,'language_slug'))
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">      
 
           @foreach($home_sections_list3 as $list3_data)
            @if(Auth::check())              
                <a class="icon" href="{{ URL::to('movies/'.$list3_data->video_slug.'/'.$list3_data->id) }}">              
            @else
               @if($list3_data->video_access=='Paid')
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               @else
                <a class="icon" href="{{ URL::to('movies/'.$list3_data->video_slug.'/'.$list3_data->id) }}">
               @endif  
            @endif
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.$list3_data->video_image_thumb)}}" alt="Movie Thumb"> @if($list3_data->video_access=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif
                <div class="thumb-hover"> 
					<i class="icon fa fa-play"></i><span class="ripple"></span>
				</div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{Str::limit($list3_data->video_title,12)}}</h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> {{$list3_data->duration}}</p>
               </div>
            </div>
            </a>
           @endforeach         
      
        </div>
        @endif
      </div>
    </div>
  </div>
  @endif
  

  @if($home_sections->section4_type=="Series")

  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('language/series/'.App\Language::getLanguageInfo($section4_lang_id,'language_slug')) }}">{{$home_sections->section4_title}}</a></h2>
          </div>
        </div>
     
      </div>
      <div class="row">
        @if(App\Language::getLanguageInfo($section4_lang_id,'language_slug'))
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        @foreach($home_sections_list4 as $list4_data)
            <a href="{{ URL::to('series/'.$list4_data->series_slug.'/'.$list4_data->id) }}">
            <div class="vfx_video_item">
              <div class="vfx_upcomming_item_block"> 
                <img class="img-responsive" src="{{URL::to('upload/source/'.$list4_data->series_poster)}}" alt="show">                 
              </div>                  
			  <div class="vfx_upcomming_detail">
				<h4 class="vfx_video_title">{{Str::limit($list4_data->series_name,25)}}</h4>
 			  </div>            
           </div>
           </a>
        @endforeach   
        </div>
        @endif
      </div>
    </div>
  </div> 

  @else  
  <div class="section section-padding vfx_tvshow_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('language/movies/'.App\Language::getLanguageInfo($section4_lang_id,'language_slug')) }}">{{$home_sections->section4_title}}</a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        @if(App\Language::getLanguageInfo($section4_lang_id,'language_slug'))
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">      
 
           @foreach($home_sections_list4 as $list4_data)   
            
            @if(Auth::check())              
                <a class="icon" href="{{ URL::to('movies/'.$list4_data->video_slug.'/'.$list4_data->id) }}">              
            @else
               @if($list4_data->video_access=='Paid')
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               @else
                <a class="icon" href="{{ URL::to('movies/'.$list4_data->video_slug.'/'.$list4_data->id) }}">
               @endif  
            @endif  
            <div class="vfx_video_item">

              <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.$list4_data->video_image_thumb)}}" alt="Movie Thumb"> @if($list4_data->video_access=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif
                <div class="thumb-hover">            
            <i class="icon fa fa-play"></i><span class="ripple"></span>
            
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{Str::limit($list4_data->video_title,12)}}</h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> {{$list4_data->duration}}</p>
               </div>
            </div>
            </a>
           @endforeach         
      
        </div>
        @endif
      </div>
    </div>
  </div>
  @endif

  @if($home_sections->section5_type=="Series")

  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('language/series/'.App\Language::getLanguageInfo($section5_lang_id,'language_slug')) }}">{{$home_sections->section5_title}}</a></h2>
          </div>
        </div>
     
      </div>
      <div class="row">
        @if(App\Language::getLanguageInfo($section5_lang_id,'language_slug'))
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        @foreach($home_sections_list5 as $list5_data)
            <a href="{{ URL::to('series/'.$list5_data->series_slug.'/'.$list5_data->id) }}">
            <div class="vfx_video_item">
              <div class="vfx_upcomming_item_block"> 
             <img class="img-responsive" src="{{URL::to('upload/source/'.$list5_data->series_poster)}}" alt="show"> 
                <div class="vfx_upcomming_detail">
                  <h4 class="vfx_video_title">{{Str::limit($list5_data->series_name,25)}}</h4>
                 </div>            
             </div>                  
           </div>
           </a>
        @endforeach   
        </div>
        @endif
      </div>
    </div>
  </div> 

  @else  
  <div class="section section-padding vfx_tvshow_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('language/movies/'.App\Language::getLanguageInfo($section5_lang_id,'language_slug')) }}">{{$home_sections->section5_title}}</a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        @if(App\Language::getLanguageInfo($section5_lang_id,'language_slug'))
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">      
 
           @foreach($home_sections_list5 as $list5_data)   
            
            @if(Auth::check())              
                <a class="icon" href="{{ URL::to('movies/'.$list5_data->video_slug.'/'.$list5_data->id) }}">              
            @else
               @if($list5_data->video_access=='Paid')
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               @else
                <a class="icon" href="{{ URL::to('movies/'.$list5_data->video_slug.'/'.$list5_data->id) }}">
               @endif  
            @endif  
            <div class="vfx_video_item">

              <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.$list5_data->video_image_thumb)}}" alt="Movie Thumb"> @if($list5_data->video_access=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif
                <div class="thumb-hover"> 
           
            <i class="icon fa fa-play"></i><span class="ripple"></span>
           
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{Str::limit($list5_data->video_title,25)}}</h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> {{$list5_data->duration}}</p>
               </div>
            </div>
            </a>
           @endforeach         
      
        </div>
        @endif
      </div>
    </div>
  </div>
  @endif

    
</div>

@if(get_ads('home_ad_bottom')->status!=0)
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {!!get_ads('home_ad_bottom')->ad_code!!}
        </div>
      </div>
    </div>  
  </div>
  @endif


 
@endsection