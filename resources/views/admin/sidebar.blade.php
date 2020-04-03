<div class="left side-menu">
      <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
          
          @if(Auth::User()->usertype =="Admin")
          <ul>
            <li><a href="{{ URL::to('admin/dashboard') }}" class="waves-effect {{classActivePath('dashboard')}}"><i class="fa fa-dashboard"></i> <span> {{trans('words.dashboard_text')}}</span></a></li>

            <li><a href="{{ URL::to('admin/language') }}" class="waves-effect {{classActivePath('language')}}"><i class="fa fa-language"></i> <span> {{trans('words.language_text')}}</span></a></li>

            <li><a href="{{ URL::to('admin/genres') }}" class="waves-effect {{classActivePath('genres')}}"><i class="fa fa-list"></i> <span> {{trans('words.genres_text')}}</span></a></li>

            <li><a href="{{ URL::to('admin/movies') }}" class="waves-effect {{classActivePath('movies')}}"><i class="fa fa-video-camera"></i> <span> {{trans('words.movies_text')}}</span></a></li>
            <?php 
             // echo classActivePathSub('episodes');
             // exit;
                  
            ?>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-film"></i><span>{{trans('words.tv_shows_text')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('series')}}"><a href="{{ URL::to('admin/series') }}" class="{{classActivePath('series')}}"><i class="fa fa-image"></i> <span> {{trans('words.shows_text')}}</span></a></li>
                <li class="{{classActivePath('season')}}"><a href="{{ URL::to('admin/season') }}" class="{{classActivePath('season')}}"><i class="fa fa-tree"></i> <span> {{trans('words.seasons_text')}}</span></a></li>
                <li class="{{classActivePath('episodes')}}"><a href="{{ URL::to('admin/episodes') }}" class="{{classActivePath('episodes')}}"><i class="fa fa-list"></i> <span> {{trans('words.episodes_text')}}</span></a></li>
              </ul>
            </li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-futbol-o"></i><span>{{trans('words.sports_text')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('sports_category')}}"><a href="{{ URL::to('admin/sports_category') }}" class="{{classActivePath('sports_category')}}"><i class="fa fa-list"></i> <span> {{trans('words.sports_cat_text')}}</span></a></li>
                <li class="{{classActivePath('sports')}}"><a href="{{ URL::to('admin/sports') }}" class="{{classActivePath('sports')}}"><i class="fa fa-soccer-ball-o"></i> <span> {{trans('words.sports_video_text')}}</span></a></li>
               </ul>
            </li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tv"></i><span>{{trans('words.live_tv')}}</span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('tv_category')}}"><a href="{{ URL::to('admin/tv_category') }}" class="{{classActivePath('tv_category')}}"><i class="fa fa-tags"></i> <span> {{trans('words.live_tv_category')}}</span></a></li>
                <li class="{{classActivePath('live_tv')}}"><a href="{{ URL::to('admin/live_tv') }}" class="{{classActivePath('live_tv')}}"><i class="fa fa-list"></i> <span> {{trans('words.tv_channel')}}</span></a></li>
               </ul>
            </li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-sliders"></i><span>{{trans('words.home')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('slider')}}"><a href="{{ URL::to('admin/slider') }}" class="{{classActivePath('slider')}}"><i class="fa fa-sliders"></i> <span> {{trans('words.slider')}}</span></a></li>
                <li class="{{classActivePath('home_section')}}"><a href="{{ URL::to('admin/home_section') }}" class="{{classActivePath('home_section')}}"><i class="fa fa-list"></i> <span> {{trans('words.home_section')}}</span></a></li>
               </ul>
            </li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-users"></i><span>{{trans('words.users')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('users')}}"><a href="{{ URL::to('admin/users') }}" class="{{classActivePath('users')}}"><i class="fa fa-users"></i> <span> {{trans('words.users')}}</span></a></li>
                <li class="{{classActivePath('sub_admin')}}"><a href="{{ URL::to('admin/sub_admin') }}" class="{{classActivePath('sub_admin')}}"><i class="fa fa-users"></i> <span> {{trans('words.admin')}}</span></a></li>
               </ul>
            </li>
 
            <li><a href="{{ URL::to('admin/subscription_plan') }}" class="waves-effect {{classActivePath('subscription_plan')}}"><i class="fa fa-dollar"></i> <span>{{trans('words.subscription_plan')}}</span></a></li>

            <li><a href="{{ URL::to('admin/transactions') }}" class="waves-effect {{classActivePath('transactions')}}"><i class="fa fa-list"></i> <span> {{trans('words.transactions')}}</span></a></li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-edit"></i><span>{{trans('words.pages')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('about_page')}}"><a href="{{ URL::to('admin/about_page') }}" class="{{classActivePath('about_page')}}"><i class="fa fa-file"></i> <span> {{trans('words.about_us')}}</span></a></li>

                <li class="{{classActivePath('terms_page')}}"><a href="{{ URL::to('admin/terms_page') }}" class="{{classActivePath('terms_page')}}"><i class="fa fa-file"></i> <span> {{trans('words.terms_of_us')}}</span></a></li>
                <li class="{{classActivePath('privacy_policy_page')}}"><a href="{{ URL::to('admin/privacy_policy_page') }}" class="{{classActivePath('privacy_policy_page')}}"><i class="fa fa-file"></i> <span> {{trans('words.privacy_policy')}}</span></a></li>
                <li class="{{classActivePath('faq_page')}}"><a href="{{ URL::to('admin/faq_page') }}" class="{{classActivePath('faq_page')}}"><i class="fa fa-file"></i> <span> {{trans('words.faq')}}</span></a></li>
                <li class="{{classActivePath('contact_page')}}"><a href="{{ URL::to('admin/contact_page') }}" class="{{classActivePath('contact_page')}}"><i class="fa fa-file"></i> <span> {{trans('words.contact_us')}}</span></a></li>
                 
               </ul>
            </li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-cog"></i><span>{{trans('words.settings')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('general_settings')}}"><a href="{{ URL::to('admin/general_settings') }}" class="{{classActivePath('general_settings')}}"><i class="fa fa-cog"></i> <span> {{trans('words.general')}}</span></a></li>
                <li class="{{classActivePath('email_settings')}}"><a href="{{ URL::to('admin/email_settings') }}" class="{{classActivePath('email_settings')}}"><i class="fa fa-send"></i> <span> {{trans('words.smtp_email')}}</span></a></li>
                <li class="{{classActivePath('payment_settings')}}"><a href="{{ URL::to('admin/payment_settings') }}" class="{{classActivePath('payment_settings')}}"><i class="fa fa-ticket"></i> <span> {{trans('words.payment')}}</span></a></li>

                <li class="{{classActivePath('ads_list')}} {{classActivePath('ads_edit')}}"><a href="{{ URL::to('admin/ads_list') }}" class="{{classActivePath('ads_list')}} {{classActivePath('ads_edit')}}"><i class="fa fa-buysellads"></i> <span> {{trans('words.ad_management')}}</span></a></li>

               </ul>
            </li> 

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-android"></i><span>{{trans('words.android_app')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                
                <li class="{{classActivePath('verify_purchase_app')}}"><a href="{{ URL::to('admin/verify_purchase_app') }}" class="{{classActivePath('verify_purchase_app')}}"><i class="fa fa-lock"></i> <span> App Verify</span></a></li>  
                @if(env('BUYER_NAME') AND env('BUYER_PURCHASE_CODE'))
                <li class="{{classActivePath('android_settings')}}"><a href="{{ URL::to('admin/android_settings') }}" class="{{classActivePath('android_settings')}}"><i class="fa fa-cog"></i> <span> {{trans('words.android_app_settings')}}</span></a></li>
                
                <li class="{{classActivePath('android_notification')}}"><a href="{{ URL::to('admin/android_notification') }}" class="{{classActivePath('android_notification')}}"><i class="fa fa-send"></i> <span> {{trans('words.android_app_notification')}}</span></a></li>
                @endif 
               </ul>
            </li> 

            @else

              <ul>
                <li><a href="{{ URL::to('admin/dashboard') }}" class="waves-effect {{classActivePath('dashboard')}}"><i class="fa fa-dashboard"></i> <span> {{trans('words.dashboard_text')}}</span></a></li>

            <li><a href="{{ URL::to('admin/language') }}" class="waves-effect {{classActivePath('language')}}"><i class="fa fa-language"></i> <span> {{trans('words.language_text')}}</span></a></li>

            <li><a href="{{ URL::to('admin/genres') }}" class="waves-effect {{classActivePath('genres')}}"><i class="fa fa-list"></i> <span> {{trans('words.genres_text')}}</span></a></li>

            <li><a href="{{ URL::to('admin/movies') }}" class="waves-effect {{classActivePath('movies')}}"><i class="fa fa-video-camera"></i> <span> {{trans('words.movies_text')}}</span></a></li>
            <?php 
             // echo classActivePathSub('episodes');
             // exit;
                  
            ?>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tv"></i><span>{{trans('words.tv_shows_text')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('series')}}"><a href="{{ URL::to('admin/series') }}" class="{{classActivePath('series')}}"><i class="fa fa-image"></i> <span> {{trans('words.shows_text')}}</span></a></li>
                <li class="{{classActivePath('season')}}"><a href="{{ URL::to('admin/season') }}" class="{{classActivePath('season')}}"><i class="fa fa-tree"></i> <span> {{trans('words.seasons_text')}}</span></a></li>
                <li class="{{classActivePath('episodes')}}"><a href="{{ URL::to('admin/episodes') }}" class="{{classActivePath('episodes')}}"><i class="fa fa-list"></i> <span> {{trans('words.episodes_text')}}</span></a></li>
              </ul>
            </li>

            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-futbol-o"></i><span>{{trans('words.sports_text')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('sports_category')}}"><a href="{{ URL::to('admin/sports_category') }}" class="{{classActivePath('sports_category')}}"><i class="fa fa-list"></i> <span> {{trans('words.sports_cat_text')}}</span></a></li>
                <li class="{{classActivePath('sports')}}"><a href="{{ URL::to('admin/sports') }}" class="{{classActivePath('sports')}}"><i class="fa fa-soccer-ball-o"></i> <span> {{trans('words.sports_video_text')}}</span></a></li>
               </ul>
            </li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-tv"></i><span>{{trans('words.live_tv')}}</span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('tv_category')}}"><a href="{{ URL::to('admin/tv_category') }}" class="{{classActivePath('tv_category')}}"><i class="fa fa-tags"></i> <span> {{trans('words.live_tv_category')}}</span></a></li>
                <li class="{{classActivePath('live_tv')}}"><a href="{{ URL::to('admin/live_tv') }}" class="{{classActivePath('live_tv')}}"><i class="fa fa-list"></i> <span> {{trans('words.tv_channel')}}</span></a></li>
               </ul>
            </li>
            <li class="has_sub"> 
              <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-sliders"></i><span>{{trans('words.home')}} </span> <span class="menu-arrow"></span></a>
              <ul class="list-unstyled">                 
                <li class="{{classActivePath('slider')}}"><a href="{{ URL::to('admin/slider') }}" class="{{classActivePath('slider')}}"><i class="fa fa-sliders"></i> <span> {{trans('words.slider')}}</span></a></li>
                <li class="{{classActivePath('home_section')}}"><a href="{{ URL::to('admin/home_section') }}" class="{{classActivePath('home_section')}}"><i class="fa fa-list"></i> <span> {{trans('words.home_section')}}</span></a></li>
               </ul>
            </li>

            </ul>

            @endif
 
            <!-- <li><a href="{{ URL::to('admin/language') }}" class="waves-effect {{classActivePath('language')}}"><i class="fa fa-language"></i> <span> Language</span></a></li> -->
            
          </ul>
        </div>
      </div>
    </div>