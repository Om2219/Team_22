<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    
 
    <div class="productsBox ">
    
       <div>
       <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <img src="<?php echo e(asset('images/products/' . $image->product_image)); ?>" alt="<?php echo e($product->name); ?>" class = "imageIcon">
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
 
        <div>
            <h2><?php echo e($product->name); ?></h2>
            <p>£<?php echo e($product->price); ?><p>
        
            <form action="<?php echo e(route('basket.add', $product->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <label for="quantity">Quantity:</label><br><br>
                <input type="number" name="quantity" id="quantity" value="1" min="1"><br><br>
                <button class = "save-btn" type="submit">Add to basket</button>
            </form>
            <p>In Stock:<br><?php echo e($product->stock->stock); ?><p>
        </div>
    </div><br>
    <h2>Product Information</h2>
    <p><?php echo e($product->product_description); ?><p>
 
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\Users\haide\Herd\Team_22\resources\views/product.blade.php ENDPATH**/ ?>