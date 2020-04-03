@extends('site_app')

@section('head_title', trans('words.latest_movies').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="{{ URL::to('/') }}">{{trans('words.home')}}</a></li>
      <li>{{trans('words.latest_movies')}}</li>
      </ul>  
    </div>
    </div>
  </div>
</div>

@if(get_ads('movie_list_ad_top')->status!=0)
        <div class="add_banner_section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                {!!get_ads('movie_list_ad_top')->ad_code!!}
              </div>
            </div>
          </div>  
        </div>
        @endif

 <div class="main-wrap">
  <div class="section section-padding tv_show vfx_video_list_section text-white">
    <div class="container">
      <div class="row">
 
        <div class="show-listing">
      
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
              
            <div class="col-md-2 col-sm-4 col-xs-6">
            <div class="vfx_video_item"> 
              <div class="thumb-wrap">
              <img src="{{URL::to('upload/source/'.App\Movies::getMoviesInfo($latest_movie,'video_image_thumb'))}}" alt="Movie Thumb"> @if(App\Movies::getMoviesInfo($latest_movie,'video_access')=='Paid')<span class="premium_video"><i class="fa fa-lock"></i>Premium</span>@endif
                <div class="thumb-hover">            
                  <i class="icon fa fa-play"></i><span class="ripple"></span>
            
                </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title">{{ Str::limit(App\Movies::getMoviesInfo($latest_movie,'video_title'),12)}}</h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> {{App\Movies::getMoviesInfo($latest_movie,'duration')}}</p>
               </div>
            </div>
           </div> 
           </a> 
            @endif
          @endforeach   
           
       
        </div>    
      </div>
    </div>
  </div>
</div>

@if(get_ads('movie_list_ad_bottom')->status!=0)
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {!!get_ads('movie_list_ad_bottom')->ad_code!!}
        </div>
      </div>
    </div>  
  </div>
  @endif

 
@endsection