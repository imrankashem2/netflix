@extends('site_app')

@section('head_title', $genres_info->genre_name.' '.trans('words.tv_shows_text').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="{{ URL::to('/') }}">{{trans('words.home')}}</a></li>
      <li>{{trans('words.popular_in')}} {{$genres_info->genre_name}}</li>
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
      
      @foreach($series_list as $series_data)    
      <a href="{{ URL::to('series/'.$series_data->series_slug.'/'.$series_data->id) }}">
      <div class="col-md-3 col-sm-4 col-xs-6 sm-top-30">
        <div class="vfx_upcomming_item_block"> 
		<div class="series_view_img">
			<img class="img-responsive" src="{{URL::to('upload/source/'.$series_data->series_poster)}}" alt="show">
		</div>	
        <div class="vfx_upcomming_detail">
          <h4 class="vfx_video_title">{{Str::limit($series_data->series_name,20)}}</h4>          
        </div>            
        </div>                  
      </div>
      </a>
      @endforeach  
      
      
              @include('_particles.pagination', ['paginator' => $series_list])             
          
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