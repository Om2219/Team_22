<x-layout>

<h1 class = "Ah">Admin Account</h1>


<div class = "MasterAccountBox">


    <div class = "accountBox">
        <h2>My Dashboard</h2>
        <p> View Admin Dashboard and analytics</p>
        <button class = "headbut"><a href="{{route('admin.dashboard')}}">Dashboard</a></button>
    </div>

    <div class = "accountBox">
        <h2>My Details</h2>
        <p> Manage and change email and password</p>
        <button class = "headbut"><a href="/mydetails">Edit My Details</a></button>
    </div>

    <div class = "accountBox">
        <h2>User Messages</h2>
        <p> User Contact Forms</p>
        <a href="{{ route('admin.messages') }}"> {{-- this is the favourites button --}}
            <button class="headbut">View Messages</button>
        </a>
    </div>

    <div class = "accountBox">
        <h2>Voucher Management</h2>
        <p> Manage and view vouchers</p>
        <button class = "headbut"><a href="{{ route('admin.vouchers') }}">View Vouchers</a></button>
    </div>

    <div class = "accountBox">
        <h2>Sign Out</h2>
        <p> Sign Out Of Your Account</p>
        <form method = "POST" action="{{route('logout')}}">
            @csrf
            <button class = "headbut">Sign Out</button>
        </form>
    </div>

</div>
</x-layout>

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
    
    .headbut a {
        color: green;
        text-decoration: none;
    }
</style>