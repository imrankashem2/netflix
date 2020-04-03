<footer class="text-white">
  <div class="vfx_footer_widget">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-sm-4 col-xs-12">
          <div class="widget vfx_category_widget">
            <div class="vfx_inner_widget">
              <ul class="vfx_widget_cat">
                @foreach(\App\Pages::where('status','1')->orderBy('id')->get() as $page_data)
                <li class="cat"><a href="{{ URL::to('page/'.$page_data->page_slug) }}">{{$page_data->page_title}}</a></li>
                @endforeach                   
              </ul>
            </div>
      <p class="vfx_copyright_text">{{stripslashes(getcong('site_copyright'))}}</p>
          </div>
        </div>
    <div class="col-md-2 col-sm-4 col-xs-12">
          <div class="widget about-widget">
        <h3 class="vfx_widget_title">{{trans('words.connect_with_us')}}</h3>   
            <div class="vfx_inner_widget">       
              <div class="vfx_footer_social">
                <div class="socials"> 
          <a href="{{stripslashes(getcong('footer_fb_link'))}}" target="_blank"><i class="fa fa-facebook"></i></a> 
          <a href="{{stripslashes(getcong('footer_twitter_link'))}}" target="_blank"><i class="fa fa-twitter"></i></a> 
          <a href="{{stripslashes(getcong('footer_instagram_link'))}}" target="_blank"><i class="fa fa-instagram"></i></a>           
        </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="widget app-widget vfx_last_widget">
            <h3 class="vfx_widget_title">{{trans('words.apps_text')}}</h3>
            <div class="vfx_inner_widget mr_top"> <a class="google-play-download" href="{{stripslashes(getcong('footer_google_play_link'))}}" target="_blank"><img src="{{ URL::asset('site_assets/images/icons/google-play.png') }}" alt="Google Play Download"></a> <a class="apple-store-download" href="{{stripslashes(getcong('footer_apple_store_link'))}}" target="_blank"><img src="{{ URL::asset('site_assets/images/icons/app-store.png') }}" alt="Apple Store Download"></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="loginAlertModal" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">{{trans('words.login_alert')}}</h4>
        </div>
        <div class="modal-body">
          <p>{{trans('words.login_alert_msg1')}} <a href="{{ URL::to('login') }}" style="text-transform: uppercase;">{{trans('words.login_text')}}</a> {{trans('words.login_alert_msg2')}}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('words.close')}}</button>
        </div>
      </div>      
    </div>
  </div>
  
</footer>