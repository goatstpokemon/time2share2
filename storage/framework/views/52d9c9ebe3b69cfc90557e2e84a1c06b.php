<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/grid.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/flex.css')); ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
<?php echo $__env->yieldContent('assets'); ?>
 
    <title>Time2Share</title>
</head>
<body>
    <section class="mb-nav">
    <span class="logo-mob logo"><a href="/" ><span class="blue" >Time</span>2Share</a></span>
    <nav class="mobile-nav">
    <button class="hamburger">
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
        <span class="hamburger-line"></span>
    </button>
    <ul class="mobile-nav-menu">
        <li><a href="/products">Alle</a></li>
        <li><a href="/products/borrowed">Uitgeleend</a></li>
        <li><a href="/products/borrowing">Aan het lenen</a></li>
        <li>
         <form action="/logout" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit">Logout</button>
        </form>
    </li>
    </ul>
</nav>
</section>
    <section class="desktop">
    <?php if (isset($component)) { $__componentOriginald31f0a1d6e85408eecaaa9471b609820 = $component; } ?>
<?php $component = App\View\Components\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald31f0a1d6e85408eecaaa9471b609820)): ?>
<?php $component = $__componentOriginald31f0a1d6e85408eecaaa9471b609820; ?>
<?php unset($__componentOriginald31f0a1d6e85408eecaaa9471b609820); ?>
<?php endif; ?>
    <?php echo $__env->yieldContent('content'); ?>

    
    
</section>

<?php echo $__env->yieldContent('scripts'); ?>
<script  src="<?php echo e(asset('js/nav.js')); ?>"></script>
</body>
</html><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/layout.blade.php ENDPATH**/ ?>