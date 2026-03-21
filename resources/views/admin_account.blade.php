<x-layout>

<div class = "container">
    <h1 class = "text-center">Admin Account</h1>

    <div class = "row justify-content-center g-4">

        <div class = "col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>My Dashboard</h2>
                    <p> View Admin Dashboard and analytics</p>
                    <a class = "headbut mt-auto mb-3" href="{{route('admin.dashboard')}}">Dashboard</a>
                </div>
            </div>
        </div>

        <div class = "col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>My Details</h2>
                    <p> Manage and change email and password</p>
                    <a class = "headbut mt-auto mb-3" href="/mydetails">Edit My Details</a>
                </div>
            </div>
        </div>

        <div class = "col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>Message Management</h2>
                    <p> View and manage customer messages</p>
                    <a class = "headbut mt-auto mb-3" href="{{ route('admin.messages') }}">View Messages</a>
                </div>
            </div>
        </div>

        <div class = "col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>Voucher Management</h2>
                    <p> Manage and view vouchers</p>
                    <a class = "headbut mt-auto mb-3" href="{{ route('admin.vouchers') }}">View Vouchers</a>
                </div>
            </div>
        </div>

        <div class = "col col-lg-3">
            <div class="card border-dark text-center h-100 modeBoxes">
                <div class="card-body d-flex flex-column">
                    <h2>Sign Out</h2>
                    <p> Sign Out Of Your Account</p>
                    <form method = "POST" action="{{route('logout')}}" class="mt-auto">
                        @csrf
                        <button type="submit" class = "headbut w-100 mb-3">Sign Out</button>
                    </form>
                </div>
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

</x-layout>