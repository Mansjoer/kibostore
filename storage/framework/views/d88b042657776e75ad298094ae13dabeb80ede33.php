<!-- Libs JS -->
<!-- Tabler Core -->
<script src="<?php echo e(asset('admin/js/tabler.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/demo.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/iziToast.js')); ?>"></script>
<script src="<?php echo e(asset('js/hitungwr.js')); ?>"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<?php echo $__env->make('vendor.lara-izitoast.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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


<?php echo Toastr::message(); ?>


<script type="text/javascript">
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function startTime() {
        var asiaDhaka = new Date().toLocaleString([], {
            timeZone: "Asia/Jakarta"
        });
        var today = new Date(asiaDhaka);

        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        // add a zero in front of numbers<10
        var isFormat12H = true;
        var ampm = "";
        if (isFormat12H) {
            ampm = h >= 12 ? " PM" : " AM";
            h = h % 12;
            h = h ? h : 12;
        }
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById("time").innerHTML = h + ":" + m + ":" + s + ampm;
        t = setTimeout(function () {
            startTime();
        }, 1000);
    }
    startTime();

</script>
<?php /**PATH /home/kibostor/public_html/resources/views/admin/includes/_script.blade.php ENDPATH**/ ?>