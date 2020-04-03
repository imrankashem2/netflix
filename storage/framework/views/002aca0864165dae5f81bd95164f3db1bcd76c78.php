 

<?php if($tv_info->seo_title): ?>
	<?php $__env->startSection('head_title', stripslashes($tv_info->seo_title).' | '.getcong('site_name')); ?>
<?php else: ?>
	<?php $__env->startSection('head_title', stripslashes($tv_info->channel_name).' | '.getcong('site_name') ); ?>
<?php endif; ?>

<?php if($tv_info->seo_description): ?>
	<?php $__env->startSection('head_description', stripslashes($tv_info->seo_description)); ?>
<?php else: ?>
	<?php $__env->startSection('head_description', Str::limit(stripslashes($tv_info->channel_description),160)); ?>
<?php endif; ?>

<?php if($tv_info->seo_keyword): ?>
	<?php $__env->startSection('head_keywords', stripslashes($tv_info->seo_keyword)); ?> 
<?php endif; ?>


<?php $__env->startSection('head_image', URL::to('upload/source/'.$tv_info->channel_thumb) ); ?>

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

            <?php if($tv_info->channel_url_type=="embed"): ?>

              <div class="videoWrapper"><?php echo $tv_info->channel_url; ?></div>

            <?php else: ?>

                <div id="container">
                  <video id="v_player" class="video-js vjs-big-play-centered skin-blue vjs-16-9" controls preload="none" width="640" height="450" poster="<?php echo e(URL::to('upload/source/'.$tv_info->channel_thumb)); ?>" data-setup="{}">
                    <!-- video source -->
                    <!-- worning text if needed -->
                    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                  </video>                
                </div>    

            <?php endif; ?>  

										 
					  </main> 
					  <h3 class="vfx_video_title"><?php echo e(stripslashes($tv_info->channel_name)); ?></h3> 
					  <div class="video-attributes dtl_video">
						<div class="single-footer">
							<div class="row">
								<div class="col-md-5 col-xs-12">
									<div class="news-share">
										<label><?php echo e(trans('words.share_text')); ?>: </label>
										<div class="share-social">
											<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
											<a href="https://twitter.com/intent/tweet?text=<?php echo e($tv_info->channel_name); ?>&amp;url=<?php echo e(url()->current()); ?>"><i class="fa fa-twitter"></i></a>
											<a href="http://pinterest.com/pin/create/button/?url=<?php echo e(url()->current()); ?>&media=<?php echo e(URL::to('upload/source/'.$tv_info->channel_thumb)); ?>&description=<?php echo e($tv_info->channel_name); ?>"><i class="fa fa-pinterest"></i></a>
											<a href="whatsapp://send?text=<?php echo e(url()->current()); ?>" data-action="share/whatsapp/share"><i class="fa fa-whatsapp"></i></a>
										</div>
									</div>
								</div>
								<div class="col-md-7 col-xs-12">									 
								</div>
							</div>
						</div> 							  
					  </div>
					  <div class="clearfix"></div>
					  <?php if(get_ads('livetv_single_ad_top')->status!=0): ?>
					  <div class="add_banner_section">					     
					      <div class="row">
					        <div class="col-md-12">
					          <?php echo get_ads('livetv_single_ad_top')->ad_code; ?>

					        </div>
					      </div>					     
					  </div>
					  <?php endif; ?>

					  <div class="single-section video-entry mr-top-20" id="episodes_all">
						  <h3 class="single-vfx_section_title"><?php echo e(trans('words.description')); ?></h3>
						  <div class="section-content">
							<?php if(strlen($tv_info->channel_description) > 500): ?>
							<div class="listing-section">
								  <div class="show-more">
									<div class="pricing-list-container">
									   <?php echo stripslashes($tv_info->channel_description); ?>

									</div>
								  </div>
								  <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-down"></i></a> 
							</div>
							<?php else: ?>
                				<?php echo stripslashes($tv_info->channel_description); ?>

							<?php endif; ?>
						  </div>
						</div>	
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12">            
					  <?php if(get_ads('livetv_single_ad_sidebar')->status!=0): ?>
						<div class="add_banner_section">					     
						  <div class="row">
						    <div class="col-md-12">
						      <?php echo get_ads('livetv_single_ad_sidebar')->ad_code; ?>

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
            <h2 class="vfx_section_title"><?php echo e(trans('words.you_may_like')); ?></h2>
          </div>
        </div>
      </div>
      <div class="row">      	 
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        <?php $__currentLoopData = $related_livetv_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(URL::to('live-tv/'.$related_data->channel_slug.'/'.$related_data->id)); ?>">
              <div class="vfx_video_item">
				<div class="vfx_upcomming_item_block"> 
			    	<img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.$related_data->channel_thumb)); ?>" alt="show"> 
				</div>	
                <div class="vfx_upcomming_detail">
                  <h4 class="vfx_video_title"><?php echo e(Str::limit($related_data->channel_name,25)); ?></h4>
                </div>                         
             </div>
           </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>         
      </div>
    </div>
  </div>
   
</div>

<?php if(get_ads('livetv_single_ad_bottom')->status!=0): ?>
<div class="add_banner_section">					     
  <div class="row">
    <div class="col-md-12">
      <?php echo get_ads('livetv_single_ad_bottom')->ad_code; ?>

    </div>
  </div>					     
</div>
<?php endif; ?>
 
<script src="<?php echo e(URL::asset('site_assets/video_player/js/video.js')); ?>"></script> 
 
<?php if($tv_info->channel_url_type=="hls"): ?>  
<script>
var viavi_player = videojs("v_player", { 
                "controls": true, 
                "autoplay": true,
                "fluid": true, 
                "preload": "auto" ,
                //"playbackRates": [0.5, 1, 1.5, 2],
                "width": 640,
                "height": 265,
                sources: [
                        	{ src: '<?php echo e($tv_info->channel_url); ?>', type: 'application/x-mpegURL'}
                        ],
            });
</script>
<?php endif; ?>

<?php if($tv_info->channel_url_type=="mpeg-dash"): ?>

<script src="<?php echo e(URL::asset('site_assets/video_player/plugins/dash-js/dash.all.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('site_assets/video_player/plugins/videojs-dash.min.js')); ?>"></script>
  
<script>
var viavi_player = videojs("v_player", { 
                "controls": true, 
                "autoplay": true,
                "fluid": true, 
                "preload": "auto" ,
                //"playbackRates": [0.5, 1, 1.5, 2],
                "width": 640,
                "height": 265,
                sources: [
                        	{ src: '<?php echo e($tv_info->channel_url); ?>', type: 'application/dash+xml'}
                        ],
            });
</script>

<?php endif; ?>  

<?php if($tv_info->channel_url_type=="youtube"): ?>  
 
<script src="<?php echo e(URL::asset('site_assets/video_player/plugins/videojs-youtube/Youtube.min.js')); ?>"></script>
<script>
var viavi_player = videojs("v_player", { 
                "controls": true, 
                "autoplay": true,
                "fluid": true, 
                "preload": "auto" ,
                //"playbackRates": [0.5, 1, 1.5, 2],
                "width": 640,
                "height": 265,
                techOrder:  ["youtube"],
                sources: [
                        	{ src: '<?php echo e($tv_info->channel_url); ?>', type: 'video/youtube'}
                        ],
            });
</script>
<?php endif; ?>

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
     
   
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/pages/livetv_single.blade.php ENDPATH**/ ?>