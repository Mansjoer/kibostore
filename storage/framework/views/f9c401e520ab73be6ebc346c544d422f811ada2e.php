

<?php $__env->startSection('title'); ?>
Deposit
<?php $__env->stopSection(); ?>

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

    function upperCaseF(a) {
        setTimeout(function () {
            a.value = a.value.toUpperCase();
        }, 1);
    }

</script>

<?php $__env->startSection('content'); ?>
<div class="row row-cards">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(route('new-deposit')); ?>" method="POST" autocomplete="off">
                    <?php echo e(csrf_field()); ?>

                    <div class="mb-3">
                        <label class="form-label">Account Owner Name </label>
                        <input id="owner_name" onkeydown="upperCaseF(this)" type="text" class="form-control" name="owner_name" placeholder="Account Owner Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Input group</label>
                        <div class="input-group mb-2">
                            <span class="input-group-text">
                                Rp.
                            </span>
                            <input name="amount" type="number" class="form-control" placeholder="Amount" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Payment method</label>
                        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                            <label class="form-selectgroup-item flex-fill">
                                <input name="bank" type="radio" name="form-payment" value="BCA" class="form-selectgroup-input" checked>
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                    <div class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </div>
                                    <div>
                                        <span class="payment payment-provider-bca payment-xs me-2"></span>
                                        BCA <strong>Virtual Account</strong>
                                    </div>
                                </div>
                            </label>
                            <label class="form-selectgroup-item flex-fill">
                                <input name="bank" type="radio" name="form-payment" value="MANDIRI" class="form-selectgroup-input">
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                    <div class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </div>
                                    <div>
                                        <span class="payment payment-provider-mandiri payment-xs me-2"></span>
                                        Mandiri <strong>Virtual Account</strong>
                                    </div>
                                </div>
                            </label>
                            <label class="form-selectgroup-item flex-fill">
                                <input name="bank" type="radio" name="form-payment" value="BRI" class="form-selectgroup-input">
                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                    <div class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </div>
                                    <div>
                                        <span class="payment payment-provider-bri payment-xs me-2"></span>
                                        BRI <strong>Virtual Account</strong>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button class="btn btn-primary" type="submit"> New Deposit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="example no_toc_section">
                    <div class="example-content">
                        <h3 class="text-center">ATTENTION!</h3>
                    </div>
                </div>
                <div class="hr-text">
                    <span>BCA</span>
                </div>
                <div class="example no_toc_section">
                    <div class="example-content">
                        <p class="lh-lg">BCA <strong>Virtual Account</strong>
                            <br>
                            <strong>Online : </strong>00:00 - 22:30 WIB
                            <br>
                        </p>
                    </div>
                </div>
                <div class="hr-text">
                    <span>BRI</span>
                </div>
                <div class="example no_toc_section">
                    <div class="example-content">
                        <p class="lh-lg">BRI <strong>Virtual Account</strong>
                            <br>
                            <strong>Online : </strong>06:00 - 21:30 WIB
                            <br>
                        </p>
                    </div>
                </div>
                <div class="hr-text">
                    <span>MANDIRI</span>
                </div>
                <div class="example no_toc_section">
                    <div class="example-content">
                        <p class="lh-lg">Mandiri <strong>Virtual Account</strong>
                            <br>
                            <strong>Online : </strong>00:00 - 22:00 WIB
                            <br>
                        </p>
                    </div>
                </div>
                <div class="hr-text">
                    <span>NOTES</span>
                </div>
                <div class="example no_toc_section">
                    <div class="example-content">
                        <p class="lh-lg">If passing the online time, the deposit will be checked and processed the next day by kibostore.
                            <br>
                            <br>Please transfer according to the nominal and include the news listed so that it can be processed automatically.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kibostor/public_html/resources/views/admin/deposit/index.blade.php ENDPATH**/ ?>