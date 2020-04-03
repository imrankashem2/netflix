<div class="topbar">
      <div class="topbar-left"> 
        <a href="<?php echo e(URL::to('admin/dashboard')); ?>" class="logo">
          <span>
            <?php if(getcong('site_logo')): ?> 
            <img src="<?php echo e(URL::asset('upload/source/'.getcong('site_logo'))); ?>" alt="Site Logo" width="120">
            <?php else: ?>
            <img src="<?php echo e(URL::asset('site_assets/images/template/logo.png')); ?>" alt="Site Logo" width="120">           
            <?php endif; ?>
          </span>
          <i class="mdi mdi-layers"></i></a> </div>
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <ul class="nav navbar-nav list-inline navbar-left">
            <li class="list-inline-item">
              <button class="button-menu-mobile open-left"> <i class="mdi mdi-menu"></i> </button>
            </li>
            <li class="list-inline-item">
              <h4 class="page-title"><?php echo e($page_title); ?></h4>
            </li>
          </ul>
          <nav class="navbar-custom">
            <ul class="list-unstyled topbar-right-menu float-right mb-0">
              <li>
                <!-- Notification -->
                <div class="notification-box">
                    <ul class="list-inline mb-0">
                        <li>
                            <a href="<?php echo e(URL::to('/')); ?>" class="right-bar-toggle" data-toggle="tooltip" title="Front End" target="_blank">
                                <i class="fa fa-desktop"></i>
                            </a>
                             
                        </li>
                    </ul>
                </div>
                <!-- End Notification bar -->
            </li> 
              <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#"
                  role="button" aria-haspopup="false" aria-expanded="false">

                  <?php if(file_exists(public_path('upload/'.Auth::user()->user_image))): ?>                                 
 
                  <img src="<?php echo e(URL::to('upload/'.Auth::user()->user_image)); ?>" alt="person" class="rounded-circle" />
                  
                  <?php else: ?>
                      
                  <img src="<?php echo e(URL::asset('admin_assets/images/users/avatar-10.jpg')); ?>" alt="person" class="rounded-circle" />
                  
                  <?php endif; ?>

                 </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                  <a href="<?php echo e(URL::to('admin/profile')); ?>" class="dropdown-item notify-item">
                    <i class="ti-user m-r-5"></i> <?php echo e(trans('words.profile')); ?>

                  </a>
                  <a href="<?php echo e(URL::to('admin/logout')); ?>" class="dropdown-item notify-item">
                    <i class="ti-power-off m-r-5"></i> <?php echo e(trans('words.logout')); ?>

                  </a>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div><?php /**PATH G:\xampp\htdocs\laravel6_video_script_final\resources\views/admin/topbar.blade.php ENDPATH**/ ?>