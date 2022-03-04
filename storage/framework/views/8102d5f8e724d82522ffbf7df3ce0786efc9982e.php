

<?php $__env->startSection('title'); ?>
<?php echo e($invoiceSlug->slug); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('searchbar'); ?>
<div class="col-auto ms-auto d-print-none">
    <?php if($invoiceSlug->status == 'Waiting'): ?>
    <a href="/admin/invoice/proceed/<?php echo e($invoiceSlug->slug); ?>" type="submit" class="btn btn-green btn-icon">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
           <path d="M5 12l5 5l10 -10"></path>
        </svg>
    </a>
    <a href="/admin/invoice/cancel/<?php echo e($invoiceSlug->slug); ?>" type="submit" class="btn btn-red btn-icon">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
           <line x1="18" y1="6" x2="6" y2="18"></line>
           <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
    </a>
    <?php endif; ?>
    <button type="button" class="btn btn-dark btn-icon" onclick="javascript:window.print();">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
            <rect x="7" y="13" width="10" height="8" rx="2"></rect>
        </svg>
    </button>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row row-cards justify-content-center">
    <div class="col-sm-8">
        <div class="card card-lg">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p class="h3">Store Info</p>
                        <address>
                            Kibostore.id <br>
                            <?php echo e($invoiceStatus->user->name); ?><br>
                            <?php echo e($invoiceData->created_at); ?>

                        </address>
                    </div>
                    <div class="col-6 text-end">
                        <p class="h3">Order Status</p>
                        <address>
                            <span class="badge text-end <?php if($invoiceStatus->status == 'Sukses'): ?> text-green bg-green-lt <?php elseif($invoiceStatus->status == 'Pending'): ?> text-yellow bg-yellow-lt <?php elseif($invoiceStatus->status == 'Gagal'): ?>  text-red bg-red-lt <?php elseif($invoiceStatus->status == 'Waiting'): ?> text-yellow bg-yellow-lt <?php endif; ?>"><?php if($invoiceStatus->status == 'Sukses'): ?> Success <?php elseif($invoiceStatus->status == 'Pending'): ?> Pending <?php elseif($invoiceStatus->status == 'Gagal'): ?> Canceled <?php elseif($invoiceStatus->status == 'Waiting'): ?> Waiting For Payment <?php endif; ?></span>
                        </address>
                    </div>
                    <div class="col-12 my-5">
                        <h1><?php echo e($invoiceSlug->slug); ?></h1>
                    </div>
                </div>
                <table class="table table-transparent table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 1%"></th>
                            <th>Product</th>
                            <th class="text-center" style="width: 1%">Account Data</th>
                            <th class="text-end" style="width: 1%">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $invoiceData->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center">1 </td>
                            <td>
                                <p class="strong mb-1"><?php echo e($item->product_sku); ?></p>
                                <div class="text-muted"><?php echo e($item->name); ?></div>
                            </td>
                            <td class="text-center"><?php echo e($invoiceData->customer_no); ?> </td>
                            <td class="text-end">
                                <?php echo e(number_format($item->price)); ?>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="font-weight-bold text- text-end">Total Amount</td>
                            <td class="font-weight-bold text-end"><?php echo e(number_format($invoiceData->price)); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <p class="text-muted text-center mt-5">Thank you very much for making a purchase at Kibostore. Please enjoy your day!</p>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kibostor/public_html/resources/views/admin/invoices/index.blade.php ENDPATH**/ ?>