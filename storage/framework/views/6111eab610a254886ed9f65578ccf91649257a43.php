<?php $__env->startSection('head_title', trans('words.payment_method').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="<?php echo e(URL::to('dashboard')); ?>"><?php echo e(trans('words.login_text')); ?></a></li>
         <li><?php echo e(trans('words.payment_method')); ?></li>      
      </ul>  
    </div>
  </div>
  </div>
</div>

<div class="main-wrap">
  <div class="section section-padding">
    <div class="container">
        <div class="membership_plan_block">
            <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12 membership_plan_dtl">
          <h5><?php echo e(trans('words.payment_method')); ?></h5>
          <p><?php echo e(trans('words.you_have_selected')); ?> <b><?php echo e($plan_info->plan_name); ?></b></p>
          <p><?php echo e(trans('words.you_are_logged')); ?> <b><?php echo e(Auth::User()->email); ?></b> <?php echo e(trans('words.if_you_would_like')); ?><br><?php echo e(trans('words.different_account_subscription')); ?>, <a href="<?php echo e(URL::to('logout')); ?>"><?php echo e(trans('words.logout')); ?></a> <?php echo e(trans('words.now')); ?>.</p>        
          <a href="<?php echo e(URL::to('membership_plan')); ?>" class="btn btn-primary" onclick=""><?php echo e(trans('words.change_plan')); ?></a>
        </div>  
        
        <?php if(getcong('paypal_payment_on_off')==1): ?>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="member-ship-option select_plan">
            <span><img src="<?php echo e(URL::asset('site_assets/images/icons/ic_paypal.png')); ?>" alt="ic_premium" /></span>  
            <p><?php echo e(trans('words.pay_with_paypal')); ?></p>
            <form class="" method="POST" id="payment-form" role="form" action="<?php echo URL::route('addmoney.paypal'); ?>" >
            <?php echo e(csrf_field()); ?>

            <input id="plan_id" type="hidden" class="form-control" name="plan_id" value="<?php echo e($plan_info->id); ?>">
            <input id="amount" type="hidden" class="form-control" name="amount" value="<?php echo e($plan_info->plan_price); ?>">
            <input id="plan_name" type="hidden" class="form-control" name="plan_name" value="<?php echo e($plan_info->plan_name); ?>">
            <button type="submit" class="pure-button btn btn-primary"><?php echo e(trans('words.pay_now')); ?></button>
            </form>
           </div>
        </div>
        <?php endif; ?>

        <?php if(getcong('stripe_payment_on_off')==1): ?>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="member-ship-option select_plan">
            <span><img src="<?php echo e(URL::asset('site_assets/images/icons/ic_stripe.png')); ?>" alt="ic_stripe" /></span> 
            <p><?php echo e(trans('words.pay_with_stripe')); ?></p>
            <a href="<?php echo e(URL::to('stripe/'.$plan_info->id)); ?>"><?php echo e(trans('words.pay_now')); ?></a>
          </div>
        </div>
        <?php endif; ?>

        <?php if(getcong('razorpay_payment_on_off')==1): ?>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="member-ship-option select_plan">
            <span><img src="<?php echo e(URL::asset('site_assets/images/icons/razorpay.png')); ?>" alt="ic_stripe" /></span> 
            <p><?php echo e(trans('words.pay_with_razorpay')); ?></p>
            <a href="<?php echo e(URL::to('razorpay/')); ?>"><?php echo e(trans('words.pay_now')); ?></a>
          </div>
        </div>
        <?php endif; ?>
      </div>        
        </div>                      
    </div>
  </div>
</div>
 

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/payment_method.blade.php ENDPATH**/ ?>