@extends('site_app')

@section('head_title', trans('words.live_tv').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="{{ URL::to('/') }}">{{trans('words.home')}}</a></li>
      <li>{{trans('words.live_tv')}}</li>
      </ul>  
    </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="custom_select_filter">
          <div class="custom-select">
            <select id="filter_list" class="selectpicker show-tick form-control is-invalid form-control-lg" required>
            <option value="?filter=new" @if(isset($_GET['filter']) && $_GET['filter']=='new' ) selected @endif>{{trans('words.newest')}}</option>
            <option value="?filter=old" @if(isset($_GET['filter']) && $_GET['filter']=='old' ) selected @endif>{{trans('words.oldest')}}</option>               
            <option value="?filter=alpha" @if(isset($_GET['filter']) && $_GET['filter']=='alpha' ) selected @endif>{{trans('words.a_to_z')}}</option>
            <option value="?filter=rand" @if(isset($_GET['filter']) && $_GET['filter']=='rand' ) selected @endif>{{trans('words.random')}}</option>
            </select> 
          </div>      
        </div>
    </div>      
</div>    
        
       @if(get_ads('livetv_list_ad_top')->status!=0)
        <div class="add_banner_section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                {!!get_ads('livetv_list_ad_top')->ad_code!!}
              </div>
            </div>
          </div>  
        </div>
        @endif


 <div class="main-wrap">
  <div class="section section-padding tv_show vfx_video_list_section text-white">
    <div class="container">
      <div class="row">

        
        
        
        <div class="show-listing sports_listing_view">
      
      @foreach($live_tv_list as $live_tv_data)   
       
      
      @if(Auth::check())              
          <a class="icon" href="{{ URL::to('live-tv/'.$live_tv_data->channel_slug.'/'.$live_tv_data->id) }}">
      @else
         @if($live_tv_data->channel_access=='Paid')
          <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
         @else
          <a class="icon" href="{{ URL::to('live-tv/'.$live_tv_data->channel_slug.'/'.$live_tv_data->id) }}">
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
                <h4 class="vfx_video_title">{{Str::limit($live_tv_data->channel_name,20)}}</h4>
               </div>
            </div>
      </div>
      </a>
      @endforeach  
      
      
              @include('_particles.pagination', ['paginator' => $live_tv_list])             
          

        </div>    
      </div>
    </div>
  </div>
</div>

      @if(get_ads('livetv_list_ad_bottom')->status!=0)
        <div class="add_banner_section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                {!!get_ads('livetv_list_ad_bottom')->ad_code!!}
              </div>
            </div>
          </div>  
        </div>
        @endif  
 
@endsection