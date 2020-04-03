@extends('site_app')

@section('head_title', trans('words.language_text').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
 <div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="{{URL::to('/')}}">{{trans('words.home')}}</a></li>
      <li>{{trans('words.language_text')}}</li>
      </ul>  
    </div>
    </div>
  </div>
</div>

<div class="main-wrap">
  <div class="section section-padding tv_show vfx_video_list_section text-white">
    <div class="container">
      <div class="row">
        <div class="show-listing">
        @foreach($lang_list as $lang_data)
        <div class="col-md-2 col-sm-3 col-xs-6 sm-top-30">
          <div class="vfx_language_list"> 
          <div class="b-language"> 
            <a href="single-video-tabs.html">
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
@endsection