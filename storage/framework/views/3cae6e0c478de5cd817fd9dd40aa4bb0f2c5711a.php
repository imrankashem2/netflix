

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
                

                 <?php echo Form::open(array('url' => array('admin/general_settings'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                  
                  <input type="hidden" name="id" value="<?php echo e(isset($settings->id) ? $settings->id : null); ?>">
  
                   <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.default_timezone')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="time_zone">                               
                                <?php $__currentLoopData = generate_timezone_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tz_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php if($settings->time_zone==$key): ?> selected <?php endif; ?>><?php echo e($tz_data); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.default_language')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="default_language">                               
                                 
                                <option value="en" <?php if($settings->default_language=="en"): ?> selected <?php endif; ?>>English</option>
                                <option value="es" <?php if($settings->default_language=="es"): ?> selected <?php endif; ?>>Spanish</option>
                                <option value="fr" <?php if($settings->default_language=="fr"): ?> selected <?php endif; ?>>French</option>
                                <option value="pt" <?php if($settings->default_language=="pt"): ?> selected <?php endif; ?>>Portuguese</option>             
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.site_style')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="styling">                               
                                 
                                <option value="light" <?php if($settings->styling=="light"): ?> selected <?php endif; ?>>Light</option>
                                <option value="dark" <?php if($settings->styling=="dark"): ?> selected <?php endif; ?>>Dark</option>
                                  
                            </select>
                      </div>
                  </div>  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.site_name')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="site_name" value="<?php echo e(isset($settings->site_name) ? $settings->site_name : null); ?>" class="form-control">
                    </div>
                  </div>
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.site_logo')); ?>* <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.recommended_resolution')); ?> : 180x50)</small></label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="site_logo" id="site_logo" value="<?php echo e(isset($settings->site_logo) ? $settings->site_logo : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_poster">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>                 

                  <?php if(isset($settings->site_logo)): ?> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="<?php echo e(URL::to('upload/source/'.$settings->site_logo)); ?>" alt="video image" class="img-thumbnail" width="250">                        
                       
                    </div>
                  </div>
                  <?php endif; ?>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.site_favicon')); ?>*</label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="site_favicon" id="site_favicon" value="<?php echo e(isset($settings->site_favicon) ? $settings->site_favicon : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_favicon">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>

                  <?php if(isset($settings->site_favicon)): ?> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="<?php echo e(URL::to('upload/source/'.$settings->site_favicon)); ?>" alt="video image" class="img-thumbnail" width="32">                        
                       
                    </div>
                  </div>
                  <?php endif; ?>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.email')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="site_email" value="<?php echo e(isset($settings->site_email) ? $settings->site_email : null); ?>" class="form-control">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.description')); ?></label>
                    <div class="col-sm-8">
                      <textarea name="site_description" class="form-control"><?php echo e(isset($settings->site_description) ? stripslashes($settings->site_description) : null); ?></textarea>
                       
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.site_keywords')); ?></label>
                    <div class="col-sm-8">
                      <textarea name="site_keywords" class="form-control"><?php echo e(isset($settings->site_keywords) ? stripslashes($settings->site_keywords) : null); ?></textarea>
                       
                    </div>
                  </div>

                  <div class="form-group row">
                     
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Header Code</label>
                    <div class="col-sm-8">
                      <textarea name="site_header_code" class="form-control" placeholder="Custom CSS OR JS script"><?php echo e(isset($settings->site_header_code) ? stripslashes($settings->site_header_code) : null); ?></textarea>
                       
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Footer Code</label>
                    <div class="col-sm-8">
                      <textarea name="site_footer_code" class="form-control" placeholder="Custom CSS OR JS script"><?php echo e(isset($settings->site_footer_code) ? stripslashes($settings->site_footer_code) : null); ?></textarea>
                       
                    </div>
                  </div>
                  
                  <div class="form-group row" id="omdbapi_id">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.site_copyright_text')); ?></label>
                    <div class="col-sm-8">
                      <textarea name="site_copyright" class="form-control"><?php echo e(isset($settings->site_copyright) ? stripslashes($settings->site_copyright) : null); ?></textarea>                      
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">External Libraries From <br/><small id="emailHelp" class="form-text text-muted">LOCAL: Web related libraries call from server <br/> CDN: CDN for web related libraries to speed up your websites! </small></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="external_css_js">                               
                                 
                                <option value="LOCAL" <?php if($settings->external_css_js=="LOCAL"): ?> selected <?php endif; ?>>LOCAL</option>
                                <option value="CDN" <?php if($settings->external_css_js=="CDN"): ?> selected <?php endif; ?>>CDN (recommended)</option>
                                  
                            </select>
                      </div>
                  </div>

                  <br/>
                  <hr/>
                  <br/>                   
                  <h4 class="m-t-0 header-title" >OMDb API</h4>

                  <br/>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">API Key <br/><small id="emailHelp" class="form-text text-muted">If you don't know <a href="http://www.omdbapi.com/apikey.aspx" target="_blank">click here</a></small></label>
                    <div class="col-sm-8">
                      <input type="text" name="omdb_api_key" value="<?php echo e(isset($settings->omdb_api_key) ? $settings->omdb_api_key : null); ?>" class="form-control">
                    </div>
                  </div>
                  <hr/>
                  <br/>
                  <h4 class="m-t-0 header-title"><?php echo e(trans('words.footer_icon')); ?></h4>

                  <br/>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Facebook URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_fb_link" value="<?php echo e(isset($settings->footer_fb_link) ? stripslashes($settings->footer_fb_link) : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Twitter URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_twitter_link" value="<?php echo e(isset($settings->footer_twitter_link) ? stripslashes($settings->footer_twitter_link) : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Instagram URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_instagram_link" value="<?php echo e(isset($settings->footer_instagram_link) ? stripslashes($settings->footer_instagram_link) : null); ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Google Play URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_google_play_link" value="<?php echo e(isset($settings->footer_google_play_link) ? stripslashes($settings->footer_google_play_link) : null); ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Apple Store URL</label>
                    <div class="col-sm-8">
                      <input type="text" name="footer_apple_store_link" value="<?php echo e(isset($settings->footer_apple_store_link) ? stripslashes($settings->footer_apple_store_link) : null); ?>" class="form-control">
                    </div>
                  </div>
                  <br/>
                  <hr/>
                  <br/>
                  <h4 class="m-t-0 header-title"><?php echo e(trans('words.gdpr_cookie_consent')); ?></h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.gdpr_cookie_title')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="gdpr_cookie_title" value="<?php echo e(isset($settings->gdpr_cookie_title) ? stripslashes($settings->gdpr_cookie_title) : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.gdpr_cookie_text')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="gdpr_cookie_text" value="<?php echo e(isset($settings->gdpr_cookie_text) ? stripslashes($settings->gdpr_cookie_text) : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.gdpr_cookie_url')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="gdpr_cookie_url" value="<?php echo e(isset($settings->gdpr_cookie_url) ? stripslashes($settings->gdpr_cookie_url) : null); ?>" class="form-control">
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
 
<!--  Logo -->
<div id="model_poster" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&field_id=site_logo&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div>

<!--  Favicon -->
<div id="model_favicon" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&sort_by=date&field_id=site_favicon&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div>  


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/general_settings.blade.php ENDPATH**/ ?>