<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/login-page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="card">

        <div class="title">
            Log In
        </div>
       
        <form method="POST" action='/login'>
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <button type="submit">Log In</button>

        </form>

        

        <div class="register-link">
            Don't have an account? <a href="/register">Sign up</a>
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/pages/login.blade.php ENDPATH**/ ?>