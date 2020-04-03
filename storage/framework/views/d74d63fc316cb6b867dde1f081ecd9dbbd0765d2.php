 

<?php if($season_info->seo_title): ?>
  <?php $__env->startSection('head_title', stripslashes($season_info->seo_title).' | '.getcong('site_name')); ?>
<?php else: ?>
  <?php $__env->startSection('head_title', $series_name.' '.stripslashes($season_info->season_name).' | '.getcong('site_name')); ?>
<?php endif; ?>

<?php if($season_info->seo_description): ?>
  <?php $__env->startSection('head_description', stripslashes($season_info->seo_description)); ?> 
<?php endif; ?>

<?php if($season_info->seo_keyword): ?>
  <?php $__env->startSection('head_keywords', stripslashes($season_info->seo_keyword)); ?> 
<?php endif; ?>


<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 
 <div class="main-wrap">
  
  <?php if(get_ads('shows_list_ad_top')->status!=0): ?>
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php echo get_ads('shows_list_ad_top')->ad_code; ?>

        </div>
      </div>
    </div>  
  </div>
  <?php endif; ?>
   
  <div class="section section-padding top-padding-normal vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('series/'.$series_slug.'/'.$season_info->series_id)); ?>"><?php echo e($series_name); ?></a> - <?php echo e($season_info->season_name); ?></h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="owl-carousel video-carousel" id="video-carousel">
          
          <?php $__currentLoopData = $episode_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
          <?php if(Auth::check()): ?>              
              <a href="<?php echo e(URL::to('series/'.$series_slug.'/'.$episode_data->video_slug.'/'.$episode_data->id)); ?>">
          <?php else: ?>
             <?php if($episode_data->video_access=='Paid'): ?>
              <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
             <?php else: ?>
              <a href="<?php echo e(URL::to('series/'.$series_slug.'/'.$episode_data->video_slug.'/'.$episode_data->id)); ?>">
             <?php endif; ?>  
          <?php endif; ?>  
          <div class="vfx_video_item">
            <div class="thumb-wrap vfx_upcomming_item_block"> 
              <img src="<?php echo e(URL::to('upload/source/'.$episode_data->video_image)); ?>" alt="<?php echo e($episode_data->video_title); ?>">
              <?php if($episode_data->video_access=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>                             
            </div>
            <div class="vfx_video_detail">
              <h4 class="vfx_video_title"><?php echo e(Str::limit($episode_data->video_title,15)); ?></h4>
             </div>
          </div>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
          
        </div>
      </div>
    </div>
  </div>
  
   
</div>
 
<?php if(get_ads('shows_list_ad_bottom')->status!=0): ?>
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php echo get_ads('shows_list_ad_bottom')->ad_code; ?>

        </div>
      </div>
    </div>  
  </div>
  <?php endif; ?>
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/season_episodes.blade.php ENDPATH**/ ?>