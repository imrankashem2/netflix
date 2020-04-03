<?php $__env->startSection('head_title', trans('words.subscription_plan').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="<?php echo e(URL::to('dashboard')); ?>"><?php echo e(trans('words.home')); ?></a></li>
         <li><?php echo e(trans('words.subscription_plan')); ?></li>      
      </ul>  
    </div>
  </div>
  </div>
</div>

<div class="main-wrap">
  <div class="section section-padding">
    <div class="container">
      <div class="row">
      
      <?php $__currentLoopData = $plan_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
      <div class="col-md-3 col-sm-4 col-xs-12">
      <div class="member-ship-option select_plan">
        <h5 class="color-up"><?php echo e($plan_data->plan_price); ?> <span><?php echo e(getcong('currency_code')); ?></span><p class="premuim-memplan">For <?php echo e(App\SubscriptionPlan::getPlanDuration($plan_data->id)); ?></p></h5>        
        <p><?php echo e($plan_data->plan_name); ?></p>
        <a href="<?php echo e(URL::to('payment_method/'.$plan_data->id)); ?>"><?php echo e(trans('words.select_plan')); ?></a>        
      </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
       
       
        </div>
    </div>
  </div>
</div>
 

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/membership_plan.blade.php ENDPATH**/ ?>