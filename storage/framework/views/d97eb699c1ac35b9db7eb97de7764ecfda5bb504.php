  

<?php if($series_info->seo_title): ?>
  <?php $__env->startSection('head_title', stripslashes($series_info->seo_title).' | '.getcong('site_name')); ?>
<?php else: ?>
  <?php $__env->startSection('head_title', stripslashes($series_info->series_name).' | '.getcong('site_name')); ?>
<?php endif; ?>

<?php if($series_info->seo_description): ?>
  <?php $__env->startSection('head_description', stripslashes($series_info->seo_description)); ?>
<?php else: ?>
  <?php $__env->startSection('head_description', Str::limit(stripslashes($series_info->series_info),160)); ?>
<?php endif; ?>

<?php if($series_info->seo_keyword): ?>
  <?php $__env->startSection('head_keywords', stripslashes($series_info->seo_keyword)); ?> 
<?php endif; ?>


<?php $__env->startSection('head_image', URL::to('upload/source/'.$series_info->series_poster)); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 

 <div class="main-wrap">
  <div class="section section-padding vfx_video_single_section">
    <div class="container">
      <div class="series_episode">
		<div class="upcomming-featured">
		  <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.$series_info->series_poster)); ?>" alt="<?php echo e($series_info->series_name); ?>">
		  <div class="play-icon-item">
			<?php if($series_latest_episode): ?>
			  
			 <?php if(Auth::check()): ?>              
				  <a class="icon" href="<?php echo e(URL::to('series/'.$series_info->series_slug.'/'.$series_latest_episode->video_slug.'/'.$series_latest_episode->id)); ?>">
			  <?php else: ?>
				 <?php if($series_latest_episode->video_access=='Paid'): ?>
				  <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
				 <?php else: ?>
				  <a class="icon" href="<?php echo e(URL::to('series/'.$series_info->series_slug.'/'.$series_latest_episode->video_slug.'/'.$series_latest_episode->id)); ?>">
				 <?php endif; ?>  
			  <?php endif; ?>   
				
			  <i class="icon fa fa-play"></i><span class="ripple"></span>
			</a> 
			<?php else: ?>
			  <a class="icon" href="">
			  <i class="icon fa fa-play"></i><span class="ripple"></span>
			</a> 
			<?php endif; ?>
				 
		  </div>
		  <div class="upcomming-details">
			<div class="col-md-6">
			  <?php if($series_latest_episode): ?>
			  <h4 class="video-title">
				
				<?php if(Auth::check()): ?>              
				  <a href="<?php echo e(URL::to('series/'.$series_info->series_slug.'/'.$series_latest_episode->video_slug.'/'.$series_latest_episode->id)); ?>">
				<?php else: ?>
				 <?php if($series_latest_episode->video_access=='Paid'): ?>
				  <a href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
				 <?php else: ?>
				  <a href="<?php echo e(URL::to('series/'.$series_info->series_slug.'/'.$series_latest_episode->video_slug.'/'.$series_latest_episode->id)); ?>">
				 <?php endif; ?>  
			  <?php endif; ?>  

				  <?php echo e($series_info->series_name); ?></a></h4>

			  <?php else: ?>
			  <h4 class="video-title"><a href=""><?php echo e($series_info->series_name); ?></a></h4>
			  <?php endif; ?>
			  <ul class="channel_content_info">
				<li><?php echo e(\App\Series::getSeriesTotalSeason($series_info->id)); ?> Seasons</li>
				<li><?php echo e(\App\Series::getSeriesTotalEpisodes($series_info->id)); ?> Episodes</li>
				<li><a href="<?php echo e(URL::to('language/series/'.App\Language::getLanguageInfo($series_info->series_lang_id,'language_slug'))); ?>"><?php echo e(\App\Language::getLanguageInfo($series_info->series_lang_id,'language_name')); ?></a></li>
				<?php $__currentLoopData = explode(',',$series_info->series_genres); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genres_ids): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  <li><a href="<?php echo e(URL::to('genres/series/'.App\Genres::getGenresInfo($genres_ids,'genre_slug'))); ?>"><?php echo e(App\Genres::getGenresInfo($genres_ids,'genre_name')); ?></a></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				 <?php if($series_info->imdb_rating): ?> 
				 <li><img src="<?php echo e(URL::to('site_assets/images/icons/imdb-logo.png')); ?>" alt="IMDb Rating"> &nbsp;<b><?php echo e($series_info->imdb_rating); ?></b></li>
				 <?php endif; ?>

				</ul>
			  <span><?php echo e(Str::limit($series_info->series_info,180)); ?></span>
			</div>  
		  </div>
		</div>
	  </div>
    </div>
  </div>
	  <div class="clearfix"></div> 	
      <?php if(get_ads('shows_single_ad')->status!=0): ?>
        <div class="add_banner_section">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php echo get_ads('shows_single_ad')->ad_code; ?>

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
            <h2 class="vfx_section_title"><?php echo e(trans('words.seasons_text')); ?></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel" id="video-carousel">
          <?php $__currentLoopData = $season_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $season_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="<?php echo e(URL::to('series/'.$series_info->series_slug.'/seasons/'.$season_data->season_slug.'/'.$season_data->id)); ?>">
          <div class="vfx_video_item">
            <div class="thumb-wrap vfx_upcomming_item_block"> 
              <img src="<?php echo e(URL::to('upload/source/'.$season_data->season_poster)); ?>" alt="<?php echo e($season_data->season_name); ?>">                             
            </div>
            <div class="vfx_video_detail">
              <h4 class="vfx_video_title"><?php echo e(Str::limit($season_data->season_name,20)); ?></h4>
             </div>
          </div>
          </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
        </div>
      </div>
    </div>
  </div>   
</div>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/series_single.blade.php ENDPATH**/ ?>