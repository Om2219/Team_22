
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roots</title>
    <link rel="icon" type="image/png" href="<?php echo e(Vite::asset('resources/images/logo_updated.png')); ?>">
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>


<body>

  
  <header>
    <nav>
                 
                   
        <div class= "top">
            <a href="/home"><button class = "logoButton"><img src="<?php echo e(Vite::asset('resources/images/logo_updated.png')); ?>" class = "logo"></button></a>
            <input type="text" name="search" placeholder="What are you looking for?">
            <a href="/account"><button class ="headbut"><img src="<?php echo e(Vite::asset('resources/images/account.png')); ?>" class = "bob"><br>Account</button></a>
            <a href="/basket"><button class ="headbut"><img src="<?php echo e(Vite::asset('resources/images/basket.png')); ?>" class = "bob"><br>Basket</button></a>
            </div>
              
        <div class= "bottom">
                <button class ="headbut"><a href="/home">Arts & Crafts</a></button>
                <button class ="headbut"><a href="/home">Stationary</a></button>
                <button class ="headbut"><a href="/home">Books</a></button>
                <button class ="headbut"><a href="/home">eBooks</a></button>
                <button class ="headbut"><a href="/home">Office Supplies</a></button>
                </div>
    </nav>
  </header>


  
  <main class="container">
  <?php echo e($slot); ?>

  </main>


  
  <footer>
    <div>
       © Roots 

      

      <a href="/home"><button class = "iconbutton"><img src="<?php echo e(Vite::asset('resources/images/youtube.png')); ?>" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="<?php echo e(Vite::asset('resources/images/Facebook.png')); ?>" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="<?php echo e(Vite::asset('resources/images/Instagram.png')); ?>" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="<?php echo e(Vite::asset('resources/images/X.png')); ?>" class = "icon"></button></a> 

    </div>

  </footer>
    
</body>
</html>
<?php /**PATH C:\Users\haide\Downloads\GitHub\Team_22\resources\views/components/layout.blade.php ENDPATH**/ ?>