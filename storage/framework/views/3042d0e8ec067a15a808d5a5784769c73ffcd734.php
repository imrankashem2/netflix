<?php $__env->startSection("content"); ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["<?php echo e(trans('words.this_year')); ?>", <?php $__currentLoopData = $plan_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> '<?php echo e($plan_data->plan_name); ?>', <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
          
          <?php for ($i = 1; $i <= 12; $i++)
            {
                //$month_name =date("M", strtotime("$i/12/10"));
                $month_name_full =date("F", strtotime("$i/12/10"));
                ?>
            
            ['<?php echo $month_name_full;?>', <?php $__currentLoopData = $plan_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan_data_obj): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo plan_count_by_month($plan_data_obj->id,$month_name_full);?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>],
            
            <?php  }?>
                     
        ]);

        var options = {
          chart: {
            title: "<?php echo e(trans('words.users_plan_statastics')); ?>",
            subtitle: "<?php echo e(trans('words.current_year')); ?>",
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    

<div class="content-page">
      <div class="content">
        <div class="container-fluid">
          
          <?php if(Auth::User()->usertype=="Admin"): ?>  
          <div class="row">
                    
                    <div class="col-xl-3 col-md-6">
                        <a href="<?php echo e(URL::to('admin/language')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-custom" data-plugin="counterup"><?php echo e($language); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.language_text')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    

                    <div class="col-xl-3 col-md-6">
                        <a href="<?php echo e(URL::to('admin/genres')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup"><?php echo e($genres); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.genres_text')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <a href="<?php echo e(URL::to('admin/movies')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-warning" data-plugin="counterup"><?php echo e($movies); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.movies_text')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <a href="<?php echo e(URL::to('admin/series')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-dark" data-plugin="counterup"><?php echo e($series); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.shows_text')); ?></h5>
                            </div>
                        </div>
                         </a>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <a href="<?php echo e(URL::to('admin/sports')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-success" data-plugin="counterup"><?php echo e($sports); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.sports_text')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>

                     <div class="col-xl-3 col-md-6">
                        <a href="<?php echo e(URL::to('admin/live_tv')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-danger" data-plugin="counterup"><?php echo e($livetv); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.live_tv')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                    <div class="col-xl-3 col-md-6">
                        <a href="<?php echo e(URL::to('admin/users')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-purple" data-plugin="counterup"><?php echo e($users); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.users')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>
 

                    <div class="col-xl-3 col-md-6">
                        <a href="<?php echo e(URL::to('admin/transactions')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-primary" data-plugin="counterup"><?php echo e($transactions); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.transactions')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-custom" data-plugin="counterup"><?php echo e($daily_amount); ?></h2>
                                <h5><?php echo e(trans('words.daily_revenue')); ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup"><?php echo e($weekly_amount); ?></h2>
                                <h5><?php echo e(trans('words.weekly_revenue')); ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-warning" data-plugin="counterup"><?php echo e($monthly_amount); ?></h2>
                                <h5><?php echo e(trans('words.monthly_revenue')); ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-success" data-plugin="counterup"><?php echo e($yearly_amount); ?></h2>
                                <h5><?php echo e(trans('words.yearly_revenue')); ?></h5>
                            </div>
                        </div>
                    </div>

                    
          </div>
          <div class="card-box table-responsive">
                 <div class="row">
                    <div class="col-xl-12" id="columnchart_material" style="height: 400px;"></div>
                </div> 
          </div>
          <?php else: ?>

                <div class="row">
                    
                    <div class="col-xl-4 col-md-6">
                        <a href="<?php echo e(URL::to('admin/language')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-custom" data-plugin="counterup"><?php echo e($language); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.language_text')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>
                    

                    <div class="col-xl-4 col-md-6">
                        <a href="<?php echo e(URL::to('admin/genres')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-pink" data-plugin="counterup"><?php echo e($genres); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.genres_text')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <a href="<?php echo e(URL::to('admin/movies')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-warning" data-plugin="counterup"><?php echo e($movies); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.movies_text')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <a href="<?php echo e(URL::to('admin/series')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-dark" data-plugin="counterup"><?php echo e($series); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.shows_text')); ?></h5>
                            </div>
                        </div>
                         </a>
                    </div>

                    <div class="col-xl-4 col-md-6">
                        <a href="<?php echo e(URL::to('admin/sports')); ?>">
                        <div class="card-box widget-user">
                            <div class="text-center">
                                <h2 class="text-success" data-plugin="counterup"><?php echo e($sports); ?></h2>
                                <h5 style="color: #343a40;"><?php echo e(trans('words.sports_text')); ?></h5>
                            </div>
                        </div>
                        </a>
                    </div>

                </div>    
          <?php endif; ?> 
        
        </div>

      </div>
      <?php echo $__env->make("admin.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\laravel6_video_script_final\resources\views/admin/pages/dashboard.blade.php ENDPATH**/ ?>