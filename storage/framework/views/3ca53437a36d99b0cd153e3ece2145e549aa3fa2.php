<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo e(getcong('site_name')); ?> Admin">
  <meta name="author" content="Viaviwebtech">
  <link rel="shortcut icon" href="<?php echo e(URL::asset('upload/source/'.getcong('site_favicon'))); ?>">
  <title><?php echo e(getcong('site_name')); ?> Admin</title>

  <!-- App css -->
  <?php if(getcong('external_css_js')=="CDN"): ?>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(URL::asset('admin_assets/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(URL::asset('admin_assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo e(URL::asset('admin_assets/js/modernizr.min.js')); ?>"></script>
  <?php else: ?>
  <link href="<?php echo e(URL::asset('admin_assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(URL::asset('admin_assets/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(URL::asset('admin_assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo e(URL::asset('admin_assets/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
  <script src="<?php echo e(URL::asset('admin_assets/js/modernizr.min.js')); ?>"></script>
  <?php endif; ?>
  
</head>

<body>
  <div class="account-pages"></div>
  <div class="clearfix"></div>
  <div class="wrapper-page">
    <div class="text-center">
       
      <?php if(getcong('site_logo')): ?>
        <a class="navbar-brand" href="<?php echo e(URL::to('/')); ?>" target="_blank"> <img src="<?php echo e(URL::asset('upload/source/'.getcong('site_logo'))); ?>" alt="Site Logo"> </a> 
      <?php else: ?>
        <a class="navbar-brand" href="<?php echo e(URL::to('/')); ?>" target="_blank"> <img src="<?php echo e(URL::asset('site_assets/images/template/logo.png')); ?>" alt="Site Logo"> </a>          
      <?php endif; ?>
     
    </div>
    <div class="m-t-20 card-box">
      <div class="text-center">
        <h3 class="text-uppercase font-bold m-b-0"><?php echo e(trans('words.sign_in')); ?></h3>
 
        <div class="message">                                                 
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>                
        </div>

      </div>
      <div class="p-10">
         <?php echo Form::open(array('url' => 'admin/login','class'=>'form-horizontal m-t-20','id'=>'loginform','role'=>'form')); ?>    
          <div class="form-group">
            <div class="col-xs-12">
              <input name="email" class="form-control" type="text" required placeholder="<?php echo e(trans('words.email')); ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <input name="password" class="form-control" type="password" required placeholder="<?php echo e(trans('words.password')); ?>">
            </div>
          </div>
          <div class="form-group ">
            <div class="col-xs-12">
              <div class="checkbox checkbox-custom">
                <input id="checkbox-signup" type="checkbox">
                <label for="checkbox-signup"> <?php echo e(trans('words.remember_me')); ?> </label>
              </div>
            </div>
          </div>
          <div class="form-group text-center m-t-10">
            <div class="col-xs-12">
              <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit"><?php echo e(trans('words.login_text')); ?></button>
            </div>
          </div>
          <div class="form-group m-t-20 m-b-0 text-center">
            <div class="col-sm-12"> <a href="<?php echo e(URL::to('password/email')); ?>" class="text-muted"><i class="fa fa-lock m-r-5"></i>
                <?php echo e(trans('words.forgot_pass_text')); ?></a> </div>
          </div>
           
        <?php echo Form::close(); ?> 
      </div>
    </div>
  </div>

  <?php if(getcong('external_css_js')=="CDN"): ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="<?php echo e(URL::asset('admin_assets/js/popper.min.js')); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script> 

  <?php else: ?>  
  <script src="<?php echo e(URL::asset('admin_assets/js/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('admin_assets/js/popper.min.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('admin_assets/js/bootstrap.min.js')); ?>"></script>  
  <?php endif; ?>
     
  

  <!-- App js -->
  <script src="<?php echo e(URL::asset('admin_assets/js/jquery.core.js')); ?>"></script>
  <script src="<?php echo e(URL::asset('admin_assets/js/jquery.app.js')); ?>"></script>
</body>

</html><?php /**PATH G:\xampp\htdocs\laravel6_video_script_final\resources\views/admin/index.blade.php ENDPATH**/ ?>