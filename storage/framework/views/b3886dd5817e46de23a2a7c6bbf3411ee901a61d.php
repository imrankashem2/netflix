

<?php $__env->startSection("content"); ?>

 
 
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
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
                

                 <?php echo Form::open(array('url' => array('admin/email_settings'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                  
                  <input type="hidden" name="id" value="<?php echo e(isset($settings->id) ? $settings->id : null); ?>">
  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.host')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="smtp_host" value="<?php echo e(isset($settings->smtp_host) ? $settings->smtp_host : null); ?>" class="form-control" placeholder="mail.example.com">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.port')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="smtp_port" value="<?php echo e(isset($settings->smtp_port) ? $settings->smtp_port : null); ?>" class="form-control" placeholder="587">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.email')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="smtp_email" value="<?php echo e(isset($settings->smtp_email) ? $settings->smtp_email : null); ?>" class="form-control" placeholder="info@example.com">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.password')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="password" name="smtp_password" value="<?php echo e(isset($settings->smtp_password) ? $settings->smtp_password : null); ?>" class="form-control" placeholder="****">
                    </div>
                  </div>   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.encryption')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="smtp_encryption">                               
                                 
                                <option value="TLS" <?php if($settings->smtp_encryption=="TLS"): ?> selected <?php endif; ?>>TLS</option>
                                <option value="SSL" <?php if($settings->smtp_encryption=="SSL"): ?> selected <?php endif; ?>>SSL</option>
                                  
                            </select>
                      </div>
                  </div>  
                  
                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> <?php echo e(trans('words.save_settings')); ?> </button>                      
                    </div>
                  </div>
                <?php echo Form::close(); ?> 
              </div>
            </div>            
          </div>              
        </div>
      </div>
      <?php echo $__env->make("admin.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div> 
 
 


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/email_settings.blade.php ENDPATH**/ ?>