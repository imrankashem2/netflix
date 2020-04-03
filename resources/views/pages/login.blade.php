@extends('site_app')

@section('head_title', trans('words.login_text').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="container">
  <div class="col-md-6">

    <div class="vfx_account_wrap">


      {!! Form::open(array('url' => 'login','class'=>'vfx_accountform loginform','id'=>'loginform','role'=>'form')) !!}       
      <h3>{{trans('words.login_text')}}</h3>

      <div class="message">                                                 
            @if(Session::has('login_flash_error'))
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
            @endif
            @if(Session::has('flash_message'))
                      <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          {{ Session::get('flash_message') }}
                      </div>
            @endif
            @if(Session::has('error_flash_message'))
                      <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          {{ Session::get('error_flash_message') }}
                      </div>
            @endif             
        </div>

      <div class="basic-field">
        <label>
         <p><input type="text" name="email" value="" placeholder="{{trans('words.email')}}"></p>
        </label>
        <label>
        <p><input type="password" name="password" value="" placeholder="{{trans('words.password')}}" ></p>
        </label>
      </div>
        <label class="vfx_stay_login">
        <input type="checkbox" name="remember">{{trans('words.remember_me')}}
      </label>
      <label class="vfx_forgot_pass">
        <a href="{{ URL::to('password/email') }}"> {{trans('words.forgot_password')}}?</a>
      </label>
      <div class="clearfix"></div>
        <button type="submit">{{trans('words.login_text')}}</button>
        <p class="signup-recover">{{trans('words.dont_have_account')}} <a href="#goto_signup">{{trans('words.sign_up')}}</a></p>
      {!! Form::close() !!} 
    </div>
  </div>
  
  <div class="col-md-6">
    <div class="vfx_account_wrap" id="goto_signup">
       
      {!! Form::open(array('url' => 'signup','class'=>'vfx_accountform signupform','id'=>'loginform','role'=>'form')) !!}
      <h3>{{trans('words.sign_up')}}</h3>

      <div class="message">                                                 
            @if(Session::has('signup_flash_error'))
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
            @endif                
        </div>

      <div class="basic-field">
        <label>
          <p><input type="text" name="name" placeholder="{{trans('words.name')}}" ></p>
        </label>
        <label>    
        <label>
          <p><input type="email" name="email" placeholder="{{trans('words.email')}}" ></p>
        </label>
        <label>
          <p><input type="password" name="password" placeholder="{{trans('words.password')}}" ></p>
        </label>
        <label>
          <p><input type="password" name="password_confirmation" placeholder="{{trans('words.confirm_password')}}" ></p>
        </label>                
      </div>
      <button type="submit">{{trans('words.sign_up')}}</button>
       
      {!! Form::close() !!} 
    </div>
  </div>
</div> 
 

 
@endsection