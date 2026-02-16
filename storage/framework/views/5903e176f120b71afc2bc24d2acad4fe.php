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
   
    



    <div class="animBg">
        
        <img src="<?php echo e(asset('images/bg.png')); ?>">
    </div>

    <img id="pen" src="<?php echo e(asset('images/Pen.png')); ?>">

    <div class="dos">
        
        <div class="home-master">

            <section class="hero">
                <div class="home-banner">
                    <img src="/images/logo_updated.png">

                    <div class="business-description">
                        <h1>Roots, where creativity comes to thrive</h1>
                        <p>
                            At Roots, we sell products such as books, toys, stationery, 
                            and more. These can be viewed below:
                        </p>
                    </div>
                </div>
            </section>

            <section class="scroll-section dos">
                <!-- This section exists just to give scroll space -->
            </section>



            <section class="collections">
                <h2>Browse Our Collections</h2>

                <div class="categories">
                    <a href="/products/ArtCraft" class="category-box">
                        <h3>Arts & Crafts</h3>
                        <p>Arts & Crafts for artists and painters.</p>
                    </a>

                    <a href="/products/Toys" class="category-box">
                        <h3>Toys</h3>
                        <p>Toys such as action figures and toy cars.</p>
                    </a>

                    <a href="/products/Stationery" class="category-box">
                        <h3>Stationery</h3>
                        <p>Stationery for students.</p>
                    </a>

                    <a href="/products/Books" class="category-box">
                        <h3>Books</h3>
                        <p>Books by Roots.</p>
                    </a>

                    <a href="/products/Office" class="category-box">
                        <h3>Office Supplies</h3>
                        <p>Office supplies for workers.</p>
                    </a>
                </div>
            </section>

        </div>
        
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
<?php endif; ?><?php /**PATH C:\Users\gurmu\Documents\GitHub\Team_22\resources\views/index.blade.php ENDPATH**/ ?>