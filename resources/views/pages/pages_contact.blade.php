@extends('site_app')

@section('head_title', $page_info->page_title.' | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="{{ URL::to('/') }}">{{trans('words.home')}}</a></li>
         <li>{{$page_info->page_title}}</li>      
      </ul>  
    </div>
  </div>
  </div>
</div>

<div class="main-wrap">
  <div class="section section-padding text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <span class="clt-content">{!!stripslashes($page_info->page_content)!!}</span>
        </div>
      </div>
      <div class="row">
    <div class="from-list-lt">
        <div class="col-md-8 col-xs-12 col-lg-8 col-sm-12 col-xs-offset-2">

          <div class="message">
                         
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                    
                        <ul style="list-style: none;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                                    
            </div>
            @if(Session::has('flash_message'))

              <div class="alert alert-success fade in">
                  
                 {{ Session::get('flash_message') }}
               </div>

                 
            @endif

          {!! Form::open(array('url' => 'contact_send','class'=>'form-float form-alt','id'=>'contact_form','role'=>'form')) !!}  
            <div class="row">
              <div class="form-group col-xs-12 col-sm-6"> 
                <input class="form-control" placeholder="{{trans('words.name')}}" type="text" name="name" required>
              </div>              
              <div class="form-group col-xs-12 col-sm-6"> 
                <input class="form-control" placeholder="{{trans('words.email')}}" type="text" name="email" required>
              </div>
              <div class="form-group col-xs-12 col-sm-6"> 
                <input class="form-control" placeholder="{{trans('words.phone')}}" type="text" name="phone">
              </div>
              <div class="form-group col-xs-12 col-sm-6"> 
                <input class="form-control" placeholder="{{trans('words.subject')}}" type="text" name="subject" required>
              </div>
              <div class="form-group col-xs-12"> 
                <textarea class="form-control" placeholder="{{trans('words.your_message')}}" name="message" required></textarea>
              </div>              
              <div class="form-group col-xs-12">
                <button class="btn" type="submit">{{trans('words.submit')}}</button>
              </div>
            </div>
          {!! Form::close() !!}
        </div>
        
      </div>
      </div>
    </div>
  </div>
</div>
 

 
@endsection