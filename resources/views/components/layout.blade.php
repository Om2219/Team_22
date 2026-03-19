<!DOCTYPE html>
<html lang="en">
<script>
  if (localStorage.getItem("modeStatus") === "true") {
    document.documentElement.dataset.bsTheme = "dark";
  } else {
    document.documentElement.dataset.bsTheme = "light";
  }
</script>
{{-- Page top with facion and page name --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Roots</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo_updated.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.9.0/fonts/remixicon.css" rel="stylesheet"/>
    <style>
    /* making it so that the admin theme has a different colour */
    .admin-theme header,
    .admin-theme .blockUno,
    .admin-theme .blockDos,
    .admin-theme .blocktres,
    .admin-theme footer {
        background-color: #b2ddec
    }

    .admin-theme .allProducts,
    .admin-theme .save-btn {
        background-color: #b2ddec;
    }

    .admin-theme .headbut {
        background-color: #061156;
        color: #b2ddec;
    }

    .admin-theme .headbut a {
        background-color: #061156;
        color: #b2ddec;
    }

    .admin-theme .category-box:hover {
        background-color: #b2ddec;
    }

    .admin-theme .allProducts:hover,
    .admin-theme .save-btn:hover {
        background-color: #b2ddec;
    }
    .admin-theme img[src*="Mint.png"] {
        content: url('/images/Blue.png');
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .admin-icon{
        color: #061156;
    }
    .admin-theme img[src*="admin logo.png"] {
        width: 200px;
        height: auto;
        object-fit: contain;
    }

  </style>
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
{{-- The body of a page which can be applied to all pages so we only edit one layout --}}
<body class="{{ Auth::check() && Auth::user()->role === 'admin' ? 'admin-theme' : '' }}">

  {{-- Header for all pages --}}
      <header> 
        <nav class="container-fluid">
          {{-- top of the nav bar and contains the logo, search bar,, the users account, the users basked--}}         
          <div class= "d-flex align-items-center justify-content-between mb-3">

            <a href="/home" class = "navbar-brand">
              @if(Auth::check() && Auth::user()->role === 'admin')
                <img src="{{ Vite::asset('public/images/Admin logo.png') }}" class = "logo">
                @else
                  <img src="{{ Vite::asset('public/images/logo_updated.png') }}" class = "logo">
                @endif
            </a>

            <form action="{{ route('search') }}" method="GET" class="d-flex form-control me-5">
              <input type="text" name="search" placeholder="What are you looking for?" class="form-control me-2">
              <button type="submit" class="btn btn-outline-success">🐒</button>
            </form>

            <div class="d-flex align-items-center gap-4">
              <!--cba to make a model or controller for 1 button so put this stuff here-->
              @if (Auth::check())
                  <a href="/account" class="nav-icon-link d-flex flex-column align-items-center text-white text-decoration-none"><i class="bi bi-person-circle fs-3 {{ Auth::check() && Auth::user()->role === 'admin' ? 'admin-icon' : '' }}"></i><span class="{{ Auth::check() && Auth::user()->role === 'admin' ? 'admin-icon' : ''}}">Account</span></a>
              @else
                  <a href="/login" class="btn btn-light btn-sm rounded-pill px-3">Login</a>
                  <a href="/register" class="btn btn-light btn-sm rounded-pill px-3">Register</a>
              @endif

              <a href="/basket" class="nav-icon-link d-flex flex-column align-items-center text-white text-decoration-none"><i class="bi bi-basket fs-3 {{ Auth::check() && Auth::user()->role === 'admin' ? 'admin-icon' : '' }}"></i><span class="{{ Auth::check() && Auth::user()->role === 'admin' ? 'admin-icon' : '' }}">Basket</span></a>
            </div>
          </div>
          {{-- bottom of nav bar and contains our 5 categories with links, and if you hover over it gives you more specific options--}}    
          <div class= "d-flex justify-content-center flex-wrap gap-3 border-top pt-4">
              <button class ="headbut"><a href="/aboutus" class="text-green text-decoration-none">About Us</a></button>
              <button class ="headbut"><a href="/products" class="text-green text-decoration-none">All Products</a></button>        
              <button class ="headbut"><a href="{{ route('products.cat', 'ArtCraft')}}" class="text-green text-decoration-none">Arts & Crafts</a></button>
              <button class ="headbut"><a href="{{ route('products.cat', 'Books')}}" class="text-green text-decoration-none">Books</a></button>
              <button class ="headbut"><a href="{{ route('products.cat', 'Office')}}" class="text-green text-decoration-none">Office Supplies</a></button>
              <button class ="headbut"><a href="{{ route('products.cat', 'Stationery')}}" class="text-green text-decoration-none">Stationery</a></button>
              <button class ="headbut"><a href="{{ route('products.cat', 'Toys')}}" class="text-green text-decoration-none">Toys</a></button>
              <button class ="headbut"><a href="{{ route('products.cat', 'rewards')}}" class="text-green text-decoration-none">Rewards</a></button>
              <button class ="headbut"><a href="/contactform" class="text-green text-decoration-none">Contact Us</a></button>
              <button class ="headbut"><a href="/faq" class="text-green text-decoration-none">FAQ</a></button>
              <button id ="aiBtn" class ="headbut"><a class="text-green text-decoration-none">AI Chatbot</a></button>
              <button id ="darkBtn" class ="headbut"><a id="mTxt" class="text-green text-decoration-none"></a></button>  
          </div><br> 
        </nav> 
      </header>


  {{-- the main information for all pages --}}
  <main class="container">
    {{-- the script containing the functions required upon opening the page--}}
    <script> 
    window.onload = function() {
      let aiChatbot = document.getElementById("chatbot");
      let chatbotBtn = document.getElementById("aiBtn");
      aiChatbot.style.display="none";
      chatbotBtn.onclick = function() {
        if (aiChatbot.style.display === "none"){
          aiChatbot.style.display = "block";
        } else {
          aiChatbot.style.display = "none"
        }
      }

      let modeStatus = localStorage.getItem('modeStatus') === 'true';
      let dBtn = document.getElementById("darkBtn");
      let modeText = document.getElementById("mTxt");
      if(modeStatus == false) {
          modeText.textContent = "Dark Mode";
          document.documentElement.dataset.bsTheme = "light"
        } else {
          modeText.textContent = "Light Mode";
          document.documentElement.dataset.bsTheme = "dark"
        }
      dBtn.onclick = function() {
        modeStatus = !modeStatus;
        console.log("dark mode is ", modeStatus);
      
        if(modeStatus == false) {
          modeText.textContent = "Dark Mode";
          document.documentElement.dataset.bsTheme = "light"
        } else {
          modeText.textContent = "Light Mode";
          document.documentElement.dataset.bsTheme = "dark"
        }
        localStorage.setItem('modeStatus', modeStatus);
      } 
    };
    </script>
  @include("ai")
  {{$slot}}
    <!--<div class="animBg">
        {{-- we can change the background to something more fitting this is tempoary --}}
        <img src="{{ asset('images/Mint.png') }}">
    </div>-->
  </main>


  {{-- footer for all pages --}}
  <footer>
    <div class="container">
      {{-- WE NEED TO DIRECT THESE PAGES TO SOMEWHERE--}}

      {{-- <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/youtube.png') }}" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/Facebook.png') }}" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/Instagram.png') }}" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/X.png') }}" class = "icon"></button></a> --}}
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
                <li class="list-group-item"><a href="/account" class="text-light text-decoration-none">Accounts page</a></li>
                <li class="list-group-item"><a href="/order" class="text-light text-decoration-none">My Orders</a></li>
                <li class="list-group-item"><a href="/reward" class="text-light text-decoration-none">Rewards</a></li>
              </ul>
          </div>

          <div class="col">
            <h6>Need Help?</h6>
              <ul class="list-unstyled">
                <li class="list-group-item"><a href="/aboutus" class="text-light text-decoration-none">About Us</a></li>
                <li class="list-group-item"><a href="/faq" class="text-light text-decoration-none">FAQ</a></li>
                <li class="list-group-item"><a href="/contactform" class="text-light text-decoration-none">Contact Us</a></li>
              </ul>
          </div>
        </div>
      </div>
      Products are subject to availability. © Copyright 2026 Roots All rights reserved. 

    </div>

  </footer>
    
</body>
</html>
