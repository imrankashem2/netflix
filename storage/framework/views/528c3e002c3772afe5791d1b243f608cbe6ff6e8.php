<!DOCTYPE html>
<html lang="<?php echo e(getcong('default_language')); ?>">
<head>
<meta name="author" content="">
<meta name="description" content="">
<meta http-equiv="Content-Type"content="text/html;charset=UTF-8"/>
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<title><?php echo $__env->yieldContent('head_title', getcong('site_name')); ?></title>
<meta name="description" content="<?php echo $__env->yieldContent('head_description', getcong('site_description')); ?>" />
<meta name="keywords" content="<?php echo $__env->yieldContent('head_keywords', getcong('site_keywords')); ?>" />
<link rel="canonical" href="<?php echo $__env->yieldContent('head_url', url('/')); ?>">

<meta property="og:type" content="movie" />
<meta property="og:title" content="<?php echo $__env->yieldContent('head_title',  getcong('site_name')); ?>" />
<meta property="og:description" content="<?php echo $__env->yieldContent('head_description', getcong('site_description')); ?>" />
<meta property="og:image" content="<?php echo $__env->yieldContent('head_image', URL::asset('upload/source/'.getcong('site_logo'))); ?>" />
<meta property="og:url" content="<?php echo $__env->yieldContent('head_url', url('/')); ?>" />
<meta property="og:image:width" content="1024" />
<meta property="og:image:height" content="1024" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?php echo $__env->yieldContent('head_image', URL::asset('upload/source/'.getcong('site_logo'))); ?>">
<link rel="image_src" href="<?php echo $__env->yieldContent('head_image', URL::asset('upload/source/'.getcong('site_logo'))); ?>">

<?php if(getcong('external_css_js')=="CDN"): ?>
<!-- External CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css">
<!--<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/magnific-popup.css')); ?>">-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/css/bootstrap-select.min.css">
<?php else: ?>
<!-- External CSS -->
<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/bootstrap.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/font-awesome.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/owl.carousel.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/owl.transitions.css')); ?>">
<!--<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/magnific-popup.css')); ?>">-->
<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/bootstrap-select.css')); ?>">
<?php endif; ?>

<!-- Custom CSS -->
<?php if(getcong('styling')=="light"): ?>
<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/style_light.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/responsive_light.css')); ?>">
<?php else: ?>
<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/style_dark.css')); ?>">
<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/responsive_dark.css')); ?>">
<?php endif; ?>  

<link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/css/jquery-eu-cookie-law-popup.css')); ?>"> 
 

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">

<!-- Favicon -->
<link rel="icon" href="<?php echo e(URL::asset('upload/source/'.getcong('site_favicon'))); ?>">

 <?php if(getcong('site_header_code')): ?>
    <?php echo getcong('site_header_code'); ?>

 <?php endif; ?> 

</head>

<?php if(\Request::is('password/*')): ?>
<body class="vfx_account_page">
<?php else: ?>
<body <?php if(\Request::is('login') or \Request::is('signup') or \Request::is('password/email') or \Request::is('password/reset/')): ?> class="vfx_account_page" <?php endif; ?>>
<?php endif; ?>
<!--<div class="preloader" id="preloader">
  <div class="lds-css ng-scope">
    <div class="lds-ripple">
      <div></div>
      <div></div>
    </div>
  </div>
</div>-->

<?php echo $__env->make("_particles.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent("content"); ?>  
 

<?php echo $__env->make("_particles.footer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="eupopup eupopup-bottom"></div>

<!-- Script --> 
<?php if(getcong('external_css_js')=="CDN"): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.12/js/bootstrap-select.min.js"></script> 
<?php else: ?>
<script src="<?php echo e(URL::asset('site_assets/js/jquery.min.js')); ?>"></script> 
<script src="<?php echo e(URL::asset('site_assets/js/bootstrap.min.js')); ?>"></script> 
<script src="<?php echo e(URL::asset('site_assets/js/owl.carousel.js')); ?>"></script>
<script src="<?php echo e(URL::asset('site_assets/js/bootstrap-select.js')); ?>"></script> 
<?php endif; ?>
<!--<script src="<?php echo e(URL::asset('site_assets/js/jquery.magnific-popup.min.js')); ?>"></script> -->

<script src="<?php echo e(URL::asset('site_assets/js/jquery-eu-cookie-law-popup.js')); ?>"></script> 
<script src="<?php echo e(URL::asset('site_assets/js/custom.js')); ?>"></script>
 

<script type="text/javascript">
  
  $(document).ready( function() {
  if ($(".eupopup").length > 0) {
    $(document).euCookieLawPopup().init({
       'cookiePolicyUrl' : '<?php echo e(stripslashes(getcong('gdpr_cookie_url'))); ?>',
       'buttonContinueTitle' : '<?php echo e(trans('words.gdpr_continue')); ?>',
       'buttonLearnmoreTitle' : '<?php echo e(trans('words.gdpr_learn_more')); ?>',
       'popupPosition' : 'bottom',
       'colorStyle' : 'default',
       'compactStyle' : false,
       'popupTitle' : '<?php echo e(stripslashes(getcong('gdpr_cookie_title'))); ?>',
       'popupText' : '<?php echo e(stripslashes(getcong('gdpr_cookie_text'))); ?>'
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

<?php if(getcong('site_footer_code')): ?>
    <?php echo getcong('site_footer_code'); ?>

 <?php endif; ?>

</body>
</html><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/site_app.blade.php ENDPATH**/ ?>