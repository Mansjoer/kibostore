<?php if($paginator->hasPages()): ?>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <ul class="pagination ">
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="page-item page-prev <?php if($paginator->onFirstPage()): ?> disabled <?php endif; ?> ">
                    <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" tabindex="-1" aria-disabled="true">
                        <div class="page-item-subtitle">previous</div>
                        <div class="page-item-title">Page</div>
                    </a>
                </li>
                <li class="page-item page-next <?php if($paginator->hasMorePages()): ?> <?php else: ?> disabled <?php endif; ?>">
                    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>">
                        <div class="page-item-subtitle">next</div>
                        <div class="page-item-title">Page</div>
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /home/kibostor/public_html/resources/views/admin/includes/_pagination1.blade.php ENDPATH**/ ?>