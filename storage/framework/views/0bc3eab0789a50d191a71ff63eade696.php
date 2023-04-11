<?php $__env->startSection('assets'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/product.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/overlay.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section class="container-show">
<img src="<?php echo e($product->product_image); ?>" alt="<?php echo e($product->name); ?>" width="200px" height="200px" class="sm-product-img">
    <h1><?php echo e($product->name); ?></h1>
    <span><h2>Eigenaar:</h2><a href="/users/<?php echo e($owner->id); ?>"> <?php echo e($owner->name); ?></a></span>
    <?php if($rentee): ?>
    <span><strong>Uitgeleend aan: </strong><p><?php echo e($rentee->name); ?></p></span>
    <?php endif; ?>
    <section class="flex-row space-between">    
    <?php if($product->rentable !== 1): ?>
    
    <span><strong>Start: </strong><p><?php echo e(date('d M', strtotime($product->rental_started))); ?></p></span>    
    <span><strong>Eind: </strong><p><?php echo e(date('d M', strtotime($product->return_date))); ?></p></span>
    </section>
    <section>
    <?php if($rentee && $rentee->id === $currentUser->id): ?>  
     <button type="submit" class="btn-return" id="open-overlay-return">Nu retourneren</button>
    
    <?php endif; ?>
    <?php endif; ?>
   </section>
    
    <?php if($product->rentable !== 0 && $product->user_id  !== $currentUser->id): ?>
    <button class="btn-beschikbaar" id="open-overlay-borrow">Nu lenen</button> 
    <?php endif; ?>
    <?php if($product->user_id  === $currentUser->id): ?>
    <a class="btn"  href="/products/<?php echo e($product->id); ?>/edit">Bijwerken</a> 
    <?php endif; ?>
     <section class="beschrijving">
        <h2>Beschrijving</h2>
        <p><?php echo e($product->description); ?></p>
    </section>

   
   
    <section class="overlay" id="overlay-borrow">        
        <div class="overlay-content" id="overlay-content-borrow">
        <h2>Product lenen</h2>
        <form class="flex flex-col " action="/products/<?php echo e($product->id); ?>/borrow" method="POST">
        <?php echo csrf_field(); ?>
        <label for="begin">Begin datum</label>
        <input type="date" id="begin" name="begin" class="datepicker">
        <label for="end">Eind datum</label>
        <input type="date" id="end" name="end" class="datepicker">
        <button type="submit" id="close-overlay-borrow">Submit</button>
        </form>
        
        </div>
    </section>

    <section class="overlay" id="overlay-return">
    <div class="overlay-content" id="overlay-content-return">
        <h2>Product retourneren</h2>
        <form class="flex flex-col " action="/products/<?php echo e($product->id); ?>/return" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
                        <label for="rating"><h1>Hoeveel sterren geef je de eigenaar?</h1></label>
                        <div class="rating">
                            <input type="radio" name="rating" id="rating-1" value="1">
                            <label for="rating-1"><i class="fa fa-star"></i></label>

                            <input type="radio" name="rating" id="rating-2" value="2">
                            <label for="rating-2"><i class="fa fa-star"></i></label>

                            <input type="radio" name="rating" id="rating-3" value="3">
                            <label for="rating-3"><i class="fa fa-star"></i></label>

                            <input type="radio" name="rating" id="rating-4" value="4">
                            <label for="rating-4"><i class="fa fa-star"></i></label>

                            <input type="radio" name="rating" id="rating-5" value="5">
                            <label for="rating-5"><i class="fa fa-star"></i></label>

                        </div>
                    </div>
        <div class="form-group">
            <label for="review"><h1>Vertel ons meer</h1></label>
            <textarea class="form-control" name="review" id="review" rows="10"></textarea>
        </div>
        <button type="submit" id="close-overlay-return">Submit</button>
        </form>
        
        </div>
    </section>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php if($product->rentable !== 0): ?>

<script  src="<?php echo e(asset('js/overlay.js')); ?>"></script>
<?php endif; ?>
<?php if($product->rentable !== 1): ?>
<script  src="<?php echo e(asset('js/ratings.js')); ?>"></script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Luke\Desktop\time2share2\resources\views/pages/products/show.blade.php ENDPATH**/ ?>