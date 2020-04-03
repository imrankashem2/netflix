@extends('site_app')
 

@if($season_info->seo_title)
  @section('head_title', stripslashes($season_info->seo_title).' | '.getcong('site_name'))
@else
  @section('head_title', $series_name.' '.stripslashes($season_info->season_name).' | '.getcong('site_name'))
@endif

@if($season_info->seo_description)
  @section('head_description', stripslashes($season_info->seo_description)) 
@endif

@if($season_info->seo_keyword)
  @section('head_keywords', stripslashes($season_info->seo_keyword)) 
@endif


@section('head_url', Request::url())

@section('content')
  
 
 <div class="main-wrap">
  
  @if(get_ads('shows_list_ad_top')->status!=0)
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {!!get_ads('shows_list_ad_top')->ad_code!!}
        </div>
      </div>
    </div>  
  </div>
  @endif
   
  <div class="section section-padding top-padding-normal vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="{{ URL::to('series/'.$series_slug.'/'.$season_info->series_id) }}">{{$series_name}}</a> - {{$season_info->season_name}}</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="owl-carousel video-carousel" id="video-carousel">
          
          @foreach($episode_list as $episode_data)
          
          @if(Auth::check())              
              <a href="{{ URL::to('series/'.$series_slug.'/'.$episode_data->video_slug.'/'.$episode_data->id) }}">
          @else
             @if($episode_data->video_access=='Paid')
              <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
             @else
              <a href="{{ URL::to('series/'.$series_slug.'/'.$episode_data->video_slug.'/'.$episode_data->id) }}">
             @endif  
          @endif  
          <div class="vfx_video_item">
            <div class="thumb-wrap vfx_upcomming_item_block"> 
              <img src="{{URL::to('upload/source/'.$episode_data->video_image)}}" alt="{{$episode_data->video_title}}">
              @if($episode_data->video_access=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif                             
            </div>
            <div class="vfx_video_detail">
              <h4 class="vfx_video_title">{{Str::limit($episode_data->video_title,15)}}</h4>
             </div>
          </div>
          </a>
          @endforeach
      
          
        </div>
      </div>
    </div>
  </div>
  
   
</div>
 
@if(get_ads('shows_list_ad_bottom')->status!=0)
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {!!get_ads('shows_list_ad_bottom')->ad_code!!}
        </div>
      </div>
    </div>  
  </div>
  @endif
 
@endsection