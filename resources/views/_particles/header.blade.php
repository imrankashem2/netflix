<nav class="navbar navbar-default" data-spy="affix" data-offset-top="220">
  <div class="container"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav-collapse" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      @if(getcong('site_logo'))
        <a class="navbar-brand" href="{{ URL::to('/') }}"> <img src="{{ URL::asset('upload/source/'.getcong('site_logo')) }}" alt="Site Logo"> </a> 
      @else
        <a class="navbar-brand" href="{{ URL::to('/') }}"> <img src="{{ URL::asset('site_assets/images/template/logo.png') }}" alt="Site Logo"> </a>          
      @endif
      
  </div>
    <div class="collapse navbar-collapse" id="main-nav-collapse">      
      <ul class="nav navbar-nav navbar-left">        
        <li class="dropdown"> <a href="{{ URL::to('series') }}">{{trans('words.tv_shows_text')}}</a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::to('language/series') }}">{{trans('words.language_text')}}</a></li>
            <li><a href="{{ URL::to('genres/series') }}">{{trans('words.genres_text')}}</a></li> 
          </ul>
        </li>  
        <li class="dropdown"> <a href="{{ URL::to('movies') }}">{{trans('words.movies_text')}}</a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::to('language/movies') }}">{{trans('words.language_text')}}</a></li>
            <li><a href="{{ URL::to('genres/movies') }}">{{trans('words.genres_text')}}</a></li> 
          </ul>
        </li>
        <li class="dropdown"> <a href="{{ URL::to('sports') }}">{{trans('words.sports_text')}}</a>
          <ul class="dropdown-menu">
            @foreach(\App\SportsCategory::where('status','1')->orderBy('category_name')->get() as $sports_cat)
            <li><a href="{{ URL::to('sports/'.$sports_cat->category_slug) }}">{{$sports_cat->category_name}}</a></li>
            @endforeach 
          </ul>
        </li>
        <li class="dropdown"> <a href="{{ URL::to('live-tv') }}">{{trans('words.live_tv')}}</a>
          <ul class="dropdown-menu">
            @foreach(\App\TvCategory::where('status','1')->orderBy('category_name')->get() as $tv_cat)
            <li><a href="{{ URL::to('live-tv/'.$tv_cat->category_slug) }}">{{$tv_cat->category_name}}</a></li>
            @endforeach 
          </ul>
        </li>
         
      </ul>
      <div class="header_top_search">       
      {!! Form::open(array('url' => 'search','class'=>'navbar-form navbar-left','id'=>'search','role'=>'form','method'=>'get')) !!}  
        <input type="search" name="s" placeholder="{{trans('words.search')}}" required>
        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
      {!! Form::close() !!}

     
      @if(Auth::check())

      @if(Auth::User()->usertype =="Admin" OR Auth::User()->usertype =="Sub_Admin")
      <div class="user-menu">
        <div class="user-name">
          <span>            
            @if(Auth::User()->user_image AND file_exists(public_path('upload/'.Auth::User()->user_image)))
                  <img src="{{ URL::asset('upload/'.Auth::User()->user_image) }}" alt="profile_img">
            @else  
              <img src="{{ URL::asset('site_assets/images/avatar.jpg') }}" alt="profile_img">
            @endif  
          </span>
          Hi, {{ Str::limit(Auth::User()->name,6)}}</div>
        <ul class="content-user">
          <li><a href="{{ URL::to('admin/dashboard') }}"><i class="fa fa-dashboard"></i> {{trans('words.dashboard_text')}}</a></li>
          <li><a href="{{ URL::to('admin/logout') }}"><i class="fa fa-sign-out"></i> {{trans('words.logout')}}</a></li>
        </ul>
      </div>
      @else
      <div class="user-menu">
        <div class="user-name">
          <span>
            @if(Auth::User()->user_image AND file_exists(public_path('upload/'.Auth::User()->user_image)))
                  <img src="{{ URL::asset('upload/'.Auth::User()->user_image) }}" alt="profile_img">
            @else  
              <img src="{{ URL::asset('site_assets/images/avatar.jpg') }}" alt="profile_img">
            @endif
          </span>
          Hi, {{ Str::limit(Auth::User()->name,6)}}</div>
        <ul class="content-user">
          <li><a href="{{ URL::to('dashboard') }}"><i class="fa fa-dashboard"></i> {{trans('words.dashboard_text')}}</a></li>       
           <li><a href="{{ URL::to('profile') }}"><i class="fa fa-cog"></i> {{trans('words.profile')}}</a></li>
          <li><a href="{{ URL::to('logout') }}"><i class="fa fa-sign-out"></i> {{trans('words.logout')}}</a></li>
        </ul>
      </div>
      @endif

      @else

        <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ URL::to('login') }}" style="text-transform: uppercase;">{{trans('words.login_text')}}</a></li>
        </ul> 
        
      @endif 
      
      </div>
    </div>
  </div>
</nav>