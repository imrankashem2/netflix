

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
                          <a href="<?php echo e(URL::to('admin/live_tv')); ?>"><h4 class="header-title m-t-0 m-b-30 text-primary pull-left" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> <?php echo e(trans('words.back')); ?></h4></a>
                     </div>
                     <?php if(isset($tv_info->id)): ?>
                     <div class="col-sm-6">
                        <a href="<?php echo e(URL::to('live-tv/'.$tv_info->channel_slug.'/'.$tv_info->id)); ?>" target="_blank"><h4 class="header-title m-t-0 m-b-30 text-primary pull-right" style="font-size: 20px;"><?php echo e(trans('words.preview')); ?> <i class="fa fa-eye"></i></h4> </a>
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
                

                 <?php echo Form::open(array('url' => array('admin/live_tv/add_edit_live_tv'),'class'=>'form-horizontal','name'=>'video_form','id'=>'video_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                  
                  <input type="hidden" name="id" value="<?php echo e(isset($tv_info->id) ? $tv_info->id : null); ?>">

                  <div class="row">

                  <div class="col-md-6">
                    <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.live_tv_info')); ?></h4> 

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.live_tv_access')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="channel_access">                               
                                <option value="Paid" <?php if(isset($tv_info->channel_access) AND $tv_info->channel_access=='Paid'): ?> selected <?php endif; ?>>Paid</option>
                                <option value="Free" <?php if(isset($tv_info->channel_access) AND $tv_info->channel_access=='Free'): ?> selected <?php endif; ?>>Free</option>                            
                            </select>
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.live_tv_category')); ?>*</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="tv_category">
                                <option value=""><?php echo e(trans('words.select_category')); ?></option>
                                <?php $__currentLoopData = $cat_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($cat_data->id); ?>" <?php if(isset($tv_info->id) && $cat_data->id==$tv_info->channel_cat_id): ?> selected <?php endif; ?>><?php echo e($cat_data->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                      </div>
                  </div> 
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.live_tv_name')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="channel_name" value="<?php echo e(isset($tv_info->channel_name) ? stripslashes($tv_info->channel_name) : null); ?>" class="form-control">
                    </div>
                  </div>                  
                  <div class="form-group row">
                    <label for="webSite" class="col-sm-12 col-form-label"><?php echo e(trans('words.description')); ?></label>
                    <div class="col-sm-12">
                      <div class="card-box">
            
                      <textarea id="elm1" name="channel_description"><?php echo e(isset($tv_info->channel_description) ? stripslashes($tv_info->channel_description) : null); ?></textarea>
                     
                    </div>
                    </div>
                  </div>                   
                   
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.status')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" <?php if(isset($tv_info->status) AND $tv_info->status==1): ?> selected <?php endif; ?>><?php echo e(trans('words.active')); ?></option>
                                <option value="0" <?php if(isset($tv_info->status) AND $tv_info->status==0): ?> selected <?php endif; ?>><?php echo e(trans('words.inactive')); ?></option>                            
                            </select>
                      </div>
                  </div>

                </div>
                <div class="col-md-6">
                    <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.live_tv_thumb_url')); ?></h4>
                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.live_tv_stream_type')); ?> </label>
                      <div class="col-sm-8">
                            <select class="form-control" name="channel_url_type" id="channel_url_type">                               
                                <option value="hls" <?php if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type=="hls"): ?> selected <?php endif; ?>>HLS/M3U8/HTTP</option>
                                <option value="embed" <?php if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type=="embed"): ?> selected <?php endif; ?>>Embed Code</option>
                                <option value="youtube" <?php if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type=="youtube"): ?> selected <?php endif; ?>>Youtube</option> 
                                                             
                            </select>
                      </div>
                  </div>
                  
                   

                  <div class="form-group row" id="live_url_id" <?php if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type=="embed"): ?> style="display:none;" <?php endif; ?>>
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.live_tv_url')); ?>*</label>
                     <div class="col-sm-8">
                      <input type="text" name="channel_url" value="<?php echo e(isset($tv_info->channel_url) ? $tv_info->channel_url : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row" id="live_embed_id" <?php if(!isset($tv_info->channel_url_type)): ?> style="display:none;" <?php endif; ?> <?php if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type!="embed"): ?> style="display:none;" <?php endif; ?>>
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.live_tv_url')); ?>*</label>
                     <div class="col-sm-8">
                      <textarea class="form-control" name="channel_url_embed"><?php echo e(isset($tv_info->channel_url) ? $tv_info->channel_url : null); ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">&nbsp;</label>
                      <div class="col-sm-8">                         
                        <p id="hls_stream_id" <?php if(!isset($tv_info->channel_url_type)): ?> style="display:block;" <?php endif; ?> <?php if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type!="hls"): ?> style="display:none;" <?php endif; ?>><small id="emailHelp" class="form-text text-muted">Supported M3U8 URL </small></p>
                        <p id="embed_stream_id" <?php if(!isset($tv_info->channel_url_type)): ?> style="display:none;" <?php endif; ?> <?php if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type!="embed"): ?> style="display:none;" <?php endif; ?>><small id="emailHelp" class="form-text text-muted">Supported Embeded URL <br>Recommended: iframe width="100%" and height="100%" </small></p>
                        <p id="youtube_stream_id" <?php if(!isset($tv_info->channel_url_type)): ?> style="display:none;" <?php endif; ?> <?php if(isset($tv_info->channel_url_type) AND $tv_info->channel_url_type!="youtube"): ?> style="display:none;" <?php endif; ?>><small id="emailHelp" class="form-text text-muted">Supported Youtube Regular URL </small></p>
                      </div>  
                  </div>

                 
 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.live_tv_logo')); ?>* <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.recommended_resolution')); ?> : 650x350)</small></label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="channel_thumb" id="channel_thumb" value="<?php echo e(isset($tv_info->channel_thumb) ? $tv_info->channel_thumb : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_channel_thumb">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>

                  <?php if(isset($tv_info->channel_thumb)): ?> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="<?php echo e(URL::to('upload/source/'.$tv_info->channel_thumb)); ?>" alt="video image" class="img-thumbnail" width="250">                        
                       
                    </div>
                  </div>
                  <?php endif; ?>
                   

                   <hr/>
                  <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.seo')); ?></h4>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.seo_title')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="seo_title" id="seo_title" value="<?php echo e(isset($tv_info->seo_title) ? stripslashes($tv_info->seo_title) : old('seo_title')); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.seo_desc')); ?></label>
                    <div class="col-sm-8">                       
                      <textarea name="seo_description" id="seo_description" class="form-control"><?php echo e(isset($tv_info->seo_description) ? stripslashes($tv_info->seo_description) : old('seo_description')); ?></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.seo_keyword')); ?></label>
                    <div class="col-sm-8">                      
                      <textarea name="seo_keyword" id="seo_keyword" class="form-control"><?php echo e(isset($tv_info->seo_keyword) ? stripslashes($tv_info->seo_keyword) : old('seo_keyword')); ?></textarea>
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

 

<!--  Movie Poster -->
<div id="model_channel_thumb" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&sort_by=date&field_id=channel_thumb&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/addeditlivetv.blade.php ENDPATH**/ ?>