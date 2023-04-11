<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home-page.css')); ?>">
<?php $__env->stopSection(); ?>
<?php
$counter = 0;
?>


<?php $__env->startSection('content'); ?>
<div class="container">    
    <h1>Welkom <?php echo e($user->name); ?></h1>
    <section class="buttons">
        <a class="create" href="/products/create">Product aanmaken</a>
    </section>
       <section class="flex-col">
   <h2>Aan het lenen</h2> 
   <section class="flex-row">
    <?php $__currentLoopData = $rentedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rentedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
     <?php if($counter < 3): ?>
     <?php
    
    ?>
    <?php if (isset($component)) { $__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898 = $component; } ?>
<?php $component = App\View\Components\Product::resolve(['name' => $rentedProduct->name,'img' => $rentedProduct->product_image,'return' => $rentedProduct->return_date,'rented' => $rentedProduct->rented_by,'rental' => $rentedProduct->rental_started,'id' => $rentedProduct->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Product::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898)): ?>
<?php $component = $__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898; ?>
<?php unset($__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898); ?>
<?php endif; ?>
        <?php
    $counter++;
    ?>
    
    <?php endif; ?>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></section>
</section>
   <section class="flex-col">
   <h2>Niet uitgeleende producten</h2> 
   <section class="flex-row">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($product->rentable != false ): ?>
     <?php if($counter < 3): ?>
     <?php
    
    ?>
    <?php if (isset($component)) { $__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898 = $component; } ?>
<?php $component = App\View\Components\Product::resolve(['name' => $product->name,'img' => $product->product_image,'return' => $product->return_date,'rented' => $product->rented_by,'rental' => $product->rental_started,'id' => $product->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Product::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898)): ?>
<?php $component = $__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898; ?>
<?php unset($__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898); ?>
<?php endif; ?>
        <?php
    $counter++;
    ?>
    <?php endif; ?>
    <?php endif; ?>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></section>
</section>
<section class="flex-col">
    <h2>Uitgeleende producten</h2>
    <section class="flex-row">
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($product->rentable != true ): ?>
    <?php if (isset($component)) { $__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898 = $component; } ?>
<?php $component = App\View\Components\Product::resolve(['name' => $product->name,'img' => $product->product_image,'return' => $product->return_date,'rented' => $product->rented_by,'rental' => $product->rental_started,'id' => $product->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Product::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898)): ?>
<?php $component = $__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898; ?>
<?php unset($__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898); ?>
<?php endif; ?>
    <?php endif; ?>
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></section>
</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/home.blade.php ENDPATH**/ ?>