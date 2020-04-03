

<?php $__env->startSection("content"); ?>

<style type="text/css">
  .iframe-container {
  overflow: hidden;
  padding-top: 56.25% !important;
  position: relative;
}
 
.iframe-container iframe {
   border: 0;
   height: 100%;
   left: 0;
   position: absolute;
   top: 0;
   width: 100%;
}
</style>
 
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
                

                 <?php echo Form::open(array('url' => array('admin/android_settings'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                  
                  <input type="hidden" name="id" value="<?php echo e(isset($settings->id) ? $settings->id : null); ?>">  
                
                <div class="row">

                 <div class="col-md-6"> 

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.android_app_settings')); ?></h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_app_name')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="app_name" value="<?php echo e(isset($settings->app_name) ? $settings->app_name : null); ?>" class="form-control">
                    </div>
                  </div>
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_app_logo')); ?>*</label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="app_logo" id="app_logo" value="<?php echo e(isset($settings->app_logo) ? $settings->app_logo : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_poster">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>                 

                  <?php if(isset($settings->app_logo)): ?> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="<?php echo e(URL::to('upload/source/'.$settings->app_logo)); ?>" alt="video image" class="img-thumbnail" width="250">                        
                       
                    </div>
                  </div>
                  <?php endif; ?>
 
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_app_email')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="app_email" value="<?php echo e(isset($settings->app_email) ? $settings->app_email : null); ?>" class="form-control">
                    </div>
                  </div>                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_app_company')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="app_company" value="<?php echo e(isset($settings->app_company) ? $settings->app_company : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_app_website')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="app_website" value="<?php echo e(isset($settings->app_website) ? $settings->app_website : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_app_contact')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="app_contact" value="<?php echo e(isset($settings->app_contact) ? $settings->app_contact : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_app_version')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="app_version" value="<?php echo e(isset($settings->app_version) ? $settings->app_version : null); ?>" class="form-control">
                    </div>
                  </div>

                  <hr>                  
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label"><?php echo e(trans('words.about_us')); ?></label>
                    <div class="col-sm-12">
                      <div class="card-box">
                      <textarea id="elm1" name="app_about"><?php echo e(isset($settings->app_about) ? stripslashes($settings->app_about) : null); ?></textarea>
                    </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-12 col-form-label"><?php echo e(trans('words.privacy_policy')); ?></label>
                    <div class="col-sm-12">
                      <div class="card-box">
                      <textarea id="elm1" name="app_privacy"><?php echo e(isset($settings->app_privacy) ? stripslashes($settings->app_privacy) : null); ?></textarea>
                    </div>
                    </div>
                  </div> 

                </div>
                <div class="col-md-6">

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.android_oneSignal_settings')); ?></h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_oneSignal_app_id')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="onesignal_app_id" value="<?php echo e(isset($settings->onesignal_app_id) ? $settings->onesignal_app_id : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_oneSignal_rest_key')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="onesignal_rest_key" value="<?php echo e(isset($settings->onesignal_rest_key) ? $settings->onesignal_rest_key : null); ?>" class="form-control">
                    </div>
                  </div>
                  <hr/>
                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.android_admob_settings')); ?></h4>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_publisher_id')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="publisher_id" value="<?php echo e(isset($settings->publisher_id) ? $settings->publisher_id : null); ?>" class="form-control">
                    </div>
                  </div>

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 18px;"><?php echo e(trans('words.android_banner_ads')); ?></h4>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_banner_ad')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="banner_ad">                               
                                <option value="true" <?php if(isset($settings->banner_ad) AND $settings->banner_ad=='true'): ?> selected <?php endif; ?>>True</option>
                                <option value="false" <?php if(isset($settings->banner_ad) AND $settings->banner_ad=='false'): ?> selected <?php endif; ?>>False</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_banner_id')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="banner_ad_id" value="<?php echo e(isset($settings->banner_ad_id) ? $settings->banner_ad_id : null); ?>" class="form-control">
                    </div>
                  </div>

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 18px;"><?php echo e(trans('words.android_interstitial_ads')); ?></h4>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_interstitial')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="interstital_ad">                               
                                <option value="true" <?php if(isset($settings->interstital_ad) AND $settings->interstital_ad=='true'): ?> selected <?php endif; ?>>True</option>
                                <option value="false" <?php if(isset($settings->interstital_ad) AND $settings->interstital_ad=='false'): ?> selected <?php endif; ?>>False</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_interstitial_id')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="interstital_ad_id" value="<?php echo e(isset($settings->interstital_ad_id) ? $settings->interstital_ad_id : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_interstitial_clicks')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="interstital_ad_click" value="<?php echo e(isset($settings->interstital_ad_click) ? $settings->interstital_ad_click : null); ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="offset-sm-8 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> <?php echo e(trans('words.save_settings')); ?> </button>                      
                    </div>
                   </div>

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
 
<!--  Logo -->
<div id="model_poster" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&field_id=app_logo&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/android_settings.blade.php ENDPATH**/ ?>