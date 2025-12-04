
<!DOCTYPE html>
<html lang="en">

{{-- Page top with facion and page name --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roots</title>
    <link rel="icon" type="image/png" href="{{ Vite::asset('public/images/logo_updated.png') }}">
    @vite('public/css/app.css')
</head>

{{-- The body of a page which can be applied to all pages so we only edit one layout --}}
<body>

  {{-- Header for all pages --}}
  <header>
    <nav>
                 
          {{-- top of the nav bar and contains the logo, search bar,, the users account, the users basked--}}         
        <div class= "top">
            <a href="/home"><button class = "logoButton"><img src="{{ Vite::asset('public/images/logo_updated.png') }}" class = "logo"></button></a>
            <input type="text" name="search" placeholder="What are you looking for?">
            <a href="/login"><button class ="headbut"><img src="{{ Vite::asset('public/images/account.png') }}" class = "bob"><br>Login</button></a>
            <a href="/register"><button class ="headbut"><img src="{{ Vite::asset('public/images/account.png') }}" class = "bob"><br>Register</button></a>

            <a href="/basket"><button class ="headbut"><img src="{{ Vite::asset('public/images/basket.png') }}" class = "bob"><br>Basket</button></a>
            </div>
          {{-- bottom of nav bar and contains our 5 catagoires with links, and if you hover over it gives you more specific options--}}    
        <div class= "bottom">
                <button class ="headbut"><a href="{{ route('products.cat', 'ArtCraft')}}">Arts & Crafts</a></button>
                <button class ="headbut"><a href="{{ route('products.cat', 'Toys')}}">Toys</a></button>
                <button class ="headbut"><a href="{{ route('products.cat', 'Stationery')}}">Stationery</a></button>
                <button class ="headbut"><a href="{{ route('products.cat', 'Books')}}">Books</a></button>
                <button class ="headbut"><a href="{{ route('products.cat', 'Office')}}">Office Supplies</a></button>
                <button class ="headbut"><a href="/products">All products</a></button>
                <button class ="headbut"><a href="/aboutus">About Us</a></button>
                <button class="headbut"><a href="/faq">FAQ</a></button>
                <button class="headbut"><a href="/contactform">Contact us</a></button>
                </div>
    </nav>
  </header>


  {{-- the main informaton for all pages --}}
  <main class="container">
  {{$slot}}
  </main>


  {{-- footer for all pages --}}
  <footer>
    <div>
       © Roots 

      {{-- WE NEED TO DIRECT THESE PAGS TO SOMEWHERE--}}

      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/youtube.png') }}" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/Facebook.png') }}" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/Instagram.png') }}" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/X.png') }}" class = "icon"></button></a>

    </div>

  </footer>
    
</body>
</html>
