
<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/product.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="container-show">
<img src="<?php echo e($product->product_image); ?>" alt="<?php echo e($product->name); ?>" width="200px" height="200px" class="sm-product-img">
    <h1><?php echo e($product->name); ?></h1>
    <span><h2>Eigenaar:</h2><a href="/users/<?php echo e($eigenaar->id); ?>"> <?php echo e($eigenaar->name); ?></a></span>
    <section class="flex-row space-between">    
    <?php if($product->rentable !== 1): ?>
    <span><strong>Uitgeleend aan: </strong><p><?php echo e($lener->rented_by); ?></p></span>
    <span><strong>Start: </strong><p><?php echo e(date('d M', strtotime($product->rental))); ?></p></span>    
    <span><strong>Eind: </strong><p><?php echo e(date('d M', strtotime($product->return))); ?></p></span>
    <?php endif; ?>
    <?php if($product->rentable !== 0): ?>
    <a class="btn-beschikbaar" href="">Nu lenen</a> <?php endif; ?>
    </section>

    <section class="beschrijving">
        <h2>Beschrijving</h2>
        <p><?php echo e($product->description); ?></p>
    </section>
   
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/pages/products/show.blade.php ENDPATH**/ ?>