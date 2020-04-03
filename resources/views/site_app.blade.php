<!DOCTYPE html>
<html lang="{{getcong('default_language')}}">
<head>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<title>@yield('head_title', getcong('site_name'))</title>
<meta name="description" content="@yield('head_description', getcong('site_description'))" />
<meta name="keywords" content="@yield('head_keywords', getcong('site_keywords'))" />
<link rel="canonical" href="@yield('head_url', url('/'))">

<meta property="og:type" content="movie" />
<meta property="og:title" content="@yield('head_title',  getcong('site_name'))" />
<meta property="og:description" content="@yield('head_description', getcong('site_description'))" />
<meta property="og:image" content="@yield('head_image', URL::asset('upload/source/'.getcong('site_logo')))" />
<meta property="og:url" content="@yield('head_url', url('/'))" />
<meta property="og:image:width" content="1024" />
<meta property="og:image:height" content="1024" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="@yield('head_image', URL::asset('upload/source/'.getcong('site_logo')))">
<link rel="image_src" href="@yield('head_image', URL::asset('upload/source/'.getcong('site_logo')))">

@if(getcong('external_css_js')=="CDN")
<!-- External CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">
<!--<link rel="stylesheet" href="{{ URL::asset('site_assets/css/magnific-popup.css') }}">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css">
@else
<!-- External CSS -->
<link rel="stylesheet" href="{{ URL::asset('site_assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('site_assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('site_assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ URL::asset('site_assets/css/owl.transitions.css') }}">
<!--<link rel="stylesheet" href="{{ URL::asset('site_assets/css/magnific-popup.css') }}">-->
<link rel="stylesheet" href="{{ URL::asset('site_assets/css/bootstrap-select.css') }}">
@endif

<!-- Custom CSS -->
@if(getcong('styling')=="light")
<link rel="stylesheet" href="{{ URL::asset('site_assets/css/style_light.css') }}">
<link rel="stylesheet" href="{{ URL::asset('site_assets/css/responsive_light.css') }}">
@else
<link rel="stylesheet" href="{{ URL::asset('site_assets/css/style_dark.css') }}">
<link rel="stylesheet" href="{{ URL::asset('site_assets/css/responsive_dark.css') }}">
@endif  

<link rel="stylesheet" href="{{ URL::asset('site_assets/css/jquery-eu-cookie-law-popup.css') }}"> 
 

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

<!-- Favicon -->
<link rel="icon" href="{{ URL::asset('upload/source/'.getcong('site_favicon')) }}">

 @if(getcong('site_header_code'))
    {!!getcong('site_header_code')!!}
 @endif 

</head>

@if (\Request::is('password/*'))
<body class="vfx_account_page">
@else
<body @if (\Request::is('login') or \Request::is('signup') or \Request::is('password/email') or \Request::is('password/reset/')) class="vfx_account_page" @endif>
@endif
<!--<div class="preloader" id="preloader">
  <div class="lds-css ng-scope">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
</div>-->

@include("_particles.header")

    @yield("content")  
 

@include("_particles.footer")

<div class="eupopup eupopup-bottom"></div>

<!-- Script --> 
@if(getcong('external_css_js')=="CDN")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script> 
@else
<script src="{{ URL::asset('site_assets/js/jquery.min.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/owl.carousel.js') }}"></script>
<script src="{{ URL::asset('site_assets/js/bootstrap-select.js') }}"></script> 
@endif
<!--<script src="{{ URL::asset('site_assets/js/jquery.magnific-popup.min.js') }}"></script> -->

<script src="{{ URL::asset('site_assets/js/jquery-eu-cookie-law-popup.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/custom.js') }}"></script>
 

<script type="text/javascript">
  
  $(document).ready( function() {
  if ($(".eupopup").length > 0) {
    $(document).euCookieLawPopup().init({
       'cookiePolicyUrl' : '{{stripslashes(getcong('gdpr_cookie_url'))}}',
       'buttonContinueTitle' : '{{trans('words.gdpr_continue')}}',
       'buttonLearnmoreTitle' : '{{trans('words.gdpr_learn_more')}}',
       'popupPosition' : 'bottom',
       'colorStyle' : 'default',
       'compactStyle' : false,
       'popupTitle' : '{{stripslashes(getcong('gdpr_cookie_title'))}}',
       'popupText' : '{{stripslashes(getcong('gdpr_cookie_text'))}}'
    });
  }
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  $(window).scroll(function(){
    if ($(this).scrollTop() > 100) {
      $('.scrollup').fadeIn();
    } else {
      $('.scrollup').fadeOut();
    }
  });
  $('.scrollup').click(function(){
    $("html, body").animate({ scrollTop: 0 }, 600);
    return false;
  });
});
</script>
<script>
  $('.dropdown-item').click(function(e){
    e.preventDefault();
    $('.select_season').text(($(this).text()));
  });
    var clicked=false;
    $('.user-menu').on('click', function(e) {
      if(!clicked){
        $('.user-menu ul').css({'opacity':'1','visibility':'visible'});
        clicked=true;  
      }else{
        $('.user-menu ul').css({'opacity':'0','visibility':'hidden'});
        clicked=false; 
      }      
    });
    $("body").click(function(e){
     if(e.target.className!=='content-user' && e.target.className!=='user-name'){
        $('.user-menu ul').css({'opacity':'0','visibility':'hidden'});
        clicked=false; 
     }
    });


</script> 
<script>

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.share-social > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script> 

<script>
$(function() {
    $("#filter_list").change(function() {
        //alert( $('option:selected', this).text() );
        var url = $(this).val(); // get selected value
        
        //alert( url );

        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });
});  
</script>

<script>
$('.show-more-button').on('click', function(e) {
  e.preventDefault();
  $(this).toggleClass('active');
  $('.show-more').toggleClass('visible');
  if ($('.show-more').is(".visible")) {
    var el = $('.show-more'),
      curHeight = el.height(),
      autoHeight = el.css('height', 'auto').height();
    el.height(curHeight).animate({
      height: autoHeight
    }, 400);
  } else {
    $('.show-more').animate({
      height: '150px'
    }, 400);
  }
});
</script>

@if(getcong('site_footer_code'))
    {!!getcong('site_footer_code')!!}
 @endif

</body>
</html>