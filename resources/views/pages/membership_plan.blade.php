@extends('site_app')

@section('head_title', trans('words.subscription_plan').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="{{ URL::to('dashboard') }}">{{trans('words.home')}}</a></li>
         <li>{{trans('words.subscription_plan')}}</li>      
      </ul>  
    </div>
  </div>
  </div>
</div>

<div class="main-wrap">
  <div class="section section-padding">
    <div class="container">
      <div class="row">
      
      @foreach($plan_list as $plan_data)  
      <div class="col-md-3 col-sm-4 col-xs-12">
      <div class="member-ship-option select_plan">
        <h5 class="color-up">{{$plan_data->plan_price}} <span>{{getcong('currency_code')}}</span><p class="premuim-memplan">For {{ App\SubscriptionPlan::getPlanDuration($plan_data->id) }}</p></h5>        
        <p>{{$plan_data->plan_name}}</p>
        <a href="{{ URL::to('payment_method/'.$plan_data->id) }}">{{trans('words.select_plan')}}</a>        
      </div>
      </div>
      @endforeach 
       
       
        </div>
    </div>
  </div>
</div>
 

 
@endsection