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

<h1 class = "Ah">Account Home</h1>

<div class = "MasterAccountBox">

    <div class = "accountBox">
    <h2>My Orders</h2>
    <p> Track, Return, Cancel</p>
    <button class = "headbut"><a href="/order">Check My Orders</a></button>
    </div>

    <div class = "accountBox">
        <h2>My Details</h2>
        <p> Manage Passwords, Email and Phone Number </p>
        <button class = "headbut"><a href="/contactdetail">Edit My Details</a></button>
    </div>

    <div class = "accountBox">
        <h2>Customer Service</h2>
        <p> Need Help</p>
        <button class = "headbut"><a href="/faq">Click here</a></button>
    </div>

    <div class = "accountBox">
        <h2>Sign Out</h2>
        <p> Sign Out Of Your Account</p>
        <button class = "headbut"><a href="/order">Sign Out</a></button>
    
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
<?php endif; ?><?php /**PATH C:\Users\haide\Downloads\GitHub\Team_22\resources\views/account.blade.php ENDPATH**/ ?>