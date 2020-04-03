@extends('site_app')

@section('head_title', trans('words.tv_show_languages').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
 <div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="{{URL::to('/')}}">Home</a></li>
      <li>{{trans('words.tv_show_languages')}}</li>
      </ul>  
    </div>
    </div>
  </div>
</div>

@if(get_ads('language_ad_top')->status!=0)
        <div class="add_banner_section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                {!!get_ads('language_ad_top')->ad_code!!}
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
        @foreach($lang_list as $lang_data)
        <div class="col-md-2 col-sm-3 col-xs-6 sm-top-30">
          <div class="vfx_language_list"> 
          <div class="b-language"> 
            <a href="{{ URL::to('language/series/'.$lang_data->language_slug) }}">
              <div class="language_text_block">
                <h3 class="name">{{$lang_data->language_name}}</h3>              
              </div>
              @if($lang_data->language_image)
                <img src="{{URL::to('upload/source/'.$lang_data->language_image)}}" alt="">
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

@if(get_ads('language_ad_bottom')->status!=0)
<div class="add_banner_section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        {!!get_ads('language_ad_bottom')->ad_code!!}
      </div>
    </div>
  </div>  
</div>
@endif   

 
@endsection