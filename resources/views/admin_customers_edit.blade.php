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
<div class="form-card">
    <h1> Edit Customers</h1>

<form action="{{ route ('admin.customers.update', $user->id) }}" method="POST">
@csrf
@method ('PUT')

<div class="form-grid">

<div class="form-group">
    <label>First Name</label>
    <input type="text" name="forename" value="{{ $user->forename}}">
</div>

<div class="form-group">
    <label>Last Name</label>
    <input type="text" name="surname" value="{{ $user->surname}}">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ $user->email}}">
</div>

</div>
    <button type="submit" class="btn-update">
    Update user
    </button>

    <button type="submit" class="btn-back">
    Back
    </button>

</form>
</div>
</main>


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


/**card */
.form-card{
    background: #ffffff;
    padding: 30px;
    border-radius: 14px;
    max-width: 100%;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

.form-grid{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}



/**title */

.form-card h2{
    margin-bottom: 20px;
    color: #061156;
}

/**form group */
.form-group{
    display: flex;
    flex-direction: column;
    margin-bottom: 18px;
}


.form-group.full-width{
    grid-column: span 2;
}

/**labels */
.form-group label{
    font-size: 0.9rem;
    margin-bottom: 6px;
    color: #444;
}

/**inputs */
.form-group input{
    padding: 10px;
    border-radius:6px;
    border: 1px solid #ccc;
    font-size: 0.95rem;
    
}

/**input focus */
.form-group input:focus{
    outline: none;
    border-color: #061156;
    box-shadow: 0 0 0 2px rgba(6,17,86,0.1);
}

/** button */
.btn-update{
    background: #28a745;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 8px;
    font-size: 0.95rem;
    cursor: pointer;
    transition: 0.2s;

}


.btn-back{
    background: red;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 8px;
    font-size: 0.95rem;
    cursor: pointer;
    transition: 0.2s;

}
/** button hover */

.btn-update:hover{
    background: #218838;
    transform: translateY(-1px);
}

.btn-back:hover{
    background: #218838;
    transform: translateY(-1px);
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