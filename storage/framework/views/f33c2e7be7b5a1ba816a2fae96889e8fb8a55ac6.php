

<?php $__env->startSection('title'); ?>
Editing <?php echo e($products->product_sku); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

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

<div class="row row-cards justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="/admin/products/update/<?php echo e($products->slug); ?>" method="POST" autocomplete="off">
                    <?php echo e(csrf_field()); ?>

                    <div class="mb-3">
                        <label class="form-label">Product Code</label>
                        <input type="text" class="form-control" name="product_sku" placeholder="" required value="<?php echo e($products->product_sku); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="" required value="<?php echo e($products->name); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Seller Price</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                Rp.
                            </span>
                            <input name="seller_price" type="number" class="form-control" value="<?php echo e($products->seller_price); ?>" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                Rp.
                            </span>
                            <input name="price" type="number" class="form-control" value="<?php echo e($products->price); ?>" autocomplete="off" required>
                        </div>
                    </div>
                    <input name="profit" type="hidden">
                    <div class="row align-items-center">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button class="btn btn-dark" type="submit"> Update</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kibostor/public_html/resources/views/admin/products/edit.blade.php ENDPATH**/ ?>