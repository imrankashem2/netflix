@extends('site_app')

@section('head_title', trans('words.forgot_password').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="vfx_account_wrap forgot_password_item">

   {!! Form::open(array('url' => 'password/email','class'=>'vfx_accountform loginform','id'=>'loginform','role'=>'form')) !!}     
    <h3>{{trans('words.forgot_password')}}</h3>

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
         <p><input type="text" name="email" value="" placeholder="{{trans('words.email')}}" ></p>
      </label>      
    </div>
       
  <div class="clearfix"></div>
      <button type="submit">{{trans('words.reset_password')}}</button>
   {!! Form::close() !!} 
</div>
  
 

 
@endsection