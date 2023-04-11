<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/create-product-page.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/login-page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="card">

        <div class="title">
            Account Bijwerken
        </div>
       
        <form method="POST" action='/users/<?php echo e($user->id); ?>' enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="name">Naam</label>
                <input id="name" type="text" name="name" value=<?php echo e($user->name); ?>  required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e($user->email); ?>" required autofocus>
            </div>
             <label for="photo"><h3>Foto uploaden</h3></label>
                <img src="<?php echo e($user->profile_image); ?>" alt="<?php echo e($user->name); ?>" width="200px" height="200px" class="sm-product-img">
                <label class="custom-file-upload">    
                <input type="file" class="form-control-file" id="photos" name="photo"  accept="image/*"/>
                Een ander photo toevoegen
                </label>
            <button type="submit">Save</button>

        </form>

        

        

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/pages/user/edit.blade.php ENDPATH**/ ?>