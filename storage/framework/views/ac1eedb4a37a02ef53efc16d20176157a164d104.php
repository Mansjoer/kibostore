

<?php $__env->startSection('title'); ?>
Editing <?php echo e($games->display_name); ?>

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
                <form action="/admin/games/update/<?php echo e($games->slug); ?>" method="POST" autocomplete="off">
                    <?php echo e(csrf_field()); ?>

                    <div class="mb-3">
                        <label class="form-label">Game Code</label>
                        <input type="text" class="form-control" name="name" placeholder="" required value="<?php echo e($games->name); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="display_name" placeholder="" required value="<?php echo e($games->display_name); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image Link</label>
                        <input name="image" type="text" class="form-control" placeholder="" value="<?php echo e($games->image); ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Is Active?</label>
                        <div class="form-selectgroup">
                            <label class="form-selectgroup-item ">
                                <input type="radio" name="status" value="1" class="form-selectgroup-input" <?php if($games->status == '1'): ?> checked="" <?php endif; ?>>
                                <span class="form-selectgroup-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 icon-tabler icon-tabler-check " width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 12l5 5l10 -10"></path>
                                    </svg>
                                    Online</span>
                            </label>
                            <label class="form-selectgroup-item">
                                <input type="radio" name="status" value="0" class="form-selectgroup-input" <?php if($games->status == '0'): ?> checked="" <?php endif; ?>>
                                <span class="form-selectgroup-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1 icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                    Offline</span>
                            </label>
                        </div>
                    </div>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kibostor/public_html/resources/views/admin/games/edit.blade.php ENDPATH**/ ?>