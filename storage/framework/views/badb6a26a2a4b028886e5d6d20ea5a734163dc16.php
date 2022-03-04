

<?php $__env->startSection('title'); ?>
Order Game
<?php $__env->stopSection(); ?>

<?php $__env->startSection('searchbar'); ?>

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

</style>

<script>
    $('body').keypress(function (e) {
        if (e.keyCode == 13) {
            $('#search').submit();
        }
    });

</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row row-cards">
    <?php $__currentLoopData = $datagame; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $games): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="card-body p-4 text-center">
                <span class="avatar avatar-xl mb-3 avatar-rounded-3" style="background-image: url(<?php echo e($games->image); ?>)"></span>
                <h3 class="m-0 mb-1"><?php echo e($games->display_name); ?></h3>
            </div>
            <div class="d-flex">
                <a href="/admin/order/<?php echo e($games->slug); ?>" class="bg-dark card-btn">
                    Select
                </a>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo e($datagame->links('admin.includes._pagination1')); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kibostor/public_html/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>