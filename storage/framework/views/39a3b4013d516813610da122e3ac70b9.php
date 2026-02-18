
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Roots</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo_updated.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet"/>
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>

<body>

  
  <header>
    <nav class="container-fluid">
                 
                   
        <div class= "d-flex align-items-center justify-content-between mb-3">

            <a href="/home" class = "navbar-brand"><img src="<?php echo e(Vite::asset('public/images/logo_updated.png')); ?>" class = "logo"></a>

            <form action="<?php echo e(route('search')); ?>" method="GET" class="d-flex form-control me-5">
              <input type="text" name="search" placeholder="What are you looking for?" class="form-control me-2">
              <button type="submit" class="btn btn-outline-success">🐒</button>
            </form>

            <div class="d-flex align-items-center gap-4">
              <!--cba to make a model or controller for 1 button so put this stuff here-->
              <?php if(Auth::check()): ?>
                  <a href="/account" class="nav-icon-link d-flex flex-column align-items-center text-white text-decoration-none"><i class="bi bi-person-circle fs-3 text-white"></i>Account</a>
              <?php else: ?>
                  <a href="/login" class="btn btn-light btn-sm rounded-pill px-3">Login</a>
                  <a href="/register" class="btn btn-light btn-sm rounded-pill px-3">Register</a>
              <?php endif; ?>

              <a href="/basket" class="nav-icon-link d-flex flex-column align-items-center text-white text-decoration-none"><i class="bi bi-basket fs-3 text-white"></i>Basket</a>
              
            </div>
        </div>
              
        <div class= "d-flex justify-content-center flex-wrap gap-3 border-top pt-4">
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'ArtCraft')); ?>" class="text-green text-decoration-none">Arts & Crafts</a></button>
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'Toys')); ?>" class="text-green text-decoration-none">Toys</a></button>
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'Stationery')); ?>" class="text-green text-decoration-none">Stationery</a></button>
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'Books')); ?>" class="text-green text-decoration-none">Books</a></button>
                <button class ="headbut"><a href="<?php echo e(route('products.cat', 'Office')); ?>" class="text-green text-decoration-none">Office Supplies</a></button>
                <button class ="headbut"><a href="/products" class="text-green text-decoration-none">All products</a></button>
                <button class ="headbut"><a href="/aboutus" class="text-green text-decoration-none">About Us</a></button>
                <button class ="headbut"><a href="/faq" class="text-green text-decoration-none">FAQ</a></button>
                <button class ="headbut"><a href="/contactform" class="text-green text-decoration-none">Contact us</a></button>
                <button class ="headbut"><a href="/ai" class="text-green text-decoration-none">MONKEYS</a></button>
        </div><br>
    </nav>
  </header>


  
  <main class="container">
  <?php echo e($slot); ?>

  </main>


  
  <footer>
    <div class="container">
      

      
      <div class="container text-center">
        <div class="row align-items-start">

          <div class="col">
            <h6>Create. Craft. Bananas</h6>
              <a href="/home" class="text-light me-3 fs-5"><i class="bi bi-youtube"></i></a>
              <a href="/home" class="text-light me-3 fs-5"><i class="bi bi-facebook"></i></a>
              <a href="/home" class="text-light me-3 fs-5"><i class="bi bi-instagram"></i></a>
              <a href="/home" class="text-light fs-5"><i class="bi bi-twitter-x"></i></a>
          </div>

          <div class="col">
            <h6>Useful Links</h6>
              <ul class="list-unstyled">
                <li class="list-group-item"><a href="/home" class="text-light text-decoration-none">Accounts page</a></li>
                <li class="list-group-item"><a href="/home" class="text-light text-decoration-none">My Orders</a></li>
                <li class="list-group-item"><a href="/home" class="text-light text-decoration-none">Track Parcel</a></li>
              </ul>
          </div>

          <div class="col">
            <h6>Need Help?</h6>
              <ul class="list-unstyled">
                <li class="list-group-item"><a href="/aboutus" class="text-light text-decoration-none">About Us</a></li>
                <li class="list-group-item"><a href="/faq" class="text-light text-decoration-none">FAQ</a></li>
                <li class="list-group-item"><a href="/ai" class="text-light text-decoration-none">Ai assistant</a></li>
              </ul>
          </div>
        </div>
      </div>
      Products are subject to availability. © Copyright 2026 Roots All rights reserved. 

    </div>

  </footer>
    
</body>
</html>
<?php /**PATH C:\Users\gurmu\Documents\GitHub\Team_22\resources\views/components/layout.blade.php ENDPATH**/ ?>