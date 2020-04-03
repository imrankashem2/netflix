<div class="left side-menu">
      <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
          
          <?php if(Auth::User()->usertype =="Admin"): ?>
          <ul>
            <li><a href="<?php echo e(URL::to('admin/dashboard')); ?>" class="waves-effect <?php echo e(classActivePath('dashboard')); ?>"><i class="fa fa-dashboard"></i> <span> <?php echo e(trans('words.dashboard_text')); ?></span></a></li>

            <li><a href="<?php echo e(URL::to('admin/language')); ?>" class="waves-effect <?php echo e(classActivePath('language')); ?>"><i class="fa fa-language"></i> <span> <?php echo e(trans('words.language_text')); ?></span></a></li>

            <li><a href="<?php echo e(URL::to('admin/genres')); ?>" class="waves-effect <?php echo e(classActivePath('genres')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.genres_text')); ?></span></a></li>

            <li><a href="<?php echo e(URL::to('admin/movies')); ?>" class="waves-effect <?php echo e(classActivePath('movies')); ?>"><i class="fa fa-video-camera"></i> <span> <?php echo e(trans('words.movies_text')); ?></span></a></li>
            <?php 
             // echo classActivePathSub('episodes');
             // exit;
                  
            ?>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-film"></i><span><?php echo e(trans('words.tv_shows_text')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('series')); ?>"><a href="<?php echo e(URL::to('admin/series')); ?>" class="<?php echo e(classActivePath('series')); ?>"><i class="fa fa-image"></i> <span> <?php echo e(trans('words.shows_text')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('season')); ?>"><a href="<?php echo e(URL::to('admin/season')); ?>" class="<?php echo e(classActivePath('season')); ?>"><i class="fa fa-tree"></i> <span> <?php echo e(trans('words.seasons_text')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('episodes')); ?>"><a href="<?php echo e(URL::to('admin/episodes')); ?>" class="<?php echo e(classActivePath('episodes')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.episodes_text')); ?></span></a></li>
              </ul>
            </li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-futbol-o"></i><span><?php echo e(trans('words.sports_text')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('sports_category')); ?>"><a href="<?php echo e(URL::to('admin/sports_category')); ?>" class="<?php echo e(classActivePath('sports_category')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.sports_cat_text')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('sports')); ?>"><a href="<?php echo e(URL::to('admin/sports')); ?>" class="<?php echo e(classActivePath('sports')); ?>"><i class="fa fa-soccer-ball-o"></i> <span> <?php echo e(trans('words.sports_video_text')); ?></span></a></li>
               </ul>
            </li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tv"></i><span><?php echo e(trans('words.live_tv')); ?></span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('tv_category')); ?>"><a href="<?php echo e(URL::to('admin/tv_category')); ?>" class="<?php echo e(classActivePath('tv_category')); ?>"><i class="fa fa-tags"></i> <span> <?php echo e(trans('words.live_tv_category')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('live_tv')); ?>"><a href="<?php echo e(URL::to('admin/live_tv')); ?>" class="<?php echo e(classActivePath('live_tv')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.tv_channel')); ?></span></a></li>
               </ul>
            </li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-sliders"></i><span><?php echo e(trans('words.home')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('slider')); ?>"><a href="<?php echo e(URL::to('admin/slider')); ?>" class="<?php echo e(classActivePath('slider')); ?>"><i class="fa fa-sliders"></i> <span> <?php echo e(trans('words.slider')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('home_section')); ?>"><a href="<?php echo e(URL::to('admin/home_section')); ?>" class="<?php echo e(classActivePath('home_section')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.home_section')); ?></span></a></li>
               </ul>
            </li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i><span><?php echo e(trans('words.users')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('users')); ?>"><a href="<?php echo e(URL::to('admin/users')); ?>" class="<?php echo e(classActivePath('users')); ?>"><i class="fa fa-users"></i> <span> <?php echo e(trans('words.users')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('sub_admin')); ?>"><a href="<?php echo e(URL::to('admin/sub_admin')); ?>" class="<?php echo e(classActivePath('sub_admin')); ?>"><i class="fa fa-users"></i> <span> <?php echo e(trans('words.admin')); ?></span></a></li>
               </ul>
            </li>
 
            <li><a href="<?php echo e(URL::to('admin/subscription_plan')); ?>" class="waves-effect <?php echo e(classActivePath('subscription_plan')); ?>"><i class="fa fa-dollar"></i> <span><?php echo e(trans('words.subscription_plan')); ?></span></a></li>

            <li><a href="<?php echo e(URL::to('admin/transactions')); ?>" class="waves-effect <?php echo e(classActivePath('transactions')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.transactions')); ?></span></a></li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-edit"></i><span><?php echo e(trans('words.pages')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('about_page')); ?>"><a href="<?php echo e(URL::to('admin/about_page')); ?>" class="<?php echo e(classActivePath('about_page')); ?>"><i class="fa fa-file"></i> <span> <?php echo e(trans('words.about_us')); ?></span></a></li>

                <li class="<?php echo e(classActivePath('terms_page')); ?>"><a href="<?php echo e(URL::to('admin/terms_page')); ?>" class="<?php echo e(classActivePath('terms_page')); ?>"><i class="fa fa-file"></i> <span> <?php echo e(trans('words.terms_of_us')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('privacy_policy_page')); ?>"><a href="<?php echo e(URL::to('admin/privacy_policy_page')); ?>" class="<?php echo e(classActivePath('privacy_policy_page')); ?>"><i class="fa fa-file"></i> <span> <?php echo e(trans('words.privacy_policy')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('faq_page')); ?>"><a href="<?php echo e(URL::to('admin/faq_page')); ?>" class="<?php echo e(classActivePath('faq_page')); ?>"><i class="fa fa-file"></i> <span> <?php echo e(trans('words.faq')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('contact_page')); ?>"><a href="<?php echo e(URL::to('admin/contact_page')); ?>" class="<?php echo e(classActivePath('contact_page')); ?>"><i class="fa fa-file"></i> <span> <?php echo e(trans('words.contact_us')); ?></span></a></li>
                 
               </ul>
            </li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cog"></i><span><?php echo e(trans('words.settings')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('general_settings')); ?>"><a href="<?php echo e(URL::to('admin/general_settings')); ?>" class="<?php echo e(classActivePath('general_settings')); ?>"><i class="fa fa-cog"></i> <span> <?php echo e(trans('words.general')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('email_settings')); ?>"><a href="<?php echo e(URL::to('admin/email_settings')); ?>" class="<?php echo e(classActivePath('email_settings')); ?>"><i class="fa fa-send"></i> <span> <?php echo e(trans('words.smtp_email')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('payment_settings')); ?>"><a href="<?php echo e(URL::to('admin/payment_settings')); ?>" class="<?php echo e(classActivePath('payment_settings')); ?>"><i class="fa fa-ticket"></i> <span> <?php echo e(trans('words.payment')); ?></span></a></li>

                <li class="<?php echo e(classActivePath('ads_list')); ?> <?php echo e(classActivePath('ads_edit')); ?>"><a href="<?php echo e(URL::to('admin/ads_list')); ?>" class="<?php echo e(classActivePath('ads_list')); ?> <?php echo e(classActivePath('ads_edit')); ?>"><i class="fa fa-buysellads"></i> <span> <?php echo e(trans('words.ad_management')); ?></span></a></li>

               </ul>
            </li> 

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-android"></i><span><?php echo e(trans('words.android_app')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                
                <li class="<?php echo e(classActivePath('verify_purchase_app')); ?>"><a href="<?php echo e(URL::to('admin/verify_purchase_app')); ?>" class="<?php echo e(classActivePath('verify_purchase_app')); ?>"><i class="fa fa-lock"></i> <span> App Verify</span></a></li>  
                <?php if(env('BUYER_NAME') AND env('BUYER_PURCHASE_CODE')): ?>
                <li class="<?php echo e(classActivePath('android_settings')); ?>"><a href="<?php echo e(URL::to('admin/android_settings')); ?>" class="<?php echo e(classActivePath('android_settings')); ?>"><i class="fa fa-cog"></i> <span> <?php echo e(trans('words.android_app_settings')); ?></span></a></li>
                
                <li class="<?php echo e(classActivePath('android_notification')); ?>"><a href="<?php echo e(URL::to('admin/android_notification')); ?>" class="<?php echo e(classActivePath('android_notification')); ?>"><i class="fa fa-send"></i> <span> <?php echo e(trans('words.android_app_notification')); ?></span></a></li>
                <?php endif; ?> 
               </ul>
            </li> 

            <?php else: ?>

              <ul>
                <li><a href="<?php echo e(URL::to('admin/dashboard')); ?>" class="waves-effect <?php echo e(classActivePath('dashboard')); ?>"><i class="fa fa-dashboard"></i> <span> <?php echo e(trans('words.dashboard_text')); ?></span></a></li>

            <li><a href="<?php echo e(URL::to('admin/language')); ?>" class="waves-effect <?php echo e(classActivePath('language')); ?>"><i class="fa fa-language"></i> <span> <?php echo e(trans('words.language_text')); ?></span></a></li>

            <li><a href="<?php echo e(URL::to('admin/genres')); ?>" class="waves-effect <?php echo e(classActivePath('genres')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.genres_text')); ?></span></a></li>

            <li><a href="<?php echo e(URL::to('admin/movies')); ?>" class="waves-effect <?php echo e(classActivePath('movies')); ?>"><i class="fa fa-video-camera"></i> <span> <?php echo e(trans('words.movies_text')); ?></span></a></li>
            <?php 
             // echo classActivePathSub('episodes');
             // exit;
                  
            ?>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tv"></i><span><?php echo e(trans('words.tv_shows_text')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('series')); ?>"><a href="<?php echo e(URL::to('admin/series')); ?>" class="<?php echo e(classActivePath('series')); ?>"><i class="fa fa-image"></i> <span> <?php echo e(trans('words.shows_text')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('season')); ?>"><a href="<?php echo e(URL::to('admin/season')); ?>" class="<?php echo e(classActivePath('season')); ?>"><i class="fa fa-tree"></i> <span> <?php echo e(trans('words.seasons_text')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('episodes')); ?>"><a href="<?php echo e(URL::to('admin/episodes')); ?>" class="<?php echo e(classActivePath('episodes')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.episodes_text')); ?></span></a></li>
              </ul>
            </li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-futbol-o"></i><span><?php echo e(trans('words.sports_text')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('sports_category')); ?>"><a href="<?php echo e(URL::to('admin/sports_category')); ?>" class="<?php echo e(classActivePath('sports_category')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.sports_cat_text')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('sports')); ?>"><a href="<?php echo e(URL::to('admin/sports')); ?>" class="<?php echo e(classActivePath('sports')); ?>"><i class="fa fa-soccer-ball-o"></i> <span> <?php echo e(trans('words.sports_video_text')); ?></span></a></li>
               </ul>
            </li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tv"></i><span><?php echo e(trans('words.live_tv')); ?></span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('tv_category')); ?>"><a href="<?php echo e(URL::to('admin/tv_category')); ?>" class="<?php echo e(classActivePath('tv_category')); ?>"><i class="fa fa-tags"></i> <span> <?php echo e(trans('words.live_tv_category')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('live_tv')); ?>"><a href="<?php echo e(URL::to('admin/live_tv')); ?>" class="<?php echo e(classActivePath('live_tv')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.tv_channel')); ?></span></a></li>
               </ul>
            </li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-sliders"></i><span><?php echo e(trans('words.home')); ?> </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="<?php echo e(classActivePath('slider')); ?>"><a href="<?php echo e(URL::to('admin/slider')); ?>" class="<?php echo e(classActivePath('slider')); ?>"><i class="fa fa-sliders"></i> <span> <?php echo e(trans('words.slider')); ?></span></a></li>
                <li class="<?php echo e(classActivePath('home_section')); ?>"><a href="<?php echo e(URL::to('admin/home_section')); ?>" class="<?php echo e(classActivePath('home_section')); ?>"><i class="fa fa-list"></i> <span> <?php echo e(trans('words.home_section')); ?></span></a></li>
               </ul>
            </li>

            </ul>

            <?php endif; ?>
 
            <!-- <li><a href="<?php echo e(URL::to('admin/language')); ?>" class="waves-effect <?php echo e(classActivePath('language')); ?>"><i class="fa fa-language"></i> <span> Language</span></a></li> -->
            
          </ul>
        </div>
      </div>
    </div><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/sidebar.blade.php ENDPATH**/ ?>