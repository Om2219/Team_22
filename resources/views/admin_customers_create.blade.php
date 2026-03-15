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
    <h1>Create New User</h1>
    <p> Add A New Admin Or Customer</p>

<section class="table-section">
    <h2>User Details</h2>
    <form method="POST" action="{{ route('admin.customers.store') }}">
        @csrf
        <table>
            <tr>
                <th>First Name</th>
                <td><input type="text" name="forename" class="form-control" required></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><input type="text" name="surname" class="form-control" required></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" name="email" class="form-control" required></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="password" class="form-control" required></td>
            </tr>
            <tr>
                <th>Role</th>
                <td>
                    <select name="role" class="form-control">
                        <option value="customer">Customer</option>
                        <option value="admin">Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right; padding-top: 20px;">
                    <button type="submit" class="btn-view" style="background: #28a745;">Create User</button>
                    <a href="{{ route('admin.customers') }}" class="btn-delete" style="background: #6c757d;">Cancel</a>
                </td>
            </tr>
        </table>
    </form>
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

.table-section{
    background: #ffffff;
    border-radius: 12px;
    padding: 18px;
    box-shadow: 0 8px 18px rgba(0,0,0,0.08);
    border: 1px solid rgba(122,73,0,0.12);

}

.table-section h2{
    margin: 0 0 14px;
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

.btn-view {
    background: #4a6fa5;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    margin-right: 5px;
}

.btn-delete {
    background: #c44536;
    color: white;
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
}

.form-control {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-control:focus {
    outline: none;
    border-color: #061156;
}

/**Responsive */
@media (max-width:900px){
    .Admin_Content{
        padding: 22px;
    }
}

</style>