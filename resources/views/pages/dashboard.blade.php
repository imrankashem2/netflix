@extends('site_app')

@section('head_title', trans('words.dashboard_text').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="{{ URL::to('/') }}">{{trans('words.home')}}</a></li>
         <li>{{trans('words.dashboard_text')}}</li>     
      </ul>  
    </div>
    </div>
  </div>
</div>
<div class="main-wrap">
  <div class="section section-padding ">
 
    <div class="container">

       @if(Session::has('flash_message'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  {{ Session::get('flash_message') }}
              </div>
        @endif
        @if(Session::has('success'))
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  {{ Session::get('success') }}
              </div>
        @endif
        @if(Session::has('error_flash_message'))
              <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  {{ Session::get('error_flash_message') }}
              </div>
        @endif
        <div class="col-md-12 col-sm-12 col-xs-12 profile-sec-1 card-1">
            <div class="col-md-3 col-sm-4">
              <div class="img-profile">
                @if(Auth::User()->user_image)
                  <img src="{{ URL::asset('upload/'.Auth::User()->user_image) }}" class="img-rounded" alt="profile_img">
                @else  
                  <img src="{{ URL::asset('site_assets/images/avatar.jpg') }}" class="img-rounded" alt="profile_img">
                @endif  
              </div>
        <div class="profile_title_item">
          <h5>{{Auth::User()->name}}</h5>
          <p>{{Auth::User()->email}}</p>
          <a href="{{ URL::to('profile') }}" class="pure-button btn btn-primary">{{trans('words.edit')}}</a> 
        </div>
            </div>                        
            <div class="col-md-9 col-sm-8">
              <div class="col-md-6 col-sm-6">
                <div class="member-ship-option">
                  <h5 class="color-up">{{trans('words.my_subscription')}}</h5>
                  <p class="premuim-memplan"><b>{{trans('words.current_plan')}}:</b> {{\App\SubscriptionPlan::getSubscriptionPlanInfo($user->plan_id,'plan_name')}}</p>
                  
                  @if($user->exp_date)<p>{{trans('words.subscription_expires_on')}} <b>{{date('F,  d, Y',$user->exp_date)}}</b></p>@endif
                  <div> 
                      <a href="{{ URL::to('membership_plan') }}" class="member-a" onclick="">{{trans('words.upgrade_plan')}} </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="member-ship-option">
                  <h5 class="color-up">{{trans('words.last_invoice')}}</h5>
                  <p class="premuim-memplan"><b>{{trans('words.date')}}:</b> <span class="mem-span">@if($user->start_date){{date('F,  d, Y',$user->start_date)}}@endif</span></p>
                  <p class="premuim-memplan"><b>{{trans('words.plan')}}:</b> <span class="mem-span">{{\App\SubscriptionPlan::getSubscriptionPlanInfo($user->plan_id,'plan_name')}}</span></p>
                  <p class="premuim-memplan"><b>{{trans('words.amount')}}:</b> <span class="mem-span">@if($user->plan_amount){{number_format($user->plan_amount,2,'.', '') }}@endif</span></p>
                </div>
              </div>
            </div>
        </div>                      
    </div>
  </div>
</div>
  
 

 
@endsection