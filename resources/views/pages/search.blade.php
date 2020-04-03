@extends('site_app')

@section('head_title', trans('words.search').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="{{ URL::to('/') }}">{{trans('words.home')}}</a></li>
      <li>{{trans('words.search_result_for')}} {{$_GET['s']}}</li>
      </ul>  
    </div>
    </div>
  </div>
</div>

 <div class="main-wrap">
  @if(count($movies_list)>0 OR count($series_list)>0 OR count($sports_video_list)>0 OR count($live_tv_list)>0)     
  
  <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title">{{trans('words.movies_text')}}</h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="show-listing">
      
      @foreach($movies_list as $movies_data)
      @if(Auth::check())              
          <a class="icon" href="{{ URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->id) }}"> 
      @else
         @if($movies_data->video_access=='Paid')
          <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
         @else
          <a class="icon" href="{{ URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->id) }}">
         @endif  
      @endif
      <div class="col-md-2 col-sm-4 col-xs-6">
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.$movies_data->video_image_thumb)}}" alt="{{$movies_data->video_title}}">
                @if($movies_data->video_access=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif

                <div class="thumb-hover">           
                  <i class="icon fa fa-play"></i><span class="ripple"></span>
          
              </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{Str::limit($movies_data->video_title,12)}}</h4>
               </div>
            </div>
      </div>  
      </a>
     
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
            <h2 class="vfx_section_title">{{trans('words.shows_text')}}</h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="show-listing series_listing_view">
      
       @foreach($series_list as $series_data)    
      <a href="{{ URL::to('series/'.$series_data->series_slug.'/'.$series_data->id) }}">  
      <div class="col-md-3 col-sm-4 col-xs-6 sm-top-30">
        <div class="vfx_upcomming_item_block"> <img class="img-responsive" src="{{URL::to('upload/source/'.$series_data->series_poster)}}" alt="show">
        <div class="vfx_upcomming_detail">
          <h4 class="vfx_video_title">{{Str::limit($series_data->series_name,25)}}</h4>          
        </div>            
        </div>                  
      </div>
      </a>
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
            <h2 class="vfx_section_title">{{trans('words.sports_text')}}</h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="show-listing sports_listing_view">
      
       @foreach($sports_video_list as $sports_video)   
       
      
      @if(Auth::check())              
          <a class="icon" href="{{ URL::to('sports/'.$sports_video->video_slug.'/'.$sports_video->id) }}">
      @else
         @if($sports_video->video_access=='Paid')
          <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
         @else
          <a class="icon" href="{{ URL::to('sports/'.$sports_video->video_slug.'/'.$sports_video->id) }}">
         @endif  
      @endif  
      <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.$sports_video->video_image)}}" alt="{{$sports_video->video_title}}">
                @if($sports_video->video_access=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif

                <div class="thumb-hover"> 
         
          <i class="icon fa fa-play"></i><span class="ripple"></span>
         
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{Str::limit($sports_video->video_title,25)}}</h4>
               </div>
            </div>
      </div>
      </a>
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
            <h2 class="vfx_section_title">{{trans('words.live_tv')}}</h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="show-listing sports_listing_view">
      
       @foreach($live_tv_list as $live_tv_data)   
       
      
      @if(Auth::check())              
          <a class="icon" href="{{ URL::to('live-tv/'.$live_tv_data->channel_slug.'/'.$live_tv_data->id) }}">
      @else
         @if($live_tv_data->channel_access=='Paid')
          <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
         @else
          <a class="icon" href="{{ URL::to('sports/'.$live_tv_data->channel_slug.'/'.$live_tv_data->id) }}">
         @endif  
      @endif  
      <div class="col-md-3 col-sm-4 col-xs-6">
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="{{URL::to('upload/source/'.$live_tv_data->channel_thumb)}}" alt="{{$live_tv_data->channel_name}}">
                @if($live_tv_data->channel_access=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif

                <div class="thumb-hover"> 
         
          <i class="icon fa fa-play"></i><span class="ripple"></span>
         
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{Str::limit($live_tv_data->channel_name,25)}}</h4>
               </div>
            </div>
      </div>
      </a>
      @endforeach
 

        </div>    
      </div>
    </div>
  </div>

  @else
     <h3 style="text-align: center;padding-top: 25px;padding-bottom: 26px;color:#eb1536;">{{trans('words.no_search_found')}}</h3>
  @endif

</div>

 
@endsection