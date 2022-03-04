<?php $__env->startSection('title'); ?>
Order History
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row row-cards">
    <div class="col-sm-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table display" id="roles">
                    <thead>
                        <tr>
                            <th class="text-center">Product Code</th>
                            <th class="text-center">Account Data</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Invoice Id</th>
                            <th class="text-center">Total Amount</th>
                            <th class="text-center">Created At</th>
                            <th class="w-1 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($orderList->count() == 0): ?>
                        <td colspan="7" class="text-center">
                            No Order History.
                        </td>
                        <?php endif; ?>
                        <?php $__currentLoopData = $orderList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center" data-label="Name">
                                <?php echo e($data->product_sku); ?>

                            </td>
                            <td class="text-muted text-center" data-label="Display Name">
                                <?php echo e($data->customer_no); ?>

                            </td>
                            <td class="text-muted text-center" data-label="Display Name">
                                <span class="badge text-end <?php if($data->status == 'Sukses'): ?> text-green bg-green-lt <?php elseif($data->status == 'Pending'): ?> text-yellow bg-yellow-lt <?php elseif($data->status == 'Gagal'): ?>text-red bg-red-lt <?php elseif($data->status == 'Waiting'): ?>text-yellow bg-yellow-lt <?php endif; ?>"><?php if($data->status == 'Sukses'): ?> Success <?php elseif($data->status == 'Pending'): ?> Pending <?php elseif($data->status == 'Gagal'): ?> Canceled <?php elseif($data->status == 'Waiting'): ?> Waiting <?php endif; ?></span>
                            </td>
                            <td class="text-center" data-label="Name">
                                <a href="/admin/invoice/<?php echo e($data->slug); ?>"><?php echo e($data->slug); ?></a>
                            </td>
                            <td class="text-center" data-label="Name">
                                Rp. <?php echo e(number_format($data->price)); ?>

                            </td>
                            <td class="text-center" data-label="Name">
                                <?php echo e($data->created_at); ?>

                            </td>
                            <td class="text-center col-auto">
                                <div class="btn-list flex-nowrap">
                                    <a href="/admin/invoice/<?php echo e($data->slug); ?>" class="btn">
                                        View Invoice
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php echo e($orderList->links('admin.includes._pagination1')); ?>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function () {
        $('#roles').DataTable();
    });

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kibostor/public_html/resources/views/admin/orders/history.blade.php ENDPATH**/ ?>