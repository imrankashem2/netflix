

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
                <?php if(Session::has('flash_error_message')): ?>
                      <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          <?php echo e(Session::get('flash_error_message')); ?>

                      </div>
                <?php endif; ?>
                

                 <?php echo Form::open(array('url' => array('admin/android_notification'),'class'=>'form-horizontal','name'=>'settings_form','id'=>'settings_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                   
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.title')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="notification_title" value="" class="form-control">
                    </div>
                  </div>
  
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_notification_message')); ?>*</label>
                    <div class="col-sm-8">
                       
                      <textarea id="notification_msg" name="notification_msg" class="form-control"></textarea>
                     
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.image')); ?> <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.optional')); ?>)( <?php echo e(trans('words.recommended_resolution')); ?>: 600x293 or 650x317 or 700x342 or 750x366)</small></label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="notification_image" id="notification_image" value="" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_poster">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>                 

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 18px;"><?php echo e(trans('words.or')); ?></h4>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.post_type')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="notification_type" id="notification_type">    
                                <option value=""> <?php echo e(trans('words.select_type')); ?> </option>                            
                                <option value="Movies" selected><?php echo e(trans('words.movies_text')); ?></option>
                                <option value="Shows"><?php echo e(trans('words.tv_shows_text')); ?></option>
                                <option value="Sports"><?php echo e(trans('words.sports_text')); ?></option>
                                <option value="LiveTV"><?php echo e(trans('words.live_tv')); ?></option>
                                                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="movie_list_id">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.movies_text')); ?> <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.optional')); ?>)(<?php echo e(trans('words.notification_movie_msg')); ?>)</small></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="movie_id" id="movie_id">    
                                <option value=""> <?php echo e(trans('words.select_movie')); ?> </option>                            
                                <?php $__currentLoopData = $movies_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movies_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($movies_data->id); ?>"><?php echo e($movies_data->video_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="show_list_id" style="display: none;">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.tv_shows_text')); ?> <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.optional')); ?>)(<?php echo e(trans('words.notification_show_msg')); ?>)</small></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="series_id" id="series_id">    
                                <option value=""> <?php echo e(trans('words.select_show')); ?> </option>                            
                                <?php $__currentLoopData = $series_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($series_data->id); ?>"><?php echo e($series_data->series_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="sports_list_id" style="display: none;">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.sports_text')); ?> <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.optional')); ?>)(<?php echo e(trans('words.notification_sport_msg')); ?>)</small></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="sport_id" id="sport_id">    
                                <option value=""> <?php echo e(trans('words.select_sport')); ?> </option>                            
                                <?php $__currentLoopData = $sports_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sports_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sports_data->id); ?>"><?php echo e($sports_data->video_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="live_tv_list_id" style="display: none;">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.live_tv')); ?> <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.optional')); ?>)(<?php echo e(trans('words.notification_tv_msg')); ?>)</small></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="live_tv_id" id="live_tv_id">    
                                <option value=""> <?php echo e(trans('words.select_tv')); ?> </option>                            
                                <?php $__currentLoopData = $live_tv_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $live_tv_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($live_tv_data->id); ?>"><?php echo e($live_tv_data->channel_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                      </div>
                  </div>  

                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 18px;"><?php echo e(trans('words.or')); ?></h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.android_external_link')); ?> <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.optional')); ?>)</small></label>
                    <div class="col-sm-8">
                      <input type="text" name="external_link" value="" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> <?php echo e(trans('words.send')); ?> </button>                      
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
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&field_id=notification_image&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/android_notification.blade.php ENDPATH**/ ?>