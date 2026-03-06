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
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</section>

</main>

   </div>

</x-layout>
<style>

    .Admin_Dashboard{
        display: flex;
        min-height: 100vh;
        background-color:#f5f1e8;
        font-family: 'Segoe UI', sans-serif;

    }



    .Sidebar{
        width: 260px;
        background-color: #7a4900;
        color:#fff;
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
    background-color: #bdab53;
    color: #2e2e2e;
}


.Admin_Content{
flex:1;
padding: 40px;
background-color: #f5f1e8;
 font-family: 'Segoe UI', sans-serif;
color: #2e2e2e;
}

.Admin_Content h1{
    margin: 0 0 8px;
    font-size: 2.2rem;
    color:#7a4900;
}

.Admin_Content p{
 margin: 0 0 28px;
    font-size: 1rem;
    color:#5a5a5a;
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
    color: #7a4900;
    font-size: 1.2rem;
}

.table-section table{
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 10px;
}

.table-section th {
    text-align: left;
    padding: 12px 12px;
    font-size: 0.95rem;
}

.table-section td {
    text-align: left;
    padding: 0px 12px;
    font-size: 0.95rem;
}

.table-section th{
    background: #7a4900;
    color: #ffffff;
    font-weight: 700;

}

.table-section tr:nth-child(even) td{
    background: #fbf8f2;
}
.table-section tr:hover td{
    background: rgba(189, 171, 83, 0.020);

}

/* to match the product page style */
.status-badge {
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-block;
}

.status-pending {
    background: #fff3f3;
    color: #c44536;
}

.status-processing {
    background: #cce5ff;
    color: #004085;
}

.status-shipped {
    background: #d4edda;
    color: #155724;
}

.status-delivered {
    background: #d1e7dd;
    color: #0f5132;
}

.status-cancelled {
    background: #f8d7da;
    color: #721c24;
}

/* to match the product page style */
.status-select {
    padding: 4px 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: white;
    cursor: pointer;
    font-size: 0.9rem;
    width: 120px;
    margin-top: 14px;
}

.status-select:hover {
    border-color: #7a4900;
}

.status-form {
    margin: 0;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    padding: 12px;
    border-radius: 4px;
    margin-bottom: 20px;
}

.alert-danger {
    background: #f8d7da;
    color: #721c24;
    padding: 12px;
    border-radius: 4px;
    margin-bottom: 20px;
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
    border: 2px solid #bdab53;
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