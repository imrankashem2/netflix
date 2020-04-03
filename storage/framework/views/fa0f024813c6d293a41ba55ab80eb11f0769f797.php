<?php $__env->startSection('head_title', 'Page Not Found | '.getcong('site_name') ); ?>

<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection('content'); ?>
  
 
<div class="page-header">
  <div class="vfx_page_header_overlay">
    <div class="container">
      <div class="vfx_breadcrumb">
      <ul>
         <li><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
         <li>Page Not Found</li>      
      </ul>  
    </div>
  </div>
  </div>
</div>

<div class="main-wrap">
  <div class="section">
    <div class="container">
      <div class="row section-padding" style="text-align:center;padding:80px 0;">
        <span class="clt-content" style="margin-bottom:0"><h2 style="font-size:170px;font-weight:800;color: #eb1536;margin-bottom:0px;">404</</h2></span>        
      </div>
      
    </div>
  </div>
</div>
 

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/errors/404.blade.php ENDPATH**/ ?>