@extends('site_app')

@section('head_title', trans('words.popular_shows').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="{{ URL::to('/') }}">{{trans('words.home')}}</a></li>
      <li>{{trans('words.popular_shows')}}</li>
      </ul>  
    </div>
    </div>
  </div>
</div>

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

 <div class="main-wrap">
  <div class="section section-padding tv_show vfx_video_list_section text-white">
    <div class="container">
      <div class="row">
        <div class="show-listing series_listing_view">
      
        @foreach(explode(",",$home_sections->section3_popular_series) as $popular_series)            
          @if(App\Series::getSeriesInfo($popular_series,'status')==1)
            <a href="{{ URL::to('series/'.App\Series::getSeriesInfo($popular_series,'series_slug').'/'.App\Series::getSeriesInfo($popular_series,'id')) }}">
            <div class="col-md-3 col-sm-4 col-xs-6 sm-top-30">
             <div class="vfx_upcomming_item_block">
              <img class="img-responsive" src="{{URL::to('upload/source/'.App\Series::getSeriesInfo($popular_series,'series_poster'))}}" alt="show"> 
                <div class="vfx_upcomming_detail">
                  <h4 class="vfx_video_title">{{Str::limit(App\Series::getSeriesInfo($popular_series,'series_name'),25) }}</h4>
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