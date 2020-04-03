@extends('site_app')

@section('head_title', trans('words.movies_genres').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
 <div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="{{URL::to('/')}}">{{trans('words.home')}}</a></li>
      <li>{{trans('words.movies_genres')}}</li>
      </ul>  
    </div>
    </div>
  </div>
</div>

 @if(get_ads('genres_ad_top')->status!=0)
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {!!get_ads('genres_ad_top')->ad_code!!}
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
        @foreach($genres_list as $genres_data)
        <div class="col-md-2 col-sm-3 col-xs-6 sm-top-30">
          <div class="vfx_language_list"> 
          <div class="b-language"> 
            <a href="{{ URL::to('genres/movies/'.$genres_data->genre_slug) }}">
              <div class="language_text_block">
                <h3 class="name">{{$genres_data->genre_name}}</h3>              
              </div>
              @if($genres_data->genres_image)
                <img src="{{URL::to('upload/source/'.$genres_data->genres_image)}}" alt="">
              @else
                <img src="{{URL::to('site_assets/images/colored-painted.jpg')}}" alt="">
              @endif              
            
            </a>                    
          </div>                           
          </div>                  
       </div>
      @endforeach 
      
      
    
        </div>      
      </div>
    </div>
  </div>
</div>
 
@if(get_ads('genres_ad_bottom')->status!=0)
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          {!!get_ads('genres_ad_bottom')->ad_code!!}
        </div>
      </div>
    </div>  
  </div>
  @endif
 
@endsection