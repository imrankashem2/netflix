@extends('site_app')

@section('head_title', trans('words.sign_up').' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="vfx_account_wrap">

   {!! Form::open(array('url' => 'signup','class'=>'vfx_accountform signupform','id'=>'loginform','role'=>'form')) !!}     
    <h3>{{trans('words.sign_up')}}</h3>

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
        </div>

    <div class="basic-field">
       <label>{{trans('words.name')}}:- <br/>
          <p><input type="text" name="name" placeholder="Name" required></p>
      </label>
      <label>{{trans('words.email')}}:- <br/>
          <p><input type="email" name="email" placeholder="Email" required></p>
      </label>
      <label>{{trans('words.password')}}:- <br/>
          <p><input type="password" name="password" placeholder="Password" required></p>
      </label>      
    <label>{{trans('words.confirm_password')}}:- <br/>
          <p><input type="password" name="password_confirmation" placeholder="Confirm Password" required></p>
      </label> 
    </div>
        
  <button type="submit">{{trans('words.sign_up')}}</button>
    <p class="signup-recover">{{trans('words.do_you_have_account')}} <a href="{{ URL::to('login') }}">{{trans('words.login_text')}}</a></p>
  {!! Form::close() !!} 
</div>
  
 

 
@endsection