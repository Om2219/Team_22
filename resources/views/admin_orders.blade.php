<x-layout>
   <div class="Admin_Dashboard">


<aside class="Sidebar">
<h2>Roots Admin</h2>

<ul>
    <li><a href="{{ route ('admin.dashboard') }}">Dashboard</a></li>
    <li><a href="{{ route ('admin.customers') }}">Customers</a></li>
    <li><a href="{{ route ('admin.orders') }}">Orders</a></li>
    <li><a href="{{ route ('admin.products') }}">Products</a></li>
    <li><a href="{{ route ('admin.reports') }}">Reports</a></li>
    <li>
        <form method = "POST" action="{{route('logout')}}"> @csrf <button class = "headbut">Sign Out</button> 
    </form>
</li>
</ul>
</aside>

<main class="Admin_Content">
    <h1> Orders Information</h1>
    <p> Overview of recent customer orders</p>

@if(session('success'))
    <div class="alert alert-success"> {{ session('success') }} </div>
@endif

@if(session('error'))
    <div class="alert alert-danger"> {{ session('error') }} </div>
@endif


<!--add filters--->
<form method="GET" class="filter-bar">

    <!--search--->
    <input type="text" name="search" placeholder="Search order ID or customer...."
            value="{{ request ('search')}}">

    <!--status--->
    <select name="status">
        <option value="all">All Status</option>
        <option value="Pending" {{ request('status')=='Pending' ? 'selected' : '' }}>Pending</option>
        <option value="Processing" {{ request('status')=='Processing' ? 'selected' : '' }}>Processing</option>
        <option value="Shipped" {{ request('status')=='Shipped' ? 'selected' : '' }}>Shipped</option>
        <option value="Delivered" {{ request('status')=='Delivered' ? 'selected' : '' }}>Delivered</option>
        <option value="Cancelled" {{ request('status')=='Cancelled' ? 'selected' : '' }}>Cancelled</option>
    </select>


    <!--Date from--->
    <input type="date" name="date_from" value=" {{ request('data_from')}}">

    <!--Date To--->
    <input type="date" name="date_to" value=" {{ request('data_to')}}">

    <!--Sort To--->
    <select name="sort">
        <option value="">Default </option>
        <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>Newest</option>
        <option value="oldest" {{ request('sort')=='oldest' ? 'selected' : '' }}>Oldest</option>
    </select>

    <!--Buttons--->
    <button type="submit" class="filter-btn">Filter</button>
    <a href="{{ route ('admin.orders') }}" class="reset-btn">Reset</a>
</form>


<section class="table-section">
    <h2>Recent Orders</h2>
    <table>
        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
            <th>Update</th>
        </tr>
        
        @foreach($orders as $order)
        <tr>
            <td>#{{ $order->id }}</td>
            <td>{{ $order->user->forename ?? 'Guest' }} {{ $order->user->surname ?? '' }}</td>
            <td>£{{ number_format($order->total, 2) }}</td>
            <td>
                <span class="status-badge status-{{ $order->status ?? 'pending' }}">
                    {{ ucfirst($order->status ?? 'Pending') }}
                </span>
            </td>
            <td>{{ $order->created_at->format('d M Y') }}</td>
            <td>
                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" onchange="this.form.submit()" class="status-select">
                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                        <option value="Shipped" {{ $order->status == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $orders->links()}}
</section>

</main>

   </div>

</x-layout>
<style>

    .Admin_Dashboard{
        display: flex;
        min-height: 100vh;
        background-color: #e1edf1;
        font-family: 'Segoe UI', sans-serif;

    }



    .Sidebar{
        width: 260px;
        background-color: #061156;
        color: #fff;
        padding: 30px 20px;
        box-shadow: 4px 0 10px rgba(0,0,0,0.15);
    }


    .Sidebar ul{
        list-style: none;
        padding: 0;
        margin: 1px;

    }

    .Sidebar ul li{
        margin-bottom: 18px;
    }

    .Sidebar ul li a{
        display: block;
        padding: 12px 16px;
        text-decoration: none;
        color: #fff;
        font-size: 1rem;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

.Sidebar ul li a:hover,
.Sidebar ul li a.active{
    background-color: #e1edf1;
    color: #2e2e2e;
}


.Admin_Content{
flex:1;
padding: 40px;
background-color: #e1edf1;
 font-family: 'Segoe UI', sans-serif;
color: #2e2e2e;
}

.Admin_Content h1{
    margin: 0 0 8px;
    font-size: 2.2rem;
    color: #061156;
}

.Admin_Content p{
 margin: 0 0 28px;
    font-size: 1rem;
    color: #5a5a5a;
}

.stats{
    display: grid;
    grid-template-colums:repeat(3,minmax(180px, 1fr));
    gap: 18px;
    margin-bottom: 30px;
}

.card{
    background: #ffffff;
    border-radius: 12px;
    padding: 18px 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    border-left: 6px solid #e1edf1;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}


.card:hover{
    transform: translateY(-2px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.12);
}

.card h3{
    margin: 0 0 10px;
    font-size: 1rem;
    font-weight: 700;
    color: #061156;
    letter-spacing: 0.2px;

}

.card p{
    margin: 0;
    font-size: 1.8rem;
    font-weight: 800;
    color: #2e2e22;
}

.table-section{
    background: #ffffff;
    border-radius: 12px;
    padding: 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    border: 1px solid rgba(122,73,0,0.12);

}

.table-section h2{
    margin:  0 0 14px;
    color: #061156;
    font-size: 1.2rem;
}

.table-section table{
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 10px;
}

.table-section th, .table-section td{
    text-align: left;
    padding: 12px 12px;
    font-size: 0.95rem;
}

.table-section th{
    background: #061156;
    color: #ffffff;
    font-weight: 700;

}

.table-section tr:nth-child(even) td{
    background: #fbf8f2;
}
.table-section tr:hover td{
    background: rgba(189, 171, 83, 0.020);

}
.filter-bar{
    display: flex;
    justify-content:center;
    gap:12px;
    margin-bottom: 25px;
    flex-wrap: nowrap;
    align-items: center;
    background: white;
    padding: 15x 18px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
}

.filter-bar input, .filter-bar select{
    padding: 10px 14px;
    border-radius: 10px;
    border: 1px solid #dcdcdc;
    font-size: 0.95rem;
    min-width: 150px;
}

.filter-bar input{
    min-width: 220px;
}


.filter-bar input:focus, .filter-bar select:focus{
    outline: none;
    border-color: #1f3d2b;
    box-shadow: 0 0 0 2px rgba(31, 61, 43, 0.15);
}

.filter-btn{
    background: #39e87f;
    color: white:
    border: none:
    padding: 10px 16px;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    
}

/**hover effect */
.filter-btn:hover, .reset-btn:hover{
    transform: translateY(-2px);
}

/**reset button */
.reset-btn{
    padding: 10px 16px;
    background: #2f3d68;
    color: white;
    border-radius: 10px;
    text-decoration: none;
}

/**Responsive */
@media (max-width:900px){
    .stats{
        grid-template-colums: 1fr;
    }

    .Admin_Content{
        padding: 22px;
    }
}


.logout-link{
    background:none;
    border: 2px solid #fff;
    color: white; 
    cursor: pointer;
    padding: 10px 12px;
    font-size: 15px;
    text-align:left;
    width: 100%;
    border-radius:6px;
    
}

.logout-link:hover{
    color:#bdab53;
    border-color:white;
}

    </style>
