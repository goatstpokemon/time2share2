
<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/login-page.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="card">

        <div class="title">
            Account aanmaken
        </div>
       
        <form method="POST" action='/register'>
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="name">Naam</label>
                <input id="name" type="text" name="name"  required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input id="password" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password-password_confirmation">Wachtwoord bevestigen</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required />
            </div>

            <button type="submit">Maak account aan</button>

        </form>

        

        <div class="register-link">
            Al een account? Log <a href="/login">hier</a> in
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/pages/register.blade.php ENDPATH**/ ?>