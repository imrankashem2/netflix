

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
                      <a href="<?php echo e(URL::to('admin/series')); ?>"><h4 class="header-title m-t-0 m-b-30 text-primary pull-left" style="font-size: 20px;"><i class="fa fa-arrow-left"></i> <?php echo e(trans('words.back')); ?></h4></a>
                 </div>
                 <?php if(isset($series_info->id)): ?>
                 <div class="col-sm-6">
                    <a href="<?php echo e(URL::to('series/'.$series_info->series_slug.'/'.$series_info->id)); ?>" target="_blank"><h4 class="header-title m-t-0 m-b-30 text-primary pull-right" style="font-size: 20px;"><?php echo e(trans('words.preview')); ?> <i class="fa fa-eye"></i></h4> </a>
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

                <?php if(!getcong('omdb_api_key')): ?>
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                          Please set OMDb API key <a href="<?php echo e(URL::to('admin/general_settings')); ?>#omdbapi_id" target="_blank">here</a>
                  </div>
                <?php endif; ?>
                
                <?php if(!isset($series_info->id)): ?>
                <div id="result" class="m-t-15"></div>
                
                 <input type="hidden" id="from" name="from" value="series">

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.import_from_imdb')); ?> <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.imdb_search_recommended')); ?>)</small></label>
                    <div class="col-sm-6">
                      <input type="text" name="imdb_id_title" id="imdb_id_title" value="" class="form-control" placeholder="Enter IMDb ID (e.g. tt1856010) or Title (e.g. House of Cards)" <?php if(!getcong('omdb_api_key')): ?> disabled <?php endif; ?>>
                    </div>
                     <div class="col-sm-2">
                      <button type="submit" id="import_show_btn" class="btn btn-primary waves-effect waves-light" <?php if(!getcong('omdb_api_key')): ?> disabled <?php endif; ?>> <?php echo e(trans('words.fetch')); ?> </button>                      
                    </div>
                    
                  </div>
                  
                 
                <hr/>
                <?php endif; ?>  

                 <?php echo Form::open(array('url' => array('admin/series/add_edit_series'),'class'=>'form-horizontal','name'=>'series_form','id'=>'series_form','role'=>'form','enctype' => 'multipart/form-data')); ?>  
                  
                  <input type="hidden" name="id" value="<?php echo e(isset($series_info->id) ? $series_info->id : null); ?>">

                  <input type="hidden" name="imdb_id" id="imdb_id" value="">
                  <input type="hidden" name="imdb_votes" id="imdb_votes" value="">
                  
                  <div class="row">

                    <div class="col-md-6"> 
                      <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.show_info')); ?></h4>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.language_text')); ?>*</label>
                      <div class="col-sm-8">
                            <select class="form-control select2" name="language" id="show_language">
                                <option value=""><?php echo e(trans('words.select_lang')); ?></option>
                                <?php $__currentLoopData = $language_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($language_data->id); ?>" <?php if(isset($series_info->id) && $language_data->id==$series_info->series_lang_id): ?> selected <?php endif; ?>><?php echo e($language_data->language_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                      </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.genres_text')); ?>*</label> 
                      <div class="col-sm-8">
                            <select name="series_genres[]" class="select2 select2-multiple" multiple="multiple" multiple id="show_genre_id" data-placeholder="<?php echo e(trans('words.select_genres')); ?>">
                                 <?php $__currentLoopData = $genre_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($genre_data->id); ?>" <?php if(isset($series_info->id) && in_array($genre_data->id, explode(",",$series_info->series_genres))): ?> selected <?php endif; ?>><?php echo e($genre_data->genre_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                      </div>
                  </div> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.show_name')); ?>*</label>
                    <div class="col-sm-8">
                      <input type="text" name="series_name" id="show_name" value="<?php echo e(isset($series_info->series_name) ? stripslashes($series_info->series_name) : null); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.show_sort_info')); ?></label>
                    <div class="col-sm-8">
                       <textarea name="series_info" id="show_info" class="form-control"><?php echo e(isset($series_info->series_info) ? stripslashes($series_info->series_info) : null); ?></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-sm-3"><?php echo e(trans('words.imdb_rating')); ?></label>
                    <div class="col-sm-8">
                      <div class="input-group"> 
                        <input type="text" id="imdb_rating" name="imdb_rating" value="<?php echo e(isset($series_info->imdb_rating) ? $series_info->imdb_rating : old('imdb_rating')); ?>" class="form-control" placeholder="">
                         
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.show_poster')); ?>* <small id="emailHelp" class="form-text text-muted">(<?php echo e(trans('words.recommended_resolution')); ?> : 1200x500)</small></label>
                    <div class="col-sm-8">
                      <div class="input-group">

                        <input type="text" name="series_poster" id="series_poster" value="<?php echo e(isset($series_info->series_poster) ? $series_info->series_poster : null); ?>" class="form-control" readonly>
                        <div class="input-group-append">                           
                          <button type="button" class="btn btn-dark waves-effect waves-light" data-toggle="modal" data-target="#model_poster">Select</button>
                      
                        </div>
                      </div>
                     
                    </div>
                  </div>

                  <?php if(isset($series_info->series_poster)): ?> 
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">&nbsp;</label>
                    <div class="col-sm-8">
                                                                         
                           <img src="<?php echo e(URL::to('upload/source/'.$series_info->series_poster)); ?>" alt="video image" class="img-thumbnail" width="250">                        
                       
                    </div>
                  </div>
                  <?php endif; ?>
                  
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.status')); ?></label>
                      <div class="col-sm-8">
                            <select class="form-control" name="status">                               
                                <option value="1" <?php if(isset($series_info->status) AND $series_info->status==1): ?> selected <?php endif; ?>><?php echo e(trans('words.active')); ?></option>
                                <option value="0" <?php if(isset($series_info->status) AND $series_info->status==0): ?> selected <?php endif; ?>><?php echo e(trans('words.inactive')); ?></option>                            
                            </select>
                      </div>
                  </div>

                  </div>
                  <div class="col-md-6"> 
                    <h4 class="m-t-0 m-b-30 header-title" style="font-size: 20px;"><?php echo e(trans('words.seo')); ?></h4>

                    <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.seo_title')); ?></label>
                    <div class="col-sm-8">
                      <input type="text" name="seo_title" id="seo_title" value="<?php echo e(isset($series_info->seo_title) ? stripslashes($series_info->seo_title) : old('seo_title')); ?>" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.seo_desc')); ?></label>
                    <div class="col-sm-8">                       
                      <textarea name="seo_description" id="seo_description" class="form-control"><?php echo e(isset($series_info->seo_description) ? stripslashes($series_info->seo_description) : old('seo_description')); ?></textarea>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?php echo e(trans('words.seo_keyword')); ?></label>
                    <div class="col-sm-8">                      
                      <textarea name="seo_keyword" id="seo_keyword" class="form-control"><?php echo e(isset($series_info->seo_keyword) ? stripslashes($series_info->seo_keyword) : old('seo_keyword')); ?></textarea>
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
 
<!--  Poster -->
<div id="model_poster" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg" style="max-width: 900px;">
        <div class="modal-content">             
            <div class="modal-body">
               <div class="iframe-container">
               <iframe src="<?php echo e(URL::to('responsive_filemanager/filemanager/dialog.php?type=2&sort_by=date&field_id=series_poster&relative_url=1')); ?>" frameborder="0"></iframe>
               </div>
            </div>
        </div> 
    </div> 
</div> 


<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/addeditseries.blade.php ENDPATH**/ ?>