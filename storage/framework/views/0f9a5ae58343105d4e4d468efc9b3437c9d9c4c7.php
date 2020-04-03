

<?php $__env->startSection("content"); ?>

 
 
  <div class="content-page">
      <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="bg-picture card-box">

                                    <div class="p-t-10 pull-right"><?php if($user->status==1): ?><span class="badge badge-success"><?php echo e(trans('words.active')); ?></span> <?php else: ?><span class="badge badge-danger"><?php echo e(trans('words.inactive')); ?></span><?php endif; ?></div>

                                    <div class="profile-info-name">
                                        
                                        <?php if($user->user_image): ?>
                                          <img src="<?php echo e(URL::asset('upload/'.$user->user_image)); ?>" class="img-thumbnail" alt="profile_img" style="width: 155px">
                                        <?php else: ?>  
                                          <img src="<?php echo e(URL::asset('site_assets/images/avatar.jpg')); ?>" class="img-thumbnail" alt="profile_img" style="width: 155px">
                                        <?php endif; ?>


                                        <div class="profile-info-detail">
                                            <h4 class="m-0"><?php echo e($user->name); ?></h4>
                                             <p class="text-muted m-b-20"><b><?php echo e(trans('words.email')); ?>:</b> <?php echo e($user->email); ?> <br/><b><?php echo e(trans('words.phone')); ?>:</b> <?php echo e($user->phone); ?></p>
                                              
                                            <p class="text-muted m-b-20"><b><?php echo e(trans('words.address')); ?>:</b> <?php echo e($user->user_address); ?></p>

                                            
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <!--/ meta -->

                                 
                            </div>

                            <div class="col-sm-4">
                                <div class="card-box">
                                     

                                    <h4 class="header-title m-t-0 m-b-30"><?php echo e(trans('words.subscription_plan')); ?></h4>

                                    <ul class="list-group m-b-0 user-list">
                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="avatar">
                                                    <i class="mdi mdi-circle text-primary"></i>
                                                </div>
                                                <div class="user-desc">
                                                    <span class="name"><?php echo e(\App\SubscriptionPlan::getSubscriptionPlanInfo($user->plan_id,'plan_name')); ?></span>
                                                    <span class="desc"><?php echo e(trans('words.current_plan')); ?></span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#" class="user-list-item">
                                                <div class="avatar">
                                                    <i class="mdi mdi-circle text-success"></i>
                                                </div>
                                                <div class="user-desc">
                                                    <span class="name"><?php if($user->exp_date): ?><?php echo e(date('F,  d, Y',$user->exp_date)); ?><?php endif; ?></span>
                                                    <span class="desc"><?php echo e(trans('words.subscription_expires_on')); ?></span>
                                                </div>
                                            </a>
                                        </li>
 
                                    </ul>
                                </div>


                                 

                            </div>


                        </div>
                        <div class="row">
                          <div class="col-sm-12">
                               
                            <div class="card-box">

                              <h4 class="header-title m-t-0 m-b-30"><?php echo e(trans('words.user_transactions')); ?></h4>
                              <div class="table-responsive">
                               <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th><?php echo e(trans('words.email')); ?></th>
                                      <th><?php echo e(trans('words.plan')); ?></th>
                                      <th><?php echo e(trans('words.amount')); ?></th>
                                      <th><?php echo e(trans('words.payment_gateway')); ?></th>
                                      <th><?php echo e(trans('words.payment_id')); ?></th>
                                      <th><?php echo e(trans('words.payment_date')); ?></th>                      
                                       
                                    </tr>
                                  </thead>
                                  <tbody>
                                   <?php $__currentLoopData = $transactions_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $transaction_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($transaction_data->email); ?></td>
                                      <td><?php echo e(\App\SubscriptionPlan::getSubscriptionPlanInfo($transaction_data->plan_id,'plan_name')); ?></td>
                                      <td><?php echo e(getcong('currency_code')); ?> <?php echo e($transaction_data->payment_amount); ?></td>
                                      <td><?php echo e($transaction_data->gateway); ?></td>
                                      <td><?php echo e($transaction_data->payment_id); ?></td>
                                      <td><?php echo e(date('M d Y h:i A',$transaction_data->date)); ?></td>                                              
                                       
                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     
                                     
                                     
                                  </tbody>
                                </table>
                              </div>  
                                <nav class="paging_simple_numbers">
                                <?php echo $__env->make('admin.pagination', ['paginator' => $transactions_list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                                </nav>          
                            </div>
                          </div> 
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->
      <?php echo $__env->make("admin.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div> 
  

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/user_history.blade.php ENDPATH**/ ?>