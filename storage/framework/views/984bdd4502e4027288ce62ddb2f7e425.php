
<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home-page.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="container">   
<section>
    <h1>Zoek resultaten</h1>
<?php if(count($results) > 0): ?>
  <ul>
  <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <section class="grid">
    <?php if (isset($component)) { $__componentOriginal4912e54b47cc540c8c40bfbaaa4ad898 = $component; } ?>
<?php $component = App\View\Components\Product::resolve(['name' => $result->name,'img' => $result->product_image,'return' => $result->return_date,'rented' => $result->rented_by,'rental' => $result->rental_started,'id' => $result->id] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
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
   
    
    </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
  </ul>
<?php else: ?>
  <p>geen resultaten</p>
<?php endif; ?>
</section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/pages/products/search.blade.php ENDPATH**/ ?>