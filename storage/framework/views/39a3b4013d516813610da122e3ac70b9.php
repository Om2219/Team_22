
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Roots</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo_updated.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

</head>


<body>

  
  <header>
    <nav>
                 
                   
        <div class= "top">
            <a href="/home"><button class = "logoButton"><img src="<?php echo e(Vite::asset('public/images/logo_updated.png')); ?>" class = "logo"></button></a>
            
            <!-- <form action="<?php echo e(route('products.search')); ?>" method="GET">  what it used to be-->
            <form action="<?php echo e(route('search')); ?>" method="GET">
              <input type="text" name="search" placeholder="What are you looking for?" class="headbut">
              <button type="submit" class = "bob">🐒</button>
            </form>

            <!--cba to make a model or controller for 1 button so put this stuff here-->
            <?php if(Auth::check()): ?>
                <a href="/account"><button class ="headbut"><img src="<?php echo e(Vite::asset('public/images/account.png')); ?>" class = "bob"><br>Account</button></a>
            <?php else: ?>
                <a href="/login"><button class ="headbut"><img src="<?php echo e(Vite::asset('public/images/account.png')); ?>" class = "bob"><br>Login</button></a>
                <a href="/register"><button class ="headbut"><img src="<?php echo e(Vite::asset('public/images/account.png')); ?>" class = "bob"><br>Register</button></a>
            <?php endif; ?>

            <a href="/basket"><button class ="headbut"><img src="<?php echo e(Vite::asset('public/images/basket.png')); ?>" class = "bob"><br>Basket</button></a>
        </div>
              
        <div class= "bottom">
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'ArtCraft')); ?>">Arts & Crafts</a></button>
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'Toys')); ?>">Toys</a></button>
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'Stationery')); ?>">Stationery</a></button>
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'Books')); ?>">Books</a></button>
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'Office')); ?>">Office Supplies</a></button>
                <button class ="headbut"><a href="/products">All products</a></button>
                <button class ="headbut"><a href="/aboutus">About Us</a></button>
                <button class ="headbut"><a href="/faq">FAQ</a></button>
                <button class ="headbut"><a href="/contactform">Contact us</a></button>
                <button class ="headbut"><a href="/ai">MONKEYS</a></button>
                </div>
    </nav>
  </header>


  
  <main class="container">
  <?php echo e($slot); ?>

  </main>


  
  <footer>
    <div>
       © Roots 

      

      <a href="/home"><button class = "iconbutton"><img src="<?php echo e(Vite::asset('public/images/youtube.png')); ?>" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="<?php echo e(Vite::asset('public/images/Facebook.png')); ?>" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="<?php echo e(Vite::asset('public/images/Instagram.png')); ?>" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="<?php echo e(Vite::asset('public/images/X.png')); ?>" class = "icon"></button></a>

    </div>

  </footer>
    
</body>
</html>
<?php /**PATH C:\Users\gurmu\Documents\GitHub\Team_22\resources\views/components/layout.blade.php ENDPATH**/ ?>