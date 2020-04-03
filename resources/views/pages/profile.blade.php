@extends('site_app')

@section('head_title', trans('words.profile').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="{{ URL::to('dashboard') }}">{{trans('words.dashboard_text')}}</a></li>
         <li>{{trans('words.profile')}}</li>     
      </ul>  
    </div>
    </div>
  </div>
</div>
<div class="main-wrap">
  <div class="section section-padding">
    <div class="container">
      <div class="row">            
        <div class="col-md-8 col-sm-8 col-xs-12 col-xs-push-2">
          <div class="color-bg card-1 edit_profile">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(Session::has('flash_message'))
                      <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          {{ Session::get('flash_message') }}
                      </div>
                @endif

            {!! Form::open(array('url' => 'profile','class'=>'chnge-password pure-form pure-chng"','name'=>'profile_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!}  
              <input name="" value="" type="hidden">
              <h5>{{trans('words.edit_profile')}}</h5>
              <div class="message"> </div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label>{{trans('words.name')}}</label>
                    <input name="name" class="name" value="{{$user->name}}" placeholder="Name" required type="text">
                  </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label>{{trans('words.email')}}</label>
                    <input name="email" class="email" value="{{$user->email}}" placeholder="Email" required type="text">
                  </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label>{{trans('words.password')}}</label>
                    <input name="password" class="password" value="" placeholder="Password" type="password">
                  </p>
                </div>                 
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label>{{trans('words.phone')}}</label>
                    <input name="phone" class="phone" value="{{$user->phone}}" placeholder="Phone" type="text">
                  </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label>{{trans('words.address')}}</label>
                    <textarea class="phone"  name="user_address" placeholder="Address">{{$user->user_address}}</textarea> 
                  </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label>{{trans('words.profile_image')}}</label>
                    <input name="user_image" class="paswrd-1 profile_user" type="file">
                  </p>
                </div>
              </div>              
              <div class="paste-mo bottom-border">
                <button type="submit" class="pure-button btn btn-primary">{{trans('words.update')}}</button>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
 
@endsection