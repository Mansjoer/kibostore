<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terminal</title>
    <link href="<?php echo e(asset('vendor/terminal/css/terminal.css')); ?>" rel="stylesheet"/>
    <style>
        html, body{
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        #tracy-debug-bar {
            display: none;
        }
    </style>
</head>
<body>
    <div id="terminal-shell"></div>
    <script src="<?php echo e(asset('vendor/terminal/js/terminal.js')); ?>"></script>
    <script>
    (function() {
        new Terminal("#terminal-shell", <?php echo $options; ?>);
    })();
    </script>
</body>
</html><?php /**PATH /home/kibostor/public_html/resources/views/vendor/terminal/index.blade.php ENDPATH**/ ?>