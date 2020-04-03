@extends('site_app')

@section('head_title', trans('words.pay_with_stripe').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="{{ URL::to('dashboard') }}">{{trans('words.dashboard_text')}}</a></li>
         <li>{{trans('words.pay_with_stripe')}}</li>     
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
            <h5>{{trans('words.pay_with_stripe')}}</h5>       
          </div>

          @if ($message = Session::get('error'))
          <div class="custom-alerts alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
              {!! $message !!}
          </div>
          <?php Session::forget('error');?>
          @endif
            
          {!! Form::open(array('url' => 'stripe','class'=>'','id'=>'payment-form','role'=>'form')) !!}
            <div class="row mr-top-40">
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label>{{trans('words.card_no')}}:</label>
                <input placeholder="xxxxxxxxxxxxxxx" name="card_no" value="{{ old('card_no') }}" class="form-control" type="text"> 
                @if ($errors->has('card_no'))
                    <span class="help-block">
                        <strong>{{ $errors->first('card_no') }}</strong>
                    </span>
                @endif 
              </div>
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label>{{trans('words.expiry_month')}}:</label>
                <input placeholder="09" name="ccExpiryMonth" value="{{ old('ccExpiryMonth') }}" class="form-control" type="text">  
              </div>
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label>{{trans('words.expiry_year')}}:</label>
                <input placeholder="2021" name="ccExpiryYear" value="{{ old('ccExpiryYear') }}" class="form-control" type="text">  
              </div>
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label>{{trans('words.cvc_number')}}:</label>
                <input placeholder="999" name="cvvNumber" value="{{ old('cvvNumber') }}" class="form-control" type="text">  
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary stripe_pay">
                  {{trans('words.pay_now')}}
                </button> 
              </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>      
      </div>
    </div>
  </div>
  </div>
</div> 
 
@endsection