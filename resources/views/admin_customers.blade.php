<x-layout>
<div class="Admin_Dashboard">


<aside class="Sidebar">
<h2>Roots Admin</h2>

<ul>
    <li><a href="{{ route ('admin.dashboard') }}">Dashboard</a></li>
    <li><a href="{{ route ('admin.customers') }}">Customers</a></li>
    <li><a href="{{ route ('admin.orders') }}">Orders</a></li>
    <li><a href="{{ route ('admin.products') }}">Product</a></li>
    <li>
        <form method = "POST" action="{{route('logout')}}"> @csrf <button class = "headbut">Sign Out</button> 
    </form>
</li>
</ul>
</aside>

<main class="Admin_Content">
    <h1>Customers</h1>
    <p> Registered users on the Roots platform</p>


<section class="table-section">
    <h2>Customers Information</h2>
<table>
    <tr>
        <th>User  ID</th>
        <th>Name </th>
        <th>Email</th>
        <th>Joined</th>
</tr>
<tr>
    <td>#1</td>
     <td>John Doe</td>
      <td>john@example.com</td>
       <td>12 feb 2026</td>
</tr>

<tr>
    <td>#2</td>
     <td>Joshep Doe</td>
      <td>joshep@example.com</td>
       <td>14 feb 2026</td>
</tr>

<tr>
    <td>#3</td>
     <td>Danny Kio</td>
    <td>danny@example.com</td>
       <td>19 feb 2026</td>
</tr>

<tr>
    <td>#4</td>
     <td>Michal Anna</td>
    <td>michal@example.com</td>
       <td>19 feb 2026</td>
</tr>


<tr>
    <td>#5</td>
     <td>Marry James</td>
    <td>marry@example.com</td>
       <td>20 feb 2026</td>
</tr>


<tr>
    <td>#6</td>
     <td>Filex Rio</td>
    <td>filex@example.com</td>
       <td>21 feb 2026</td>
</tr>


<tr>
    <td>#7</td>
     <td>Rayan Jio</td>
    <td>rayan@example.com</td>
       <td>22 feb 2026</td>
</tr>




</table>

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

.table-section th, .table-section td{
    text-align: left;
    padding: 12px 12px;
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
