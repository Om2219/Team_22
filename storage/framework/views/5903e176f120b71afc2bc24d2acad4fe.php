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
   
    <div class="home-master">
        <div class="home-banner">
            <img src="/images/logo_updated.png">
            <div class="business-description">
                <h1>Roots, where creativity comes to thrive</h1> <!--slogan-->
                <p>At Roots, we sell products such as books, toys, stationery, and more. These can be viewed below:</p> <!--website description-->
                <a href="/products" class="allProducts">Shop All Products</a>
            </div>
        </div>

        <h2>Browse Our Collections</h2>

        <section class="category-section">
            <div class="categories">
                <a href="/products/ArtCraft" class="category-box">
                    <h3>Arts & Crafts</h3>
                    <p>Arts & Crafts for artists and painters to work with, and for people to enjoy their hobbies.</p>
                </a>
            
                <a href="/products/Toys" class="category-box">
                    <h3>Toys</h3>
                    <p>Toys such as action figures and toy cars for children to play with.</p>
                </a>

                <a href="/products/Stationery" class="category-box">
                    <h3>Stationery</h3>
                    <p>Stationery for students, to help with their studies.</p>
                </a>

                <a href="/products/Books" class="category-box">
                    <h3>Books</h3>
                    <p>Books by Roots, for people to read through in their own time.</p>
                </a>

                <a href="/products/Office" class="category-box">
                    <h3>Office Supplies</h3>
                    <p>Office supplies so workers never miss out on their necessary supplies.</p>
                </a>
            </div>
        </section>
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