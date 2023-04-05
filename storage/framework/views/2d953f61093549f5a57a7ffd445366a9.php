
<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/create-product-page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<form action="/products/create" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <h1 class="text-center">Product aanmaken</h1>
    <label for="name"><h3>Product naam</h3></label>
    <input type="text" name="name" id="name">
    <label for="description"><h3>Product beschrijving</h3></label>
    <textarea name="description" id="description"></textarea>   
    <label for="add-file"><h3>Foto uploaden</h3></label>
    <label class="custom-file-upload">
    <input name="add-file" type="file"/>
    Voeg een foto toe
    </label>

    <button type="submit">Save</button>
</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/pages/products/createProduct.blade.php ENDPATH**/ ?>