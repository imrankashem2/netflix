

<?php $__env->startSection("content"); ?>

  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-8">
              <div class="card-box">
                
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

                <?php echo Form::open(array('url' => 'admin/verify_purchase_app','class'=>'form-horizontal','name'=>'profile_form','id'=>'profile_form','role'=>'form','enctype' => 'multipart/form-data')); ?>

                  
                    
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Envato Username *</label>
                    <div class="col-sm-8">
                       <input type="text" name="buyer_name" value="<?php echo e(env('BUYER_NAME')); ?>" class="form-control">
                    </div>
                  </div>                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Buyer Purchase Code * <br/><small id="emailHelp" class="form-text text-muted">If you don't know <a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">click here</a></small></label>
                    <div class="col-sm-8">
                       <input type="text" name="purchase_code" value="<?php echo e(env('BUYER_PURCHASE_CODE')); ?>" class="form-control" value="">
                    </div>
                  </div>                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">App Package Name *</label>
                    <div class="col-sm-8">
                       <input type="text" name="app_package_name" value="<?php echo e(env('BUYER_APP_PACKAGE_NAME')); ?>" class="form-control">
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> <?php echo e(trans('words.save')); ?> </button>                      
                    </div>
                  </div>
                <?php echo Form::close(); ?> 

                <div class="alert alert-info">
                       
                        <b>Note:</b>  Use app purchase code only, not work with script purchase code.
                </div>

              </div>

              

            </div>
          </div>
        </div>
      </div>
      <?php echo $__env->make("admin.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/verify_purchase_app.blade.php ENDPATH**/ ?>