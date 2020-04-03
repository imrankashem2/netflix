<?php $__env->startSection('head_title', getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>

<div class="vfx_banner_slider-area text-white">
  <div id="vfx_banner_slider" class="owl-carousel vfx_banner_slider">
    
    <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="banner-item" style="background-image:url(<?php echo e(URL::to('upload/source/'.$slider_data->slider_image)); ?>);">
      <div class="overlay-70"> 
        <?php if($slider_data->slider_type=="Movies"): ?>
        <a class="" href="<?php echo e(URL::to('movies/'.App\Movies::getMoviesInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id)); ?>">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a>
        <?php elseif($slider_data->slider_type=="Shows"): ?>
        <a class="" href="<?php echo e(URL::to('series/'.App\Series::getSeriesInfo($slider_data->slider_post_id,'series_slug').'/'.$slider_data->slider_post_id)); ?>">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a>
        <?php elseif($slider_data->slider_type=="Sports"): ?>
        <a class="" href="<?php echo e(URL::to('sports/'.App\Sports::getSportsInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id)); ?>">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a>
        <?php elseif($slider_data->slider_type=="LiveTV"): ?>
        <a class="" href="<?php echo e(URL::to('live-tv/'.App\LiveTV::getLiveTvInfo($slider_data->slider_post_id,'channel_slug').'/'.$slider_data->slider_post_id)); ?>">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
        </a>  
        <?php else: ?>
          <a class="" href="#">
            <i class="icon fa fa-play"></i><span class="ripple"></span>
          </a>
        <?php endif; ?>
        <div class="vfx_banner_content">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-md-8"> 
                <h2 class="banner-title">
                  
                  <?php if($slider_data->slider_type=="Movies"): ?>
                  <a class="" href="<?php echo e(URL::to('movies/'.App\Movies::getMoviesInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id)); ?>">
                      <?php echo e($slider_data->slider_title); ?>

                  </a>
                  <?php elseif($slider_data->slider_type=="Shows"): ?>
                  <a class="" href="<?php echo e(URL::to('series/'.App\Series::getSeriesInfo($slider_data->slider_post_id,'series_slug').'/'.$slider_data->slider_post_id)); ?>">
                      <?php echo e($slider_data->slider_title); ?>

                  </a>
                  <?php elseif($slider_data->slider_type=="Sports"): ?>
                  <a class="" href="<?php echo e(URL::to('sports/'.App\Sports::getSportsInfo($slider_data->slider_post_id,'video_slug').'/'.$slider_data->slider_post_id)); ?>">
                      <?php echo e($slider_data->slider_title); ?>

                  </a>
                  <?php elseif($slider_data->slider_type=="LiveTV"): ?>
                  <a class="" href="<?php echo e(URL::to('live-tv/'.App\LiveTV::getLiveTvInfo($slider_data->slider_post_id,'channel_slug').'/'.$slider_data->slider_post_id)); ?>">
                      <?php echo e($slider_data->slider_title); ?>

                  </a>  
                  <?php else: ?>
                    <a href="#"><?php echo e($slider_data->slider_title); ?></a>
                  <?php endif; ?>                  
                
                </h2>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
  </div>
</div>

<div class="main-wrap">   

  <?php if(get_ads('home_ad_top')->status!=0): ?>
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php echo get_ads('home_ad_top')->ad_code; ?>

        </div>
      </div>
    </div>  
  </div>
  <?php endif; ?>

  <?php if(Auth::check() && $recently_watched->count() >0): ?>
  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title">
              Recenty Views
            </h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel vfx_tvshow_carousel recently_item_watched" id="vfx_tvshow_carousel">
          
          <?php $__currentLoopData = $recently_watched; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i=>$watched_videos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
          
          <div class="vfx_video_item">
            <div class="vfx_upcomming_item_block"> 
              <?php if($watched_videos->video_type=="Movies"): ?>
                <a href="<?php echo e(URL::to('movies/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id)); ?>">
                  <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image)); ?>" alt="Movies"></a> 
              <?php endif; ?>    
              <?php if($watched_videos->video_type=="Sports"): ?>
                <a href="<?php echo e(URL::to('sports/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id)); ?>">
                  <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image)); ?>" alt="Sports"></a> 
              <?php endif; ?>
              <?php if($watched_videos->video_type=="Episodes"): ?>
               <?php $episode_series_id=\App\Episodes::getEpisodesInfo($watched_videos->video_id,'episode_series_id');?>

                <a href="<?php echo e(URL::to('series/'.\App\Series::getSeriesInfo($episode_series_id,'series_slug').'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id)); ?>">
                  <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->video_image)); ?>" alt="Episode"></a> 
              <?php endif; ?>

              <?php if($watched_videos->video_type=="LiveTV"): ?>
                <a href="<?php echo e(URL::to('live-tv/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_slug.'/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->id)); ?>">
                  <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.recently_watched_info($watched_videos->video_type,$watched_videos->video_id)->channel_thumb)); ?>" alt="tv"></a> 
              <?php endif; ?>                  
                
                     
            </div> 
          </div>
       
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
      
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('movies/latest')); ?>"><?php echo e(trans('words.latest_movies')); ?></a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel" id="video-carousel">
          
          <?php $__currentLoopData = explode(",",$home_sections->section1_latest_movie); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
            <?php if(App\Movies::getMoviesInfo($latest_movie,'status')==1): ?>
            
            <?php if(Auth::check()): ?>              
                <a class="icon" href="<?php echo e(URL::to('movies/'.App\Movies::getMoviesInfo($latest_movie,'video_slug').'/'.App\Movies::getMoviesInfo($latest_movie,'id'))); ?>">              
            <?php else: ?>
               <?php if(App\Movies::getMoviesInfo($latest_movie,'video_access')=='Paid'): ?>
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               <?php else: ?>
                <a class="icon" href="<?php echo e(URL::to('movies/'.App\Movies::getMoviesInfo($latest_movie,'video_slug').'/'.App\Movies::getMoviesInfo($latest_movie,'id'))); ?>">
               <?php endif; ?>  
            <?php endif; ?>
              
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.App\Movies::getMoviesInfo($latest_movie,'video_image_thumb'))); ?>" alt="Movie Thumb"> <?php if(App\Movies::getMoviesInfo($latest_movie,'video_access')=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>
                <div class="thumb-hover">            
            <i class="icon fa fa-play"></i><span class="ripple"></span>
            
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit(App\Movies::getMoviesInfo($latest_movie,'video_title'),12)); ?></h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> <?php echo e(App\Movies::getMoviesInfo($latest_movie,'duration')); ?></p>
               </div>
            </div>
           </a> 
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
      
        </div>
      </div>
    </div>
  </div>
   
  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('series/latest')); ?>"><?php echo e(trans('words.latest_shows')); ?></a></h2>
          </div>
        </div>
     
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        <?php $__currentLoopData = explode(",",$home_sections->section2_latest_series); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
          <?php if(App\Series::getSeriesInfo($latest_series,'status')==1): ?>


            <a href="<?php echo e(URL::to('series/'.App\Series::getSeriesInfo($latest_series,'series_slug').'/'.App\Series::getSeriesInfo($latest_series,'id'))); ?>">
            <div class="vfx_video_item">
             <div class="vfx_upcomming_item_block"> 
              <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.App\Series::getSeriesInfo($latest_series,'series_poster'))); ?>" alt="show">                            
             </div>                  
			 <div class="vfx_upcomming_detail">
			  <h4 class="vfx_video_title"><?php echo e(Str::limit(App\Series::getSeriesInfo($latest_series,'series_name'),25)); ?></h4>
			 </div> 
           </div>
           </a>  
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

        </div>
      </div>
    </div>
  </div> 

    <div class="section section-padding vfx_movie_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('movies/popular')); ?>"><?php echo e(trans('words.popular_movies')); ?></a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel" id="video-carousel">
          
          <?php $__currentLoopData = explode(",",$home_sections->section3_popular_movie); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
            <?php if(App\Movies::getMoviesInfo($popular_movie,'status')==1): ?>
            
            <?php if(Auth::check()): ?>              
                <a class="icon" href="<?php echo e(URL::to('movies/'.App\Movies::getMoviesInfo($popular_movie,'video_slug').'/'.App\Movies::getMoviesInfo($popular_movie,'id'))); ?>">              
            <?php else: ?>
               <?php if(App\Movies::getMoviesInfo($popular_movie,'video_access')=='Paid'): ?>
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               <?php else: ?>
                <a class="icon" href="<?php echo e(URL::to('movies/'.App\Movies::getMoviesInfo($popular_movie,'video_slug').'/'.App\Movies::getMoviesInfo($popular_movie,'id'))); ?>">
               <?php endif; ?>  
            <?php endif; ?> 
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.App\Movies::getMoviesInfo($popular_movie,'video_image_thumb'))); ?>" alt="Movie Thumb"> <?php if(App\Movies::getMoviesInfo($popular_movie,'video_access')=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>
                <div class="thumb-hover">           
            <i class="icon fa fa-play"></i><span class="ripple"></span>
           
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit(App\Movies::getMoviesInfo($popular_movie,'video_title'),12)); ?></h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> <?php echo e(App\Movies::getMoviesInfo($popular_movie,'duration')); ?></p>
               </div>
            </div>
            </a>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
      
        </div>
      </div>
    </div>
  </div>

  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('series/popular')); ?>"><?php echo e(trans('words.popular_shows')); ?></a></h2>
          </div>
        </div>     
      </div>
      <div class="row">
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        <?php $__currentLoopData = explode(",",$home_sections->section3_popular_series); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular_series): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>            
          <?php if(App\Series::getSeriesInfo($popular_series,'status')==1): ?>
            <a href="<?php echo e(URL::to('series/'.App\Series::getSeriesInfo($popular_series,'series_slug').'/'.App\Series::getSeriesInfo($popular_series,'id'))); ?>">
            <div class="vfx_video_item">
              <div class="vfx_upcomming_item_block">
				<img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.App\Series::getSeriesInfo($popular_series,'series_poster'))); ?>" alt="show">                 
              </div>                  
			  <div class="vfx_upcomming_detail">
                  <h4 class="vfx_video_title"><?php echo e(Str::limit(App\Series::getSeriesInfo($popular_series,'series_name'),25)); ?></h4>
              </div>            
           </div>
           </a>  
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
    </div>
  </div> 
  
  <?php if($home_sections->section3_type=="Series"): ?>

  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('language/series/'.App\Language::getLanguageInfo($section3_lang_id,'language_slug'))); ?>"><?php echo e($home_sections->section3_title); ?></a></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <?php if(App\Language::getLanguageInfo($section3_lang_id,'language_slug')): ?>
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        <?php $__currentLoopData = $home_sections_list3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list3_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(URL::to('series/'.$list3_data->series_slug.'/'.$list3_data->id)); ?>">
            <div class="vfx_video_item">
			  <div class="vfx_upcomming_item_block">
                <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.$list3_data->series_poster)); ?>" alt="show"> 
                <div class="vfx_upcomming_detail">
                  <h4 class="vfx_video_title"><?php echo e(Str::limit($list3_data->series_name,25)); ?></h4>
                </div>            
              </div>                  
           </div>
           </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div> 

  <?php else: ?>  
  <div class="section section-padding vfx_tvshow_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('language/movies/'.App\Language::getLanguageInfo($section3_lang_id,'language_slug'))); ?>"><?php echo e($home_sections->section3_title); ?></a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <?php if(App\Language::getLanguageInfo($section3_lang_id,'language_slug')): ?>
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">      
 
           <?php $__currentLoopData = $home_sections_list3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list3_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(Auth::check()): ?>              
                <a class="icon" href="<?php echo e(URL::to('movies/'.$list3_data->video_slug.'/'.$list3_data->id)); ?>">              
            <?php else: ?>
               <?php if($list3_data->video_access=='Paid'): ?>
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               <?php else: ?>
                <a class="icon" href="<?php echo e(URL::to('movies/'.$list3_data->video_slug.'/'.$list3_data->id)); ?>">
               <?php endif; ?>  
            <?php endif; ?>
            <div class="vfx_video_item">
              <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.$list3_data->video_image_thumb)); ?>" alt="Movie Thumb"> <?php if($list3_data->video_access=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>
                <div class="thumb-hover"> 
					<i class="icon fa fa-play"></i><span class="ripple"></span>
				</div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit($list3_data->video_title,12)); ?></h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> <?php echo e($list3_data->duration); ?></p>
               </div>
            </div>
            </a>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
      
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  

  <?php if($home_sections->section4_type=="Series"): ?>

  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('language/series/'.App\Language::getLanguageInfo($section4_lang_id,'language_slug'))); ?>"><?php echo e($home_sections->section4_title); ?></a></h2>
          </div>
        </div>
     
      </div>
      <div class="row">
        <?php if(App\Language::getLanguageInfo($section4_lang_id,'language_slug')): ?>
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        <?php $__currentLoopData = $home_sections_list4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list4_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(URL::to('series/'.$list4_data->series_slug.'/'.$list4_data->id)); ?>">
            <div class="vfx_video_item">
              <div class="vfx_upcomming_item_block"> 
                <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.$list4_data->series_poster)); ?>" alt="show">                 
              </div>                  
			  <div class="vfx_upcomming_detail">
				<h4 class="vfx_video_title"><?php echo e(Str::limit($list4_data->series_name,25)); ?></h4>
 			  </div>            
           </div>
           </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div> 

  <?php else: ?>  
  <div class="section section-padding vfx_tvshow_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('language/movies/'.App\Language::getLanguageInfo($section4_lang_id,'language_slug'))); ?>"><?php echo e($home_sections->section4_title); ?></a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <?php if(App\Language::getLanguageInfo($section4_lang_id,'language_slug')): ?>
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">      
 
           <?php $__currentLoopData = $home_sections_list4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list4_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
            
            <?php if(Auth::check()): ?>              
                <a class="icon" href="<?php echo e(URL::to('movies/'.$list4_data->video_slug.'/'.$list4_data->id)); ?>">              
            <?php else: ?>
               <?php if($list4_data->video_access=='Paid'): ?>
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               <?php else: ?>
                <a class="icon" href="<?php echo e(URL::to('movies/'.$list4_data->video_slug.'/'.$list4_data->id)); ?>">
               <?php endif; ?>  
            <?php endif; ?>  
            <div class="vfx_video_item">

              <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.$list4_data->video_image_thumb)); ?>" alt="Movie Thumb"> <?php if($list4_data->video_access=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>
                <div class="thumb-hover">            
            <i class="icon fa fa-play"></i><span class="ripple"></span>
            
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit($list4_data->video_title,12)); ?></h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> <?php echo e($list4_data->duration); ?></p>
               </div>
            </div>
            </a>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
      
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php if($home_sections->section5_type=="Series"): ?>

  <div class="section section-padding bg-image tv_show gray_bg">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('language/series/'.App\Language::getLanguageInfo($section5_lang_id,'language_slug'))); ?>"><?php echo e($home_sections->section5_title); ?></a></h2>
          </div>
        </div>
     
      </div>
      <div class="row">
        <?php if(App\Language::getLanguageInfo($section5_lang_id,'language_slug')): ?>
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">
        <?php $__currentLoopData = $home_sections_list5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list5_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(URL::to('series/'.$list5_data->series_slug.'/'.$list5_data->id)); ?>">
            <div class="vfx_video_item">
              <div class="vfx_upcomming_item_block"> 
             <img class="img-responsive" src="<?php echo e(URL::to('upload/source/'.$list5_data->series_poster)); ?>" alt="show"> 
                <div class="vfx_upcomming_detail">
                  <h4 class="vfx_video_title"><?php echo e(Str::limit($list5_data->series_name,25)); ?></h4>
                 </div>            
             </div>                  
           </div>
           </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div> 

  <?php else: ?>  
  <div class="section section-padding vfx_tvshow_section_block">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-xs-6">
          <div class="vfx_section_header">
            <h2 class="vfx_section_title"><a href="<?php echo e(URL::to('language/movies/'.App\Language::getLanguageInfo($section5_lang_id,'language_slug'))); ?>"><?php echo e($home_sections->section5_title); ?></a></h2>
          </div>
        </div>        
      </div>
      <div class="row">
        <?php if(App\Language::getLanguageInfo($section5_lang_id,'language_slug')): ?>
        <div class="owl-carousel video-carousel vfx_tvshow_carousel" id="vfx_tvshow_carousel">      
 
           <?php $__currentLoopData = $home_sections_list5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list5_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
            
            <?php if(Auth::check()): ?>              
                <a class="icon" href="<?php echo e(URL::to('movies/'.$list5_data->video_slug.'/'.$list5_data->id)); ?>">              
            <?php else: ?>
               <?php if($list5_data->video_access=='Paid'): ?>
                <a class="icon" href="Javascript::void();" data-toggle="modal" data-target="#loginAlertModal">
               <?php else: ?>
                <a class="icon" href="<?php echo e(URL::to('movies/'.$list5_data->video_slug.'/'.$list5_data->id)); ?>">
               <?php endif; ?>  
            <?php endif; ?>  
            <div class="vfx_video_item">

              <div class="thumb-wrap"> <img src="<?php echo e(URL::to('upload/source/'.$list5_data->video_image_thumb)); ?>" alt="Movie Thumb"> <?php if($list5_data->video_access=='Paid'): ?><span class="premium_video"><i class="fa fa-lock"></i>Premium</span><?php endif; ?>
                <div class="thumb-hover"> 
           
            <i class="icon fa fa-play"></i><span class="ripple"></span>
           
          </div>
              </div>
              <div class="vfx_video_detail">
                <h4 class="vfx_video_title"><?php echo e(Str::limit($list5_data->video_title,25)); ?></h4>
                <p class="vfx_video_length"><i class="fa fa-clock-o"></i> <?php echo e($list5_data->duration); ?></p>
               </div>
            </div>
            </a>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>         
      
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>

    
</div>

<?php if(get_ads('home_ad_bottom')->status!=0): ?>
  <div class="add_banner_section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php echo get_ads('home_ad_bottom')->ad_code; ?>

        </div>
      </div>
    </div>  
  </div>
  <?php endif; ?>


 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\laravel6_video_script_final\resources\views/pages/index.blade.php ENDPATH**/ ?>