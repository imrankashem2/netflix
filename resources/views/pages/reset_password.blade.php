@extends('site_app')

@section('head_title', trans('words.reset_password').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="vfx_account_wrap">

   {!! Form::open(array('url' => 'password/reset','class'=>'vfx_accountform loginform','id'=>'loginform','role'=>'form')) !!}     
    <h3>{{trans('words.reset_password')}}</h3>
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="message">                                                 
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
         <p><input type="text" name="email" value="" placeholder="{{trans('words.email')}}" ></p>
      </label>
      <label> 
      <p><input type="password" name="password" value="" placeholder="{{trans('words.password')}}" ></p>
      </label>
       <label> 
      <p><input type="password" name="password_confirmation" value="" placeholder="{{trans('words.confirm_password')}}" ></p>
      </label>
    </div>        
  <div class="clearfix"></div>
      <button type="submit">Submit</button>
     
  {!! Form::close() !!} 
</div>
  
 

 
@endsection