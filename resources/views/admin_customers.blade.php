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
    <h1>Customers</h1>
    <p> Registered Users on the Roots platform</p>

@if(session('success'))
    <div style="background: #d4edda; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px;">{{ session('success') }}</div>
@endif

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2 style="color: #061156; font-size: 1.2rem; margin: 0;">Customers Information</h2>
    <a href="{{ route('admin.customers.create') }}" style="background: #28a745; color: white; padding: 8px 16px; text-decoration: none; border-radius: 4px;">Add User</a>
</div>

<!--filter bar-->
    <form method="GET" class="filter-bar">
        <input type="text" name="search" placeholder="Search name or email..."  value="{{ request('search')}}">

        <select name="status">
            <option value="all">All Users</option>
            <option value="active" {{ request('status')=='active' ? 'selected' : '' }}>Active</option>
            <option value="banned" {{ request('status')=='banned' ? 'selected' : '' }}>Banned</option>
        </select>

        <!--Sort -->
    <select name="sort">
        <option value="">Default </option>
        <option value="name_asc" {{ request('sort')=='name_asc' ? 'selected' : '' }}>Name A-Z</option>
        <option value="name_desc" {{ request('sort')=='name_desc' ? 'selected' : '' }}>Name Z-A</option>
        <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>Newest</option>
        <option value="oldest" {{ request('sort')=='oldest' ? 'selected' : '' }}>Oldest</option>
    </select>

    <!--Buttons--->
    <button type="submit" class="filter-btn">Filter</button>
</form>



<section class="table-section">
    <table>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <!--active or not-->
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->forename ?? 'Guest' }} {{ $user->surname ?? '' }}</td>
            <td>{{ $user->email }}</td>

            <td>
                 <span style="color: #28a745;">Active</span>
               
            </td>

            <!--Edit button-->
            <td style="display:flex; gap:8px; align-itens:center;">
            
            <a href="{{ route('admin.customers.edit', $user->id) }}"
            style="color:#28a745; margin-right: 10px; text-decoration:none;">
            Edit
            </a>

            |

            <!--Delete button-->
            <form action=" {{ route('admin.customers.destroy', $user->id) }}"
                method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
            onclick="return confirm('Are u sure you want to delete this user?')"
                style="background: none; border:none; color:#c44536; cursor:pointer;">
                Delete
            </button>
        </form>
            
    <td>
</tr>
@endforeach

</table>

<!--pagination-->
{{ $users->links()}}
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
