<x-layout>

<h1 class = "Ah">Account Home</h1>

<div class = "MasterAccountBox">

    <div class = "accountBox">
        <h2>My Orders</h2>
        <p> Track, Return, Cancel</p>
        <button class = "headbut"><a href="/order">Check My Orders</a></button>
    </div>

    <div class = "accountBox">
        <h2>My Details</h2>
        <p> Manage and change email and password</p>
        <button class = "headbut"><a href="/mydetails">Edit My Details</a></button>
    </div>

    <div class = "accountBox">
        <h2>Sign Out</h2>
        <p> Sign Out Of Your Account</p>
        <form method = "POST" action="{{route('logout')}}">
            @csrf
            <button class = "headbut">Sign Out</button>
        </form>
    </div>
      <div class = "accountBox">
        <h2>Wishlist</h2>
        <p> View products you've favourited</p>
        <a href="{{ route('wishlist.index') }}"> {{-- this is the favourites button --}}
            <button class="headbut">View wishlist</button>
        </a>
    </div>

</div>
</x-layout>