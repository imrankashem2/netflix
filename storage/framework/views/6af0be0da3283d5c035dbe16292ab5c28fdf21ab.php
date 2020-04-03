<?php $__env->startSection('head_title', trans('words.dashboard_text').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('words.home')); ?></a></li>
         <li><?php echo e(trans('words.dashboard_text')); ?></li>     
      </ul>  
    </div>
    </div>
  </div>
</div>
<div class="main-wrap">
  <div class="section section-padding ">
 
    <div class="container">

       <?php if(Session::has('flash_message')): ?>
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <?php echo e(Session::get('flash_message')); ?>

              </div>
        <?php endif; ?>
        <?php if(Session::has('success')): ?>
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <?php echo e(Session::get('success')); ?>

              </div>
        <?php endif; ?>
        <?php if(Session::has('error_flash_message')): ?>
              <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                  <?php echo e(Session::get('error_flash_message')); ?>

              </div>
        <?php endif; ?>
        <div class="col-md-12 col-sm-12 col-xs-12 profile-sec-1 card-1">
            <div class="col-md-3 col-sm-4">
              <div class="img-profile">
                <?php if(Auth::User()->user_image): ?>
                  <img src="<?php echo e(URL::asset('upload/'.Auth::User()->user_image)); ?>" class="img-rounded" alt="profile_img">
                <?php else: ?>  
                  <img src="<?php echo e(URL::asset('site_assets/images/avatar.jpg')); ?>" class="img-rounded" alt="profile_img">
                <?php endif; ?>  
              </div>
        <div class="profile_title_item">
          <h5><?php echo e(Auth::User()->name); ?></h5>
          <p><?php echo e(Auth::User()->email); ?></p>
          <a href="<?php echo e(URL::to('profile')); ?>" class="pure-button btn btn-primary"><?php echo e(trans('words.edit')); ?></a> 
        </div>
            </div>                        
            <div class="col-md-9 col-sm-8">
              <div class="col-md-6 col-sm-6">
                <div class="member-ship-option">
                  <h5 class="color-up"><?php echo e(trans('words.my_subscription')); ?></h5>
                  <p class="premuim-memplan"><b><?php echo e(trans('words.current_plan')); ?>:</b> <?php echo e(\App\SubscriptionPlan::getSubscriptionPlanInfo($user->plan_id,'plan_name')); ?></p>
                  
                  <?php if($user->exp_date): ?><p><?php echo e(trans('words.subscription_expires_on')); ?> <b><?php echo e(date('F,  d, Y',$user->exp_date)); ?></b></p><?php endif; ?>
                  <div> 
                      <a href="<?php echo e(URL::to('membership_plan')); ?>" class="member-a" onclick=""><?php echo e(trans('words.upgrade_plan')); ?> </a>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="member-ship-option">
                  <h5 class="color-up"><?php echo e(trans('words.last_invoice')); ?></h5>
                  <p class="premuim-memplan"><b><?php echo e(trans('words.date')); ?>:</b> <span class="mem-span"><?php if($user->start_date): ?><?php echo e(date('F,  d, Y',$user->start_date)); ?><?php endif; ?></span></p>
                  <p class="premuim-memplan"><b><?php echo e(trans('words.plan')); ?>:</b> <span class="mem-span"><?php echo e(\App\SubscriptionPlan::getSubscriptionPlanInfo($user->plan_id,'plan_name')); ?></span></p>
                  <p class="premuim-memplan"><b><?php echo e(trans('words.amount')); ?>:</b> <span class="mem-span"><?php if($user->plan_amount): ?><?php echo e(number_format($user->plan_amount,2,'.', '')); ?><?php endif; ?></span></p>
                </div>
              </div>
            </div>
        </div>                      
    </div>
  </div>
</div>
  
 

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/dashboard.blade.php ENDPATH**/ ?>