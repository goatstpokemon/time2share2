 
<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/home-page.css')); ?>" />
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>
<div class="container">
  <section class="fix-mob">
    <h2>Alle producten</h2>

    <section class="search-container">
      <form method="GET" action="/products/search" class="search">
        <input type="text" name="q" placeholder="Zoek naar product" />
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>
    </section>
<section>
    <h3>Categories</h3>    
    <section class="overflow-x">
       <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      
        
        <a class="category" href="/products/filter/<?php echo e($product->category); ?>">
          <?php echo e($product->category); ?>

        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
      </section>
    </section>      
    
    
      
    

    <section class="grid animate overflow-y">
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

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

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </section>
  </section>
</div>
<?php $__env->stopSection(); ?> <?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('js/animations.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/pages/products/index.blade.php ENDPATH**/ ?>