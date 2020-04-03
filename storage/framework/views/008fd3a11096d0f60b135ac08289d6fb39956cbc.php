<?php $__env->startSection("content"); ?>

  
  <div class="content-page">
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">

                <div class="row">
                  <div class="col-sm-3">
                     <select class="form-control select2" name="tv_cat_id" id="tv_cat_id">
                        <option value=""><?php echo e(trans('words.filter_by_cat')); ?></option>
                        <?php $__currentLoopData = $cat_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="?cat_id=<?php echo e($cat_data->id); ?>"><?php echo e($cat_data->category_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>  
                  <div class="col-md-3">
                     <?php echo Form::open(array('url' => 'admin/live_tv','class'=>'app-search','id'=>'search','role'=>'form','method'=>'get')); ?>   
                      <input type="text" name="s" placeholder="<?php echo e(trans('words.search_by_title')); ?>" class="form-control">
                      <button type="submit"><i class="fa fa-search"></i></button>
                    <?php echo Form::close(); ?>

                  </div>             
                <div class="col-md-3">
                  <a href="<?php echo e(URL::to('admin/live_tv/add_live_tv')); ?>" class="btn btn-success btn-md waves-effect waves-light m-b-20" data-toggle="tooltip" title="<?php echo e(trans('words.live_tv_add')); ?>"><i class="fa fa-plus"></i> <?php echo e(trans('words.live_tv_add')); ?></a>
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
                      <th><?php echo e(trans('words.live_tv_name')); ?></th>
                      <th><?php echo e(trans('words.live_tv_logo')); ?></th>
                      <th><?php echo e(trans('words.video_access')); ?></th>
                      <th><?php echo e(trans('words.status')); ?></th>                       
                      <th><?php echo e(trans('words.action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php $__currentLoopData = $live_tv_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $live_tv_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($live_tv_data->channel_name); ?></td>
                      <td><?php if(isset($live_tv_data->channel_thumb)): ?> <img src="<?php echo e(URL::to('upload/thumbs/'.$live_tv_data->channel_thumb)); ?>" alt="video image" class="thumb-lg bdr_radius"> <?php endif; ?></td>
                      <td><?php echo e($live_tv_data->channel_access); ?></td>
                      <td><?php if($live_tv_data->status==1): ?><span class="badge badge-success"><?php echo e(trans('words.active')); ?></span> <?php else: ?><span class="badge badge-danger"><?php echo e(trans('words.inactive')); ?></span><?php endif; ?></td>                     
                      <td>
                      <a href="<?php echo e(url('admin/live_tv/edit_live_tv/'.$live_tv_data->id)); ?>" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="<?php echo e(trans('words.edit')); ?>"> <i class="fa fa-edit"></i> </a>
                      <a href="<?php echo e(url('admin/live_tv/delete/'.$live_tv_data->id)); ?>" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('<?php echo e(trans('words.dlt_warning_text')); ?>')" data-toggle="tooltip" title="<?php echo e(trans('words.remove')); ?>"> <i class="fa fa-remove"></i> </a>           
                      </td>
                    </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                     
                     
                  </tbody>
                </table>
              </div>
                <nav class="paging_simple_numbers">
                <?php echo $__env->make('admin.pagination', ['paginator' => $live_tv_list], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                </nav>
           
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo $__env->make("admin.copyright", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.admin_app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\xampp\htdocs\laravel6_video_script_final\resources\views/admin/pages/live_tv_list.blade.php ENDPATH**/ ?>