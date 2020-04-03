<?php $__env->startSection('head_title', trans('words.login_text').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 
<div class="container">
  <div class="col-md-6">

    <div class="vfx_account_wrap">


      <?php echo Form::open(array('url' => 'login','class'=>'vfx_accountform loginform','id'=>'loginform','role'=>'form')); ?>       
      <h3><?php echo e(trans('words.login_text')); ?></h3>

      <div class="message">                                                 
            <?php if(Session::has('login_flash_error')): ?>
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
            <?php endif; ?>
            <?php if(Session::has('flash_message')): ?>
                      <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          <?php echo e(Session::get('flash_message')); ?>

                      </div>
            <?php endif; ?>
            <?php if(Session::has('error_flash_message')): ?>
                      <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          <?php echo e(Session::get('error_flash_message')); ?>

                      </div>
            <?php endif; ?>             
        </div>

      <div class="basic-field">
        <label>
         <p><input type="text" name="email" value="" placeholder="<?php echo e(trans('words.email')); ?>"></p>
        </label>
        <label>
        <p><input type="password" name="password" value="" placeholder="<?php echo e(trans('words.password')); ?>" ></p>
        </label>
      </div>
        <label class="vfx_stay_login">
        <input type="checkbox" name="remember"><?php echo e(trans('words.remember_me')); ?>

      </label>
      <label class="vfx_forgot_pass">
        <a href="<?php echo e(URL::to('password/email')); ?>"> <?php echo e(trans('words.forgot_password')); ?>?</a>
      </label>
      <div class="clearfix"></div>
        <button type="submit"><?php echo e(trans('words.login_text')); ?></button>
        <p class="signup-recover"><?php echo e(trans('words.dont_have_account')); ?> <a href="#goto_signup"><?php echo e(trans('words.sign_up')); ?></a></p>
      <?php echo Form::close(); ?> 
    </div>
  </div>
  
  <div class="col-md-6">
    <div class="vfx_account_wrap" id="goto_signup">
       
      <?php echo Form::open(array('url' => 'signup','class'=>'vfx_accountform signupform','id'=>'loginform','role'=>'form')); ?>

      <h3><?php echo e(trans('words.sign_up')); ?></h3>

      <div class="message">                                                 
            <?php if(Session::has('signup_flash_error')): ?>
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
            <?php endif; ?>                
        </div>

      <div class="basic-field">
        <label>
          <p><input type="text" name="name" placeholder="<?php echo e(trans('words.name')); ?>" ></p>
        </label>
        <label>    
        <label>
          <p><input type="email" name="email" placeholder="<?php echo e(trans('words.email')); ?>" ></p>
        </label>
        <label>
          <p><input type="password" name="password" placeholder="<?php echo e(trans('words.password')); ?>" ></p>
        </label>
        <label>
          <p><input type="password" name="password_confirmation" placeholder="<?php echo e(trans('words.confirm_password')); ?>" ></p>
        </label>                
      </div>
      <button type="submit"><?php echo e(trans('words.sign_up')); ?></button>
       
      <?php echo Form::close(); ?> 
    </div>
  </div>
</div> 
 

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/login.blade.php ENDPATH**/ ?>