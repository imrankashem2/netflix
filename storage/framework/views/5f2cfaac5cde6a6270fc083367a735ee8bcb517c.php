

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
                 
                <div class="row">
                     <div class="col-sm-6">
                          <a href="<?php echo e(URL::to('admin/sports')); ?>"><h4 class="header-title m-t-0 m-b-30 text-primary pull-left" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> <?php echo e(trans('words.back')); ?></h4></a>
                     </div>
                     <?php if(isset($video_info->id)): ?>
                     <div class="col-sm-6">
                        <a href="<?php echo e(URL::to('sports/'.$video_info->video_slug.'/'.$video_info->id)); ?>" target="_blank"><h4 class="header-title m-t-0 m-b-30 text-primary pull-right" style="font-size: 20px;"><?php echo e(trans('words.preview')); ?> <i class="fa fa-eye"></i></h4> </a>
                     </div>
                     <?php endif; ?>
                   </div>

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
                

                 <?php echo Form::open(array('url' => array('admin/sports/add_edit_video'),'class'=>'form-horizontal','name'=>'video_form','id'=>'video_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                  
                  <input type="hidden" name="id" value="<?php echo e(isset($video_info->id) ? $video_info->id : null); ?>">

                  <div class="row">

                  <div class="col-md-6">
                    <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.sport_info')); ?></h4> 

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.video_access')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="video_access">                               
                                <option value="Paid" <?php if(isset($video_info->video_access) AND $video_info->video_access=='Paid'): ?> selected <?php endif; ?>>Paid</option>
                                <option value="Free" <?php if(isset($video_info->video_access) AND $video_info->video_access=='Free'): ?> selected <?php endif; ?>>Free</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.sports_cat_text')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="video_category">
                                <option value=""><?php echo e(trans('words.select_category')); ?></option>
                                <?php $__currentLoopData = $cat_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($cat_data->id); ?>" <?php if(isset($video_info->id) && $cat_data->id==$video_info->sports_cat_id): ?> selected <?php endif; ?>><?php echo e($cat_data->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                      </div>
                  </div> 
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.video_title')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="video_title" value="<?php echo e(isset($video_info->video_title) ? stripslashes($video_info->video_title) : null); ?>" class="form-control">
                    </div>
                  </div>                  
                  <div class="form-group row">
                    <label for="webSite" class="col-sm-12 col-form-label"><?php echo e(trans('words.description')); ?></label>
                    <div class="col-sm-12">
                      <div class="card-box">
            
                      <textarea id="elm1" name="video_description"><?php echo e(isset($video_info->video_description) ? stripslashes($video_info->video_description) : null); ?></textarea>
                     
                    </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-sm-3"><?php echo e(trans('words.date')); ?></label>
                    <div class="col-sm-8">
                      <div class="input-group"> 
                        <input type="text" id="datepicker-autoclose" name="date" value="<?php echo e(isset($video_info->date) ? date('m/d/Y',$video_info->date) : null); ?>" class="form-control" placeholder="mm/dd/yyyy">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="ti-calendar"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.duration')); ?></label>
                    <div class="col-sm-8">
                      <div class="input-group">
                      <input type="text" name="duration" value="<?php echo e(isset($video_info->duration) ? $video_info->duration : null); ?>" class="form-control" placeholder="1h 35m 54s">
                      <div class="input-group-append">
                            <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                        </div>
                    </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.status')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" <?php if(isset($video_info->status) AND $video_info->status==1): ?> selected <?php endif; ?>><?php echo e(trans('words.active')); ?></option>
                                <option value="0" <?php if(isset($video_info->status) AND $video_info->status==0): ?> selected <?php endif; ?>><?php echo e(trans('words.inactive')); ?></option>                            
                            </select>
                      </div>
                  </div>

                </div>
                <div class="col-md-6">
                    <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.sport_poster_video')); ?></h4>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.video_upload_type')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="video_type" id="video_type">                               
                                <option value="Local" <?php if(isset($video_info->video_type) AND $video_info->video_type=="Local"): ?> selected <?php endif; ?>>Local</option>
                                <option value="URL" <?php if(isset($video_info->video_type) AND $video_info->video_type=="URL"): ?> selected <?php endif; ?>>URL</option>
                                <option value="Embed" <?php if(isset($video_info->video_type) AND $video_info->video_type=="Embed"): ?> selected <?php endif; ?>>Embed Code</option>                            
                            </select>
                      </div>
                  </div>
                  
                  <div class="form-group row" id="local_id" <?php if(isset($video_info->video_type) AND $video_info->video_type!="Local"): ?> style="display:none;" <?php endif; ?>>
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.video_file')); ?> <small id="emailHelp" class="form-text text-muted">(Supported : MP4 or MKV)</small></label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="video_url_local" id="video_url" value="<?php echo e(isset($video_info->video_url) ? $video_info->video_url : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_video_url">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>

                  <div class="form-group row" id="url_id" <?php if(isset($video_info->video_type) AND $video_info->video_type!="URL"): ?> style="display:none;" <?php endif; ?> <?php if(!isset($video_info->id)): ?> style="display:none;" <?php endif; ?>>
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.video_url')); ?> <small id="emailHelp" class="form-text text-muted">(Supported : MP4 or MKV)</small></label>
                     <div class="col-sm-8">
                      <input type="text" name="video_url" value="<?php echo e(isset($video_info->video_url) ? $video_info->video_url : null); ?>" class="form-control">
                    </div>
                  </div>

                  <div class="form-group row" id="embed_id" <?php if(isset($video_info->video_type) AND $video_info->video_type!="Embed"): ?> style="display:none;" <?php endif; ?> <?php if(!isset($video_info->id)): ?> style="display:none;" <?php endif; ?>>
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.video_embed_code')); ?></label>
                     <div class="col-sm-8">
                       <textarea class="form-control" name="video_embed_code"><?php echo e(isset($video_info->video_url) ? $video_info->video_url : null); ?></textarea>
                    </div>
                  </div>
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.video_poster')); ?> <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.recommended_resolution')); ?> : 650x350)</small></label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="video_image" id="video_image" value="<?php echo e(isset($video_info->video_image) ? $video_info->video_image : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_movie_poster">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>

                  <?php if(isset($video_info->video_image)): ?> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="<?php echo e(URL::to('upload/source/'.$video_info->video_image)); ?>" alt="video image" class="img-thumbnail" width="250">                        
                       
                    </div>
                  </div>
                  <?php endif; ?>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.download')); ?></label>
                    <div class="col-sm-8">
                      <div class="radio radio-success form-check-inline"  style="margin-top: 8px;">
                          <input type="radio" id="inlineRadio1" value="1" name="download_enable" <?php if(isset($video_info->download_enable) && $video_info->download_enable==1): ?> <?php echo e('checked'); ?> <?php endif; ?>>
                          <label for="inlineRadio1"> <?php echo e(trans('words.active')); ?> </label>
                      </div>
                      <div class="radio form-check-inline" style="margin-top: 8px;">
                          <input type="radio" id="inlineRadio2" value="0" name="download_enable" <?php if(isset($video_info->download_enable) && $video_info->download_enable==0): ?> <?php echo e('checked'); ?> <?php endif; ?> <?php echo e(isset($video_info->id) ? '' : 'checked'); ?>>
                          <label for="inlineRadio2"> <?php echo e(trans('words.inactive')); ?> </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.download_url')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="download_url" id="download_url" value="<?php echo e(isset($video_info->download_url) ? $video_info->download_url : old('download_url')); ?>" class="form-control">
                    </div>
                  </div>

                   <hr/>
                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.seo')); ?></h4>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.seo_title')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="seo_title" id="seo_title" value="<?php echo e(isset($video_info->seo_title) ? stripslashes($video_info->seo_title) : old('seo_title')); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.seo_desc')); ?></label>
                    <div class="col-sm-8">                       
                      <textarea name="seo_description" id="seo_description" class="form-control"><?php echo e(isset($video_info->seo_description) ? stripslashes($video_info->seo_description) : old('seo_description')); ?></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.seo_keyword')); ?></label>
                    <div class="col-sm-8">                      
                      <textarea name="seo_keyword" id="seo_keyword" class="form-control"><?php echo e(isset($video_info->seo_keyword) ? stripslashes($video_info->seo_keyword) : old('seo_keyword')); ?></textarea>
                      <small id="emailHelp" class="form-text text-muted"><?php echo e(trans('words.seo_keyword_note')); ?></small>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="offset-sm-9 col-sm-9">
                      <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> <?php echo e(trans('words.save')); ?> </button>                      
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


<!--  Movie Video file -->
<div id="model_video_url" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&field_id=video_url&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div> 

<!--  Movie Poster -->
<div id="model_movie_poster" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&sort_by=date&field_id=video_image&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/addeditsportsvideo.blade.php ENDPATH**/ ?>