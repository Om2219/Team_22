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
    <h1>Admin Dashboard</h1>
    <p> Overview of Roots System</p>

<section class="stats">
    <div class="card">
        <h3>Total Users</h3>
        <p>{{ $totalUsers }}</p>
</div>


    <div class="card">
        <h3>Total orders</h3>
        <p>{{ $totalOrders }}</p>
</div>

    <div class="card">
        <h3>Products</h3>
        <p>{{ $totalProducts }}</p>
</div>

</section>


<section class="table-section">
    <h2>Recent Orders</h2>
<table>
    <tr>
        <th>Order ID</th>
        <th>Customer</th>
        <th>Status</th>
        <th>Date</th>
</tr>
@forelse($recentOrders as $order)
<tr>
    <td>#{{$order->id}}</td>
    <td>{{$order->user->forename ?? 'Guest'}} {{$order->user->surname ?? ''}}</td>
    <td>{{ucfirst($order->status ?? 'Pending')}}</td>
    <td>{{ $order->created_at->format('M d, Y') }}</td>
</tr>
@empty
<tr>
    <td colspan="4">No recent orders</td>
</tr>
@endforelse
</table>

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
