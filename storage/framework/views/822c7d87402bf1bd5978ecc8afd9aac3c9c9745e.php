<?php $__env->startSection('head_title', trans('words.forgot_password').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 
<div class="vfx_account_wrap forgot_password_item">

   <?php echo Form::open(array('url' => 'password/email','class'=>'vfx_accountform loginform','id'=>'loginform','role'=>'form')); ?>     
    <h3><?php echo e(trans('words.forgot_password')); ?></h3>

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
         <p><input type="text" name="email" value="" placeholder="<?php echo e(trans('words.email')); ?>" ></p>
      </label>      
    </div>
       
  <div class="clearfix"></div>
      <button type="submit"><?php echo e(trans('words.reset_password')); ?></button>
   <?php echo Form::close(); ?> 
</div>
  
 

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/forgot_password.blade.php ENDPATH**/ ?>