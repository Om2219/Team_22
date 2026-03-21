<x-layout>
<div class="voucher-wrapper">

    <!--left side -->
    <div class="voucher-form">
        <h2>Create voucher</h2>

        @if(session('success'))
        <p class="success-msg">{{ session('success') }}</p>
        @endif

        <form action="{{ route ('admin.vouchers.store') }}" method="POST">
            @csrf

            <!--code -->

            <label>Voucher Code</label>
            <div class="code-row">
                <input type="text" name="code" id="codeInput" required>
                <button type="button" onclick="generateCode()"> Auto</button>

            </div>     

            <!--Type -->
            <label>Discount Type</label>
            <select name="type" required>
                <option value="fixed">£ Fixed </option>
                <option value="percent">% Percentage </option>
            </select>


            <!--Value-->
            <label>Value</label>
            <input type="number" name="value" required>


            <!--Expire-->
            <label>Expire Date</label>
            <input type="date" name="expires_at" required>   
            
            <button type="submit" class="create-btn"> Create Voucher</button>
        </form>
    </div>


    <!--right side (list)-->
    <div class="voucher-list">
        <h2>All Vouchers</h2>

        <!--Filter-->
        <select id="filter" onchange="filterVouchers()">
            <option value="all">All </option>
            <option value="active">Active</option>
            <option value="expired">Expired </option>
        </select>

    
        @foreach($vouchers as $v)
        <div class="voucher-card"
        data-status="{{ $v->expires_at > now() ? 'active' : 'expired' }}">

        <h3> {{ $v->code }}</h3>

        <p>
            @if($v->type == 'fixed')
            £{{ $v->value }} OFF
            @else
            {{ $v->value }}% OFF
            @endif
        </p>


        <p class="expiry">
            Expires: {{\Carbon\Carbon::parse($v->expires_at)->format('d M Y') }}
        </p>

        <form action="{{route('admin.vouchers.destroy', $v->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-btn">Delete</button>
        </form>
</div>
@endforeach
</div>

</div>


</x-layout>





<style>
/**layout */
.voucher-wrapper{
    display:grid;
    grid-template-columns: 40% 60%;
    gap:30px;
    padding:30px;
}

/**form */
.voucher-form{
    background: #eef5f7;
    padding: 25px;
    border-radius: 15px;
}

.voucher-form h2{
    color: #1f3d2b;
    margin-bottom:15px;
}

. voucher-form label{
    display: block;
    margin-top:10px;
    font-weight: 500;

}

.voucher-form input,
.voucher-form select{
    width: 100%;
    padding:10px;
    border-radius:8px;
    margin-top:5px;
    border: 1px solid #ccc;
}

.code-row button{
    background:#bdab53;
    border:none;
    padding:10px;
    border-radius:8px;
    cursor: pointer;
}


/**create btn */

.create-btn{
    margin-top:15px;
    background: #1f3d2b;
    color:white;
    padding:10px;
    border: none;
    border-radius: 10px;
}

/**list */

.voucher-list{
    background: #ffffff;
    padding: 20px;
    border-radius: 15px;
}

.voucher-card{
    padding: 15px;
    margin-bottom: 15px;
    border-radius: 12px;
    border-left: 5px solid #bdab53;
    background: #f9fafb;
}

.voucher-card h3{
    color: #1f3d2b;
}

.expiry{
    font-size: 0.85rem;
    color: gray;
}

/**delete */
.delete-btn{
    margin-top:10px;
    background: #dc3545;
    color: white;
    border: none;
    padding: 6px 10px;
    border-radius: 6px;
}

/**success */

.success-msg{
    background:#d4edda;
    padding: 10px;
    border-radius: 8px;
}


/** responsive */

@media(max-width: 900px){
    .voucher-wrapper{
        grid-template-columns: 1fr;
    }
}
</style>




<script>
    function generateCode(){
        let code = "Roots-" + Math.random().toString(36).substr(2,6).toUpperCase();
        document.getElementById('codeInput').value = code;
    }

    function filterVouchers(){
        let filter = document.getElementById('filter').value;
        let cards = document.querySelectorAll('.voucher-card');

        cards.forEach(card=> {
            if(filter === 'all'){
                card.style.display = 'block';

            }

            else if(card.dataset.status === filter){
                card.style.display = 'block';
            }

            else{
                card.style.display = 'none';
            }
        });

    }

    </script>