@extends('site_app')

@section('head_title', 'Page Not Found | '.getcong('site_name') )

@section('head_url', Request::url())

@section('content')
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="{{ URL::to('/') }}">Home</a></li>
         <li>Page Not Found</li>      
      </ul>  
    </div>
  </div>
  </div>
</div>

<div class="main-wrap">
  <div class="section">
    <div class="container">
      <div class="row section-padding" style="text-align:center;padding:80px 0;">
        <span class="clt-content" style="margin-bottom:0"><h2 style="font-size:170px;font-weight:800;color: #eb1536;margin-bottom:0px;">404</</h2></span>        
      </div>
      
    </div>
  </div>
</div>
 

 
@endsection