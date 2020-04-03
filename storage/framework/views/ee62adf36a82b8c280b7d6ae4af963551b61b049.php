<?php
// config
$link_limit = 8; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

<?php if($paginator->lastPage() > 1): ?>

<div class="col-xs-12"> 
        <nav class="navigation pagination" role="navigation">
          <div class="nav-links">

    <ul>
        <li class="<?php echo e(($paginator->currentPage() == 1) ? ' disabled' : ''); ?>">
            <a class="prev page-numbers" href="<?php echo e($paginator->url(1)); ?>">&laquo;</a>
         </li>
        <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>
            <?php
            $half_total_links = floor($link_limit / 2);
            $from = $paginator->currentPage() - $half_total_links;
            $to = $paginator->currentPage() + $half_total_links;
            if ($paginator->currentPage() < $half_total_links) {
               $to += $half_total_links - $paginator->currentPage();
            }
            if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
            }
            ?>
            <?php if($from < $i && $i < $to): ?>
                <li class="<?php echo e(($paginator->currentPage() == $i) ? ' current' : ''); ?>">
                    <a class="page-numbers <?php echo e(($paginator->currentPage() == $i) ? ' current' : ''); ?>" href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>
        <li class="<?php echo e(($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : ''); ?>">
            <a class="next page-numbers" href="<?php echo e($paginator->url($paginator->lastPage())); ?>">&raquo;</a>
        </li>
    </ul>

        </div>
    </nav>
</div>    
<?php endif; ?>

           <?php /**PATH /home3/viavilab/public_html/videostreaming/resources/views/_particles/pagination.blade.php ENDPATH**/ ?>