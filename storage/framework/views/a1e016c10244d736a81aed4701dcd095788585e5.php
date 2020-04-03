

<?php $__env->startSection("content"); ?>

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">

                <div class="row">
                  <div class="col-sm-3">
                     <select class="form-control" name="plan_select" id="plan_select">
                        <option value=""><?php echo e(trans('words.filter_by_plan')); ?></option>
                         <?php $__currentLoopData = \App\SubscriptionPlan::orderBy('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="?plan_id=<?php echo e($plan_data->id); ?>"><?php echo e($plan_data->plan_name); ?></option>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="col-md-3">
                     <?php echo Form::open(array('url' => 'admin/users','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')); ?>   
                      <input type="text" name="s" placeholder="<?php echo e(trans('words.search_by_name_email')); ?>" class="form-control">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    <?php echo Form::close(); ?>

                  </div>             
                <div class="col-md-3">
                  <a href="<?php echo e(URL::to('admin/users/add_user')); ?>" class="btn btn-success btn-md waves-effect waves-light m-b-20" data-toggle="tooltip" title="<?php echo e(trans('words.add_user')); ?>"><i class="fa fa-plus"></i> <?php echo e(trans('words.add_user')); ?></a>
                </div>
                <div class="col-md-3">
                  <a href="<?php echo e(URL::to('admin/users/export')); ?>" class="btn btn-info btn-md waves-effect waves-light m-b-20 pull-right" data-toggle="tooltip" title="<?php echo e(trans('words.export_user')); ?>"><i class="fa fa-file-excel-o"></i> <?php echo e(trans('words.export_user')); ?></a>
                </div>
              </div>

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
                      <th><?php echo e(trans('words.phone')); ?></th>
                      <th><?php echo e(trans('words.status')); ?></th>                        
                      <th><?php echo e(trans('words.action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $__currentLoopData = $user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $user_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($user_data->name); ?></td>
                      <td><?php echo e($user_data->email); ?></td>
                      <td><?php echo e($user_data->phone); ?></td>
                      <td><?php if($user_data->status==1): ?><span class="badge badge-success"><?php echo e(trans('words.active')); ?></span> <?php else: ?><span class="badge badge-danger"><?php echo e(trans('words.inactive')); ?></span><?php endif; ?></td>
                                             
                      <td>
                      <a href="<?php echo e(url('admin/users/history/'.$user_data->id)); ?>" class="btn btn-icon waves-effect waves-light btn-primary m-b-5 m-r-5" data-toggle="tooltip" title="<?php echo e(trans('words.user_history')); ?>"> <i class="fa fa-eye"></i> </a>
                      <a href="<?php echo e(url('admin/users/edit_user/'.$user_data->id)); ?>" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="<?php echo e(trans('words.edit')); ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo e(url('admin/users/delete/'.$user_data->id)); ?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('<?php echo e(trans('words.dlt_warning_text')); ?>')" data-toggle="tooltip" title="<?php echo e(trans('words.remove')); ?>"> <i class="fa fa-remove"></i> </a>           
                      </td>
                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                     
                     
                  </tbody>
                </table>
              </div>
                <nav class="paging_simple_numbers">
                <?php echo $__env->make('admin.pagination', ['paginator' => $user_list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo $__env->make("admin.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/admin/pages/user_list.blade.php ENDPATH**/ ?>