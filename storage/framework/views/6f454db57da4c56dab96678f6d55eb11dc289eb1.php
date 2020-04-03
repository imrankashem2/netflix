<?php $__env->startSection('head_title', trans('words.profile').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="<?php echo e(URL::to('dashboard')); ?>"><?php echo e(trans('words.dashboard_text')); ?></a></li>
         <li><?php echo e(trans('words.profile')); ?></li>     
      </ul>  
    </div>
    </div>
  </div>
</div>
<div class="main-wrap">
  <div class="section section-padding">
    <div class="container">
      <div class="row">            
        <div class="col-md-8 col-sm-8 col-xs-12 col-xs-push-2">
          <div class="color-bg card-1 edit_profile">

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

            <?php echo Form::open(array('url' => 'profile','class'=>'chnge-password pure-form pure-chng"','name'=>'profile_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
              <input name="" value="" type="hidden">
              <h5><?php echo e(trans('words.edit_profile')); ?></h5>
              <div class="message"> </div>
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label><?php echo e(trans('words.name')); ?></label>
                    <input name="name" class="name" value="<?php echo e($user->name); ?>" placeholder="Name" required type="text">
                  </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label><?php echo e(trans('words.email')); ?></label>
                    <input name="email" class="email" value="<?php echo e($user->email); ?>" placeholder="Email" required type="text">
                  </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label><?php echo e(trans('words.password')); ?></label>
                    <input name="password" class="password" value="" placeholder="Password" type="password">
                  </p>
                </div>                 
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label><?php echo e(trans('words.phone')); ?></label>
                    <input name="phone" class="phone" value="<?php echo e($user->phone); ?>" placeholder="Phone" type="text">
                  </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label><?php echo e(trans('words.address')); ?></label>
                    <textarea class="phone"  name="user_address" placeholder="Address"><?php echo e($user->user_address); ?></textarea> 
                  </p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <p class="color-blc-1">
                    <label><?php echo e(trans('words.profile_image')); ?></label>
                    <input name="user_image" class="paswrd-1 profile_user" type="file">
                  </p>
                </div>
              </div>              
              <div class="paste-mo bottom-border">
                <button type="submit" class="pure-button btn btn-primary"><?php echo e(trans('words.update')); ?></button>
              </div>
            <?php echo Form::close(); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/profile.blade.php ENDPATH**/ ?>