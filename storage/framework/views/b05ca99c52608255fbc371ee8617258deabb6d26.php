<?php $__env->startSection('head_title', trans('words.pay_with_stripe').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="<?php echo e(URL::to('dashboard')); ?>"><?php echo e(trans('words.dashboard_text')); ?></a></li>
         <li><?php echo e(trans('words.pay_with_stripe')); ?></li>     
      </ul>  
    </div>
    </div>
  </div>
</div>
<div class="main-wrap">
  <div class="section section-padding">
    <div class="select_plan_block">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12 col-xs-push-2">
        <div class="membership_plan_block">
          <div class="membership_plan_dtl">
            <h5><?php echo e(trans('words.pay_with_stripe')); ?></h5>       
          </div>

          <?php if($message = Session::get('error')): ?>
          <div class="custom-alerts alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
              <?php echo $message; ?>

          </div>
          <?php Session::forget('error');?>
          <?php endif; ?>
            
          <?php echo Form::open(array('url' => 'stripe','class'=>'','id'=>'payment-form','role'=>'form')); ?>

            <div class="row mr-top-40">
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label><?php echo e(trans('words.card_no')); ?>:</label>
                <input placeholder="xxxxxxxxxxxxxxx" name="card_no" value="<?php echo e(old('card_no')); ?>" class="form-control" type="text"> 
                <?php if($errors->has('card_no')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('card_no')); ?></strong>
                    </span>
                <?php endif; ?> 
              </div>
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label><?php echo e(trans('words.expiry_month')); ?>:</label>
                <input placeholder="09" name="ccExpiryMonth" value="<?php echo e(old('ccExpiryMonth')); ?>" class="form-control" type="text">  
              </div>
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label><?php echo e(trans('words.expiry_year')); ?>:</label>
                <input placeholder="2021" name="ccExpiryYear" value="<?php echo e(old('ccExpiryYear')); ?>" class="form-control" type="text">  
              </div>
              <div class="form-group col-md-6 col-sm-12 col-xs-12">
                <label><?php echo e(trans('words.cvc_number')); ?>:</label>
                <input placeholder="999" name="cvvNumber" value="<?php echo e(old('cvvNumber')); ?>" class="form-control" type="text">  
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary stripe_pay">
                  <?php echo e(trans('words.pay_now')); ?>

                </button> 
              </div>
              </div>
            <?php echo Form::close(); ?>

          </div>
        </div>      
      </div>
    </div>
  </div>
  </div>
</div> 
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/paywithstripe.blade.php ENDPATH**/ ?>