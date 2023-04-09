
<figure class="large-card">
    
    <img src="<?php echo e($img); ?>" alt="<?php echo e($name); ?>" width="40px" height="40px" class="sm-product-img">
    <h1><?php echo e($name); ?></h1>
    <section class="flex-row space-between">
    <span><strong>Start: </strong><p><?php echo e(date('d M', strtotime($rental))); ?></p></span>
    
    <span><strong>End: </strong><p><?php echo e(date('d M', strtotime($return))); ?></p></span>
    </section>
    <a class="link" href="/products/<?php echo e($id); ?>">Bekijk</a>
    
</figure>
<?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/components/product.blade.php ENDPATH**/ ?>