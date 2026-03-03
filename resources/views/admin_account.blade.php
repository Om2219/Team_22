<x-layout>

<h1 class = "Ah">Admin Account</h1>


<div class = "MasterAccountBox">


    <div class = "accountBox">
        <h2>My Dashboard</h2>
        <p> Admin Stuff</p>
        <button class = "headbut"><a href="{{route('admin.dashboard')}}">Dashboard</a></button>
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

    <div class = "accountBox">
        <h2>My rewards</h2>
        <p> Go to your rewards page</p>
        <button class = "headbut"><a href="/reward"> my rewards</a></button>
    </div>

</div>
</x-layout>