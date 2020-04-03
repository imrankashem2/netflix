 

<?php if($episode_info->seo_title): ?>
  <?php $__env->startSection('head_title', stripslashes($episode_info->seo_title).' | '.getcong('site_name')); ?>
<?php else: ?>
  <?php $__env->startSection('head_title', $series_name.' '.$season_name.' '.stripslashes($episode_info->video_title).' | '.getcong('site_name')); ?>
<?php endif; ?>

<?php if($episode_info->seo_description): ?>
  <?php $__env->startSection('head_description', stripslashes($episode_info->seo_description)); ?>
<?php else: ?>
  <?php $__env->startSection('head_description', Str::limit(stripslashes($episode_info->video_description),160)); ?>
<?php endif; ?>

<?php if($episode_info->seo_keyword): ?>
  <?php $__env->startSection('head_keywords', stripslashes($episode_info->seo_keyword)); ?> 
<?php endif; ?>

<?php $__env->startSection('head_image', URL::to('upload/source/'.$episode_info->video_image)); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 <link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/video_player/css/video-js.min.css')); ?>">
 <link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/video_player/css/videojs-tube.min.css')); ?>">
 <link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/video_player/css/watermark-logo.min.css')); ?>">
 <link rel="stylesheet" href="<?php echo e(URL::asset('site_assets/video_player/css/videojs-seek-buttons.css')); ?>">

 <style type="text/css">
  .video-js .vjs-seek-button.skip-back.skip-5::before {
    content: '\e05b';
    font-size: 22px;
}
.video-js .vjs-seek-button.skip-forward.skip-10::before {
    content: '\e056';
    font-size: 22px;
}

  .videoWrapper {
  position: relative;
  padding-bottom: 56.25%; /* 16:9 */
  padding-top: 25px;
  height: 0;
}
.videoWrapper iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
} 

 </style>
 
<div class="main-wrap">
  <div class="section section-padding vfx_video_single_section">
    <div class="container">
      <div class="video-single">
        <div class="row">
          <div class="col-xs-12">            
            <div class="content-wrap">              
				<div class="vfx_video_detail xs-top-40">
					<div class="row">                    
					<div class="single-section col-md-8 col-sm-12 col-xs-12">
					  <main>
						
						<?php if($episode_info->video_type=="Embed"): ?>
						   
						  <div class="videoWrapper"><?php echo $episode_info->video_url; ?></div>

						<?php elseif($episode_info->video_type=="URL"): ?>                   
						<div id="container">                   
							<video id="v_player" class="video-js vjs-big-play-centered skin-blue vjs-16-9" controls preload="none" width="640" height="450" poster="<?php echo e(URL::to('upload/source/'.$episode_info->video_image)); ?>" data-setup="{}">
							  <source src="<?php echo e($episode_info->video_url); ?>" type="video/mp4"/>  
														<!-- video source -->
												 
								<!-- worning text if needed -->
								<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
							</video>
						</div>  
						<?php else: ?>                 
						<div id="container">
						  <video id="v_player" class="video-js vjs-big-play-centered skin-blue vjs-16-9" controls preload="none" width="640" height="450" poster="<?php echo e(URL::to('upload/source/'.$episode_info->video_image)); ?>" data-setup="{}">
							<source src="<?php echo e(URL::to('upload/source/'.$episode_info->video_url)); ?>" type="video/mp4"/>
													  <!-- video source -->
												 
								<!-- worning text if needed -->
								<p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
							</video>
						</div>
						<?php endif; ?>
						
					  </main> 
					  <h3 class="vfx_video_title"><?php echo e($series_name); ?></h3>
					  <!--<p class="video-release-date"><i class="fa fa-calendar"></i> 12 Jan 2019</p>-->
					  <ul class="channel_content_info">
					  <li style="font-size: 16px;"><?php echo e($episode_info->video_title); ?></li>
					  <li style="font-size: 16px;"><?php echo e(App\Season::getSeasonInfo($episode_info->episode_season_id,'season_name')); ?></li>
					  <?php if($episode_info->release_date): ?>
						<li><i class="fa fa-calendar"></i> <?php echo e(isset($episode_info->release_date) ? date('M d Y',$episode_info->release_date) : null); ?></li>
						<?php endif; ?> 
					   <?php if($episode_info->duration): ?> 
					   <li><i class="fa fa-clock-o"></i> <?php echo e($episode_info->duration); ?></li>
					   <?php endif; ?>
						 <?php if($episode_info->imdb_rating): ?> 
						 <li><img src="<?php echo e(URL::to('site_assets/images/icons/imdb-logo.png')); ?>" alt="IMDb Rating"> &nbsp;<b><?php echo e($episode_info->imdb_rating); ?></b></li>
						 <?php endif; ?>

						 <?php if($episode_info->download_enable): ?>
						 <li>
							<div class="video_download_btn">
						   <a href="<?php echo e($episode_info->download_url); ?>" target="_blank"><i class="fa fa-download"></i> <?php echo e(trans('words.download')); ?></a> 
									  
						  </div>
						 </li>
						 <?php endif; ?>
					  </ul> 
					   
					  <div class="video-attributes dtl_video">
						
					   <div class="single-footer">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<div class="news-share">
										<label><?php echo e(trans('words.share_text')); ?>: </label>
										<div class="share-social">
											<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
											<a href="https://twitter.com/intent/tweet?text=<?php echo e($episode_info->video_title); ?>&amp;url=<?php echo e(url()->current()); ?>"><i class="fa fa-twitter"></i></a>
											<a href="http://pinterest.com/pin/create/button/?url=<?php echo e(url()->current()); ?>&media=<?php echo e(URL::to('upload/source/'.$episode_info->video_image)); ?>&description=<?php echo e($episode_info->video_title); ?>"><i class="fa fa-pinterest"></i></a>
											<a href="whatsapp://send?text=<?php echo e(url()->current()); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>

										</div>
									</div>
								</div>
								<div class="col-md-7 col-xs-12">
									<div class="news-tag">
										 <?php $__currentLoopData = explode(',',$series_genres_ids); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genres_ids): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<p><b><a href="<?php echo e(URL::to('genres/series/'.App\Genres::getGenresInfo($genres_ids,'genre_slug'))); ?>"><?php echo e(App\Genres::getGenresInfo($genres_ids,'genre_name')); ?></a></b></p>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<p><a href="<?php echo e(URL::to('language/series/'.App\Language::getLanguageInfo($series_lang_id,'language_slug'))); ?>"><b><?php echo e(App\Language::getLanguageInfo($series_lang_id,'language_name')); ?></b></a></p>
									</div>
								</div>
							</div>
						</div>  
					  </div> 
						
						<div class="clearfix"></div> 	
						<?php if(get_ads('episode_single_ad_top')->status!=0): ?>
						<div class="add_banner_section">               
						  <div class="row">
							<div class="col-md-12">
							  <?php echo get_ads('episode_single_ad_top')->ad_code; ?>

							</div>
						  </div>               
						</div>
						<?php endif; ?>

					  <div class="single-section video-entry mr-top-20" id="episodes_all">
						  <h3 class="single-vfx_section_title"><?php echo e(trans('words.description')); ?></h3>
						  <div class="section-content">	
							<?php if(strlen($episode_info->video_description) > 500): ?>
							<div class="listing-section">
							  <div class="show-more">
							  <div class="pricing-list-container">
								 <?php echo stripslashes($episode_info->video_description); ?>

							  </div>
							  </div>
							  <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a> 
							</div>
							<?php else: ?>
							<?php echo stripslashes($episode_info->video_description); ?> 	
							<?php endif; ?>    				
						  </div>
						</div>	
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">             
					  <div class="sidebar_playlist series_sidebar_list">
						<div class="caption">
						   <div class="left"> <a href="#"><i class="fa fa-arrow-down"></i> <?php echo e(trans('words.up_next')); ?></a> </div>               
						   <div class="right"> <a href="#episodes_all"><?php echo e(trans('words.view_all')); ?></a> </div>
						  <div class="clearfix"></div>
						</div>
						<?php $__currentLoopData = $episode_up_next_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $episode_up_next_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="playlist_item">
						  <a href="<?php echo e(URL::to('series/'.$series_slug.'/'.$episode_up_next_data->video_slug.'/'.$episode_up_next_data->id)); ?>">
							<div class="sidebar_movie_item">
								<img src="<?php echo e(URL::to('upload/source/'.$episode_up_next_data->video_image)); ?>" alt="show" />
							</div>	
							<div class="playlist_content">
							  <h3><?php echo e(Str::limit($episode_up_next_data->video_title,25)); ?></h3>
                <p class="vfx_video_length"><?php echo Str::limit(stripslashes(strip_tags($episode_up_next_data->video_description)),50); ?>

                </p>
							 </div>        
						  </a>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							   
					  </div>

            <?php if(get_ads('episode_single_ad_sidebar')->status!=0): ?>
            <div class="add_banner_section">               
              <div class="row">
                <div class="col-md-12">
                  <?php echo get_ads('episode_single_ad_sidebar')->ad_code; ?>

                </div>
              </div>               
            </div>
            <?php endif; ?>

					</div>
				  </div>                               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section section-padding top-padding-normal vfx_movie_section_block">

    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><?php echo e(trans('words.episodes_text')); ?></h2>
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
            <div class="vfx_upcomming_item_block"> 
              <img src="<?php echo e(URL::to('upload/source/'.$episode_data->video_image)); ?>" alt="<?php echo e($episode_data->video_title); ?>">
              <?php if($episode_data->video_access=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>                             
            </div>
            <div class="vfx_video_detail">
              <h4 class="vfx_video_title"><?php echo e(Str::limit($episode_data->video_title,10)); ?></h4>
             </div>
          </div>
          </a> 
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
    </div>
  </div>

  <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-12">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><?php echo e(trans('words.seasons_text')); ?></h2>
          </div>
        </div>
      </div>
      <div class="row">

        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        <?php $__currentLoopData = $season_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $season_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(URL::to('series/'.$series_slug.'/seasons/'.$season_data->season_slug.'/'.$season_data->id)); ?>">
             <div class="vfx_video_item">
                <div class="vfx_upcomming_item_block">
					<img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.$season_data->season_poster)); ?>" alt="<?php echo e($season_data->season_name); ?>"> 
				</div>	
                <div class="vfx_video_detail">
                  <h4 class="vfx_video_title"><?php echo e(Str::limit($season_data->season_name,25)); ?></h4>
                </div>                         
             </div>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </div>         
      </div>
    </div>
  </div>   
</div>

<?php if(get_ads('episode_single_ad_bottom')->status!=0): ?>
<div class="add_banner_section">               
  <div class="row">
    <div class="col-md-12">
      <?php echo get_ads('episode_single_ad_bottom')->ad_code; ?>

    </div>
  </div>               
</div>
<?php endif; ?>

  
<script src="<?php echo e(URL::asset('site_assets/video_player/js/video.js')); ?>"></script> 
<script>
var viavi_player = videojs("v_player", { 
		"controls": true, 
		"autoplay": true,
		"fluid": true, 
		"preload": "auto" ,
		//"playbackRates": [0.5, 1, 1.5, 2],
		"width": 640,
		"height": 265 
	});
</script>
    <!-- Logo/watermark -->
    <script src="<?php echo e(URL::asset('site_assets/video_player/js/watermark-logo.min.js')); ?>"></script>
    <script>
      viavi_player.videoLogo({
        watermark: ' ',
        logo: "<?php echo e(URL::asset('upload/source/'.getcong('site_logo'))); ?>",       // default 'logo.png'
        homepage: '<?php echo e(URL::to('/')); ?>',
      });
    </script>
    <!-- End Logo/watermark -->
    <!--  seek button -->
    <script src="<?php echo e(URL::asset('site_assets/video_player/js/videojs-seek-buttons.min.js')); ?>"></script>
    <script>
    viavi_player.seekButtons({
        forward: 10,
        back: 5      });
    </script>
    <!--  END seek button -->  

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/episodes_details.blade.php ENDPATH**/ ?>