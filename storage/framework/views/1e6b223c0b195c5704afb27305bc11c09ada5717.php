

<?php $__env->startSection("content"); ?>

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">

                <div class="row">
                  <div class="col-sm-3">
                     <select class="form-control" name="gateway_select" id="gateway_select">
                        <option value=""><?php echo e(trans('words.filter_by_gateway')); ?></option>
                         
                          <option value="?gateway=Paypal" <?php if(isset($_GET['gateway']) && $_GET['gateway']=='Paypal' ): ?> selected <?php endif; ?>>Paypal</option>
                          <option value="?gateway=Stripe" <?php if(isset($_GET['gateway']) && $_GET['gateway']=='Stripe' ): ?> selected <?php endif; ?>>Stripe</option>
                        
                    </select>
                  </div>  
                  <div class="col-md-4">
                     <?php echo Form::open(array('url' => 'admin/transactions','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')); ?>   
                      <input type="text" name="s" placeholder="<?php echo e(trans('words.search_by_payment_id_email')); ?>" class="form-control">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    <?php echo Form::close(); ?>

                  </div>             
                  <div class="col-md-5">
                  <a href="<?php echo e(URL::to('admin/transactions/export')); ?>" class="btn btn-info btn-md waves-effect waves-light m-b-20 pull-right" data-toggle="tooltip" title="<?php echo e(trans('words.export_transactions')); ?>"><i class="fa fa-file-excel-o"></i> <?php echo e(trans('words.export_transactions')); ?></a>
                  </div>
              </div><br/>
               
                <?php if(Session::has('flash_message')): ?>
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <?php echo e(Session::get('flash_message')); ?>

                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                 <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th><?php echo e(trans('words.name')); ?></th>
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
                      <td><a href="<?php echo e(url('admin/users/history/'.$transaction_data->user_id)); ?>" data-toggle="tooltip" title="User History"><?php echo e(\App\User::getUserFullname($transaction_data->user_id)); ?></a></td>
                      <td><?php echo e($transaction_data->email); ?></td>
                      <td><?php echo e(\App\SubscriptionPlan::getSubscriptionPlanInfo($transaction_data->plan_id,'plan_name')); ?></td>
                      <td><?php echo e(getcong('currency_code')); ?> <?php echo e($transaction_data->payment_amount); ?> </td>
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
        </div>
      </div>
      <?php echo $__env->make("admin.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/transactions_list.blade.php ENDPATH**/ ?>