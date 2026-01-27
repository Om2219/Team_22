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

    <h1>My Basket</h1>

    <div class="MasterBasketBox">

        <?php if($basket->isEmpty()): ?>
            <p>The basket is currently empty.</p>
        <?php else: ?>
        <div class="basket-container">

            <div class="basket_items">
                <?php $__currentLoopData = $basket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="basket-item">
                        <img src="<?php echo e(asset('images/products/' . $product->product_image)); ?>" 
                            alt="<?php echo e($product->name); ?>" width="200">
                        <p><?php echo e($product->name); ?></p>
                        <p>Price: £<?php echo e($product->price); ?></p>
                        <?php if(session('error')): ?> <?php echo e(session('error')); ?> <?php endif; ?>
                        <form action="<?php echo e(route('basket.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <label for="quantity<?php echo e($product->product_id); ?>">Quantity:</label>
                            <input type="number" name="quantity" value="<?php echo e($product->quantity); ?>"  min="1"> 
                            <input type="hidden" name="product_id" value="<?php echo e($product->product_id); ?>">
                            <button type="submit" class="save-btn">Update Quantity</button>
                        </form>

                        <p>Total: £<?php echo e(number_format($product->price * $product->quantity, 2)); ?></p>

                        <form action="<?php echo e(route('basket.remove', $product->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to remove this item?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="save-btn" type="submit">Remove</button>
                        </form>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="basket_total">
                <p>Grand total: £<?php echo e(number_format($totalPrice, 2)); ?></p>
            </div>

            <div class = "basket-master"> <!--keeping this outside the container-->
                <button class="save-btn"><a href="/checkout">Checkout</a></button>
            </div>
        </div>
        <?php endif; ?>
    
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH C:\Users\gurmu\Documents\GitHub\Team_22\resources\views/basket.blade.php ENDPATH**/ ?>