
<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/create-product-page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="m-10per">
<form action="/products/<?php echo e($product->id); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <h1 class="text-center">Product Aanpassen</h1>
    <label for="name"><h3>Product naam</h3></label>
    <input type="text" name="name" id="name" value="<?php echo e($product->name); ?>">
    <label for="category"><h3>Product categorie</h3></label>
    <input type="text" name="category" id="category" value="<?php echo e($product->category); ?>">
    <label for="description"><h3>Product beschrijving</h3></label>
    <textarea name="description" id="description"><?php echo e($product->description); ?></textarea>   
    <label for="photo"><h3>Foto uploaden</h3></label>
    <img src="<?php echo e($product->product_image); ?>" alt="<?php echo e($product->name); ?>" width="200px" height="200px" class="sm-product-img">
    <label class="custom-file-upload">    
    <input type="file" class="form-control-file" id="photos" name="photo"  accept="image/*"/>
    Een ander photo toevoegen
    </label>

    <button type="submit">Save</button>
</form>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/pages/products/edit.blade.php ENDPATH**/ ?>