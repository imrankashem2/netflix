@extends('site_app')

@section('head_title', trans('words.pay_with_razorpay').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')

<style type="text/css">
  .razorpay-payment-button
  {
    text-align: center;
    background: #eb1536;
    padding: 6px 20px;
    line-height: 24px;
    font-size: 14px;
    font-weight: 500;
    border: 0px solid transparent;
    border-radius: 40px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    color: #ffffff;
    -webkit-transition: all .5s ease 0;
    transition: all .5s ease 0;
    transition: all 0.5s ease 0s;
}

</style>  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="{{ URL::to('dashboard') }}">{{trans('words.dashboard_text')}}</a></li>
         <li>{{trans('words.pay_with_razorpay')}}</li>     
      </ul>  
    </div>
    </div>
  </div>
</div>
<div class="main-wrap">
  <div class="section section-padding">
    <div class="select_plan_block">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12 col-xs-push-2">
        <div class="membership_plan_block">
          <div class="membership_plan_dtl">
            <h5>{{trans('words.pay_with_razorpay')}}</h5>       
          </div>

          @if ($message = Session::get('error'))
          <div class="custom-alerts alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
              {!! $message !!}
          </div>
          <?php Session::forget('error');?>
          @endif
          <div class="col-md-6 col-sm-4 col-xs-12" align="center">
            <div class="member-ship-option select_plan">
            <span><img src="{{ URL::asset('site_assets/images/icons/razorpay.png') }}" alt="ic_stripe" /></span> 
            {!! Form::open(array('url' => 'razorpay-success','class'=>'','id'=>'payment-form','role'=>'form')) !!}
              
              <script
              src="https://checkout.razorpay.com/v1/checkout.js"
              data-key="{{getcong('razorpay_key')}}"  
              data-amount="{{$plan_info->plan_price}}" 
              data-currency="{{getcong('currency_code')}}"
              data-order_id="{{$orderId}}"
              data-buttontext="{{trans('words.pay_with_razorpay')}}"
              data-name="{{getcong('site_name')}}"
              data-description="{{$plan_info->plan_name}}"
              data-image="{{ URL::asset('upload/source/'.getcong('site_logo')) }}"
              data-prefill.name="{{Auth::user()->name}}"
              data-prefill.email="{{Auth::user()->email}}"
              data-prefill.contact="{{Auth::user()->phone}}"
              data-theme.color="#eb1536" 
          ></script>
          <input type="hidden" custom="Hidden Element" name="hidden">
               
            {!! Form::close() !!}
            </div>
          </div>
          </div>
        </div>      
      </div>
    </div>
  </div>
  </div>
</div> 
 
@endsection