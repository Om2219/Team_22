<x-layout>
<div class = "container">
    <h1 class = "text-center">Account Home</h1>
    <p  class = "text-center">Your Points: {{ auth()->user()->points }}</p>

    <div class = "row justify-content-center g-4">


        <div class = "col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>My Orders</h2>
                    <p> Track, return and cancel your orders</p>
                    <a class = "headbut mt-auto mb-3" href="/order">Check My Orders</a>
                </div>
            </div>
        </div>

        <div class = "col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>My Details</h2>
                    <p> Manage and change account details</p>
                    <a class = "headbut mt-auto mb-3" href="/mydetails">Edit My Details</a>
                </div>
            </div>
        </div>

        <div class="col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>Wishlist</h2>
                    <p>View your favourite products</p>
                    <a class="headbut mt-auto mb-3" href="{{ route('wishlist.index') }}">View Wishlist</a>
                </div>
            </div>
        </div>

        <div class = "col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>My Rewards</h2>
                    <p> Go to your Rewards Page</p>
                    <a class = "headbut mt-auto mb-3" href="/reward"> My Rewards</a>
                </div>
            </div>
        </div>

        <div class = "col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>Sign Out</h2>
                    <p> Sign out of your ccount</p>
                    <form method = "POST" action="{{route('logout')}}" class="mt-auto">
                    @csrf
                        <button type="submit" class = "headbut w-100 mb-3">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>

</div>

    <style>
        .MasterAccountBox {
            display: flex;
            justify-content:: center;
            align-items: stretch;
            flex-wrap: wrap;
        }
        .accountBox {
            border: 2px solid black;
            padding: 29px;px;
            text-align:center;
            height:100%;
        }
        .accountBox h2 {
            margin: 0 0 10px 0;
        }
        .accountBox p {
            margin: 0 0 20px 0;
            min-height: 48px;

        }
        .headbut {
            display:inline-block;
            padding:10px 18px;
            background:#eee8dc;
            color:green;
            text-decoration:none;
            border-radius:8px;
            cursor: pointer;
        }
    </style>

</div>
</x-layout>