

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
                

                 <?php echo Form::open(array('url' => array('admin/slider/add_edit_slider'),'class'=>'form-horizontal','name'=>'slider_form','id'=>'slider_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                  
                  <input type="hidden" name="id" value="<?php echo e(isset($slider_info->id) ? $slider_info->id : null); ?>">
  
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.slider_title')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="slider_title" value="<?php echo e(isset($slider_info->slider_title) ? $slider_info->slider_title : null); ?>" class="form-control">
                    </div>
                  </div>

                    
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.slider_image')); ?>*
                      <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.recommended_resolution')); ?> : 1920x750)</small>
                    </label>                    
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="slider_image" id="slider_image" value="<?php echo e(isset($slider_info->slider_image) ? $slider_info->slider_image : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_poster">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>

                  <?php if(isset($slider_info->slider_image)): ?> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="<?php echo e(URL::to('upload/source/'.$slider_info->slider_image)); ?>" alt="video image" class="img-thumbnail" width="650">                        
                       
                    </div>
                  </div>
                  <?php endif; ?>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.post_type')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="slider_type" id="slider_type">    
                                <option value=""> <?php echo e(trans('words.select_type')); ?> </option>                            
                                <option value="Movies" <?php if(isset($slider_info->id) && $slider_info->slider_type=="Movies"): ?> selected <?php endif; ?>><?php echo e(trans('words.movies_text')); ?></option>
                                <option value="Shows" <?php if(isset($slider_info->id) && $slider_info->slider_type=="Shows"): ?> selected <?php endif; ?>><?php echo e(trans('words.tv_shows_text')); ?></option>
                                <option value="Sports" <?php if(isset($slider_info->id) && $slider_info->slider_type=="Sports"): ?> selected <?php endif; ?>><?php echo e(trans('words.sports_text')); ?></option>
                                <option value="LiveTV" <?php if(isset($slider_info->id) && $slider_info->slider_type=="LiveTV"): ?> selected <?php endif; ?>><?php echo e(trans('words.live_tv')); ?></option>
                                                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="movie_list_id" <?php if(isset($slider_info->id) && $slider_info->slider_type!="Movies"): ?> style="display: none;" <?php endif; ?> <?php if(!isset($slider_info->id)): ?> style="display: none;" <?php endif; ?>>
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.movies_text')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="movie_id" id="movie_id">    
                                <option value=""> <?php echo e(trans('words.select_movie')); ?> </option>                            
                                <?php $__currentLoopData = $movies_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movies_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($movies_data->id); ?>" <?php if(isset($slider_info->id) && $slider_info->slider_type=="Movies" && $slider_info->slider_post_id==$movies_data->id): ?> selected <?php endif; ?>><?php echo e($movies_data->video_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="show_list_id" <?php if(isset($slider_info->id) && $slider_info->slider_type!="Shows"): ?> style="display: none;" <?php endif; ?> <?php if(!isset($slider_info->id)): ?> style="display: none;" <?php endif; ?>>
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.tv_shows_text')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="series_id" id="series_id">    
                                <option value=""> <?php echo e(trans('words.select_show')); ?> </option>                            
                                <?php $__currentLoopData = $series_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $series_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($series_data->id); ?>" <?php if(isset($slider_info->id) && $slider_info->slider_type=="Shows" && $slider_info->slider_post_id==$series_data->id): ?> selected <?php endif; ?>><?php echo e($series_data->series_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="sports_list_id" <?php if(isset($slider_info->id) && $slider_info->slider_type!="Sports"): ?> style="display: none;" <?php endif; ?> <?php if(!isset($slider_info->id)): ?> style="display: none;" <?php endif; ?>>
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.sports_text')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="sport_id" id="sport_id">    
                                <option value=""> <?php echo e(trans('words.select_sport')); ?> </option>                            
                                <?php $__currentLoopData = $sports_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sports_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($sports_data->id); ?>" <?php if(isset($slider_info->id) && $slider_info->slider_type=="Sports" && $slider_info->slider_post_id==$sports_data->id): ?> selected <?php endif; ?>><?php echo e($sports_data->video_title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row" id="live_tv_list_id" <?php if(isset($slider_info->id) && $slider_info->slider_type!="LiveTV"): ?> style="display: none;" <?php endif; ?> <?php if(!isset($slider_info->id)): ?> style="display: none;" <?php endif; ?>>
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.live_tv')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="live_tv_id" id="live_tv_id">    
                                <option value=""> <?php echo e(trans('words.select_tv')); ?> </option>                            
                                <?php $__currentLoopData = $live_tv_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $live_tv_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($live_tv_data->id); ?>" <?php if(isset($slider_info->id) && $slider_info->slider_type=="LiveTV" && $slider_info->slider_post_id==$live_tv_data->id): ?> selected <?php endif; ?>><?php echo e($live_tv_data->channel_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                            
                            </select>
                      </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.status')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" <?php if(isset($slider_info->status) AND $slider_info->status==1): ?> selected <?php endif; ?>><?php echo e(trans('words.active')); ?></option>
                                <option value="0" <?php if(isset($slider_info->status) AND $slider_info->status==0): ?> selected <?php endif; ?>><?php echo e(trans('words.inactive')); ?></option>                            
                            </select>
                      </div>
                  </div>

                  <div class="form-group row">
                     
                  </div>

                  <div class="form-group">
                    <div class="offset-sm-3 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"> <?php echo e(trans('words.save')); ?> </button>                      
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
 
<!--  Poster -->
<div id="model_poster" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&sort_by=date&field_id=slider_image&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/addeditslider.blade.php ENDPATH**/ ?>