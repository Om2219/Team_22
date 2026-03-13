<x-layout>

<h1 class = "Ah">Account Home</h1>
<p>Your Points: {{ auth()->user()->points }}</p>

<div class = "MasterAccountBox">


    <div class = "accountBox">
        <h2>My Orders</h2>
        <p> Track, Return, Cancel</p>
        <a class = "headbut" href="/order">Check My Orders</a></button>
    </div>

    <div class = "accountBox">
        <h2>My Details</h2>
        <p> Manage and change email and password</p>
        <a class = "headbut" href="/mydetails">Edit My Details</a></button>
    </div>

     <div class="accountBox">
        <h2>Wishlist</h2>
        <p>View your favourite products</p>
        <a class="headbut" href="{{ route('wishlist.index') }}">View Wishlist</a>
    </div>

    <div class = "accountBox">
        <h2>My Rewards</h2>
        <p> Go to your Rewards Page</p>
        <a class = "headbut" href="/reward"> My Rewards</a></button>
    </div>

    <div class = "accountBox">
        <h2>Sign Out</h2>
        <p> Sign Out Of Your Account</p>
        <form method = "POST" action="{{route('logout')}}">
            @csrf
            <button type="submit" class = "headbut">Sign Out</button>
        </form>
    </div>

    <style>
        .MasterAccountBox {
            display: flex;
            justify-content:: center;
            align-items: stretch;
            flex-wrap: wrap;
        }
        .accountBox {
            width: 220px;
            min-height: 170px;
            border: 1px solid black;
            box-sizing: border-box;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .accountBox h2 {
            margin: 0 0 10px 0;
        }
        .accountBox p {
            margin: 0 0 20px 0;
            min-height: 48px;

        }
        .headbut {
            display: inline-block;
            padding: 10px 18px;
            background-color: #eee8dc;
            color: green;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>

</div>
</x-layout>