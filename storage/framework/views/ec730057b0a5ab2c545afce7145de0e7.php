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
    <h1> Add product</h1>
    
    <form action="<?php echo e(route('products.store')); ?>" method ="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div>
            <label>Product Name</label><br>
            <input type="text" name="name" value="<?php echo e(old('name')); ?>" required>
        </div>
        <br>
        <div>
            <label>Category</label><br>
            <input type="text" name="category_name" value="<?php echo e(old('category_name')); ?>" required>
        </div>
        <br>
        <div>
            <label>Description</label><br>
            <textarea name="product_description"><?php echo e(old('product_description')); ?></textarea>
        </div>
        
        <br>

        <div>
            <label>Price</label><br>
            <input type="number" step="0.01" name="price" value="<?php echo e(old('price')); ?>" required>
        </div>

        <br>

        <div>
            <label>Product Images</label><br>
            <input type="file" name="product_image" accept="image/*">
        </div>
        <br>
        <button type ="submit">Add Product</button>
        
        <?php if($errors->any()): ?>
        <div style="color: red; margin-top: 10px;">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?><?php /**PATH C:\Users\haide\Herd\Team_22\resources\views/create.blade.php ENDPATH**/ ?>