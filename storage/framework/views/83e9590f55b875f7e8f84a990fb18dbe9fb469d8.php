<?php $__env->startSection('head_title', $genres_info->genre_name.' '.trans('words.movies_text').' | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>


<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
      <li><a href="<?php echo e(URL::to('/')); ?>"><?php echo e(trans('words.home')); ?></a></li>
      <li><?php echo e(trans('words.popular_in')); ?> <?php echo e($genres_info->genre_name); ?></li>
      </ul>  
    </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="row">
	<div class="custom_select_filter">
	  <div class="custom-select">
		<select id="filter_list" class="selectpicker show-tick form-control is-invalid form-control-lg" required>
		  <option value="?filter=new" <?php if(isset($_GET['filter']) && $_GET['filter']=='new' ): ?> selected <?php endif; ?>><?php echo e(trans('words.newest')); ?></option>
		  <option value="?filter=old" <?php if(isset($_GET['filter']) && $_GET['filter']=='old' ): ?> selected <?php endif; ?>><?php echo e(trans('words.oldest')); ?></option>
		  <option value="?filter=alpha" <?php if(isset($_GET['filter']) && $_GET['filter']=='alpha' ): ?> selected <?php endif; ?>><?php echo e(trans('words.a_to_z')); ?></option>
		  <option value="?filter=rand" <?php if(isset($_GET['filter']) && $_GET['filter']=='rand' ): ?> selected <?php endif; ?>><?php echo e(trans('words.random')); ?></option>
		</select> 
	  </div>      
	</div>
  </div>      
</div>

<?php if(get_ads('movie_list_ad_top')->status!=0): ?>
        <div class="add_banner_section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php echo get_ads('movie_list_ad_top')->ad_code; ?>

              </div>
            </div>
          </div>  
        </div>
        <?php endif; ?>

 <div class="main-wrap">
  <div class="section section-padding tv_show vfx_video_list_section text-white">
    <div class="container">
      <div class="row">

         

        <div class="show-listing vfx_movie_list_item">
      
      <?php $__currentLoopData = $movies_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movies_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      
      <?php if(Auth::check()): ?>              
          <a class="icon" href="<?php echo e(URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->id)); ?>">
      <?php else: ?>
         <?php if($movies_data->video_access=='Paid'): ?>
          <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
         <?php else: ?>
          <a class="icon" href="<?php echo e(URL::to('movies/'.$movies_data->video_slug.'/'.$movies_data->id)); ?>">
         <?php endif; ?>  
      <?php endif; ?>  
      <div class="col-md-2 col-sm-4 col-xs-6">
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.$movies_data->video_image_thumb)); ?>" alt="<?php echo e($movies_data->video_title); ?>"> <?php if($movies_data->video_access=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>
                <div class="thumb-hover">          
          <i class="icon fa fa-play"></i><span class="ripple"></span>
          
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit($movies_data->video_title,12)); ?></h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> <?php echo e($movies_data->duration); ?></p>
               </div>
            </div>
      </div> 
      </a> 

     
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      
       
              <?php echo $__env->make('_particles.pagination', ['paginator' => $movies_list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>             
          
       

        </div>    
      </div>
    </div>
  </div>
</div>
  
      <?php if(get_ads('movie_list_ad_bottom')->status!=0): ?>
        <div class="add_banner_section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php echo get_ads('movie_list_ad_bottom')->ad_code; ?>

              </div>
            </div>
          </div>  
        </div>
        <?php endif; ?> 
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/movies_by_genres.blade.php ENDPATH**/ ?>