<!DOCTYPE HTML>
<html lang="vi">
    <?php echo $__env->make('client.share.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <body>
        
        <div>
            <?php echo $__env->make('client.share.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('noi_dung'); ?>
            <?php echo $__env->make('client.share.partner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php echo $__env->make('client.share.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('client.share.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('js'); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Shop-laptop\resources\views/client/share/master.blade.php ENDPATH**/ ?>