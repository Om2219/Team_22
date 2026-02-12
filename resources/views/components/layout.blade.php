
<!DOCTYPE html>
<html lang="en">

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
</head>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK" crossorigin="anonymous"></script>
{{-- The body of a page which can be applied to all pages so we only edit one layout --}}
<body>

  {{-- Header for all pages --}}
  <header>
    <nav>
                 
          {{-- top of the nav bar and contains the logo, search bar,, the users account, the users basked--}}         
        <div class= "top">
            <a href="/home"><button class = "logoButton"><img src="{{ Vite::asset('public/images/logo_updated.png') }}" class = "logo"></button></a>
            {{--<input type="text" name="search" placeholder="What are you looking for?" class="searchBar">--}}
            <form action="{{ route('search') }}" method="GET">
              <input type="text" name="search" placeholder="What are you looking for?" class="headbut">
              <button type="submit" class = "bob">🐒</button>
            </form>

            <!--cba to make a model or controller for 1 button so put this stuff here-->
            @if (Auth::check())
                <a href="/account"><button class ="headbut"><img src="{{ Vite::asset('public/images/account.png') }}" class = "bob"><br>Account</button></a>
            @else
                <a href="/login"><button class ="headbut"><img src="{{ Vite::asset('public/images/account.png') }}" class = "bob"><br>Login</button></a>
                <a href="/register"><button class ="headbut"><img src="{{ Vite::asset('public/images/account.png') }}" class = "bob"><br>Register</button></a>
            @endif

            <a href="/basket"><button class ="headbut"><img src="{{ Vite::asset('public/images/basket.png') }}" class = "bob"><br>Basket</button></a>
        </div>
          {{-- bottom of nav bar and contains our 5 categories with links, and if you hover over it gives you more specific options--}}    
        <div class= "bottom">
                <button class ="headbut"><a href="{{ route('products.cat', 'ArtCraft')}}">Arts & Crafts</a></button>
                <button class ="headbut"><a href="{{ route('products.cat', 'Toys')}}">Toys</a></button>
                <button class ="headbut"><a href="{{ route('products.cat', 'Stationery')}}">Stationery</a></button>
                <button class ="headbut"><a href="{{ route('products.cat', 'Books')}}">Books</a></button>
                <button class ="headbut"><a href="{{ route('products.cat', 'Office')}}">Office Supplies</a></button>
                <button class ="headbut"><a href="/products">All products</a></button>
                <button class ="headbut"><a href="/aboutus">About Us</a></button>
                <button class ="headbut"><a href="/faq">FAQ</a></button>
                <button class ="headbut"><a href="/contactform">Contact us</a></button>
                <button class ="headbut"><a href="/ai">MONKEYS</a></button>
                </div>
    </nav>
  </header>


  {{-- the main information for all pages --}}
  <main class="container">
  {{$slot}}
  </main>


  {{-- footer for all pages --}}
  <footer>
    <div>
       © Roots 

      {{-- WE NEED TO DIRECT THESE PAGES TO SOMEWHERE--}}

      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/youtube.png') }}" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/Facebook.png') }}" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/Instagram.png') }}" class = "icon"></button></a> 
      <a href="/home"><button class = "iconbutton"><img src="{{ Vite::asset('public/images/X.png') }}" class = "icon"></button></a>

    </div>

  </footer>
    
</body>
</html>
