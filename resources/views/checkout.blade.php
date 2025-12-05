<x-layout>
    <button class ="headbut"><a href="/basket">go back</a></button>

    <div class="checkout-master">

       <form action ="{{ route('checkout.address') }}" method = "GET">
        @csrf
          
          <p>Card Number:</p>
          <input type="text" name="card_num" id="payment_method" maxLength="16" pattern="\d{16}" required>

          <p>Expiration Date:</p>
          <input type="text" name="ex_date" id="ex_date" placeholder="" pattern="(0[1-9]|1[0-2])\/\d{2}" required>
          
          <p>CVC Code:</p>
          <input type="text" name="security_code" id="security_code" maxlength="3" pattern="\d{3}" required>
          
          <p>Name on the Card:</p>
          <input type="text" name="name_on_card" id="name_on_card" required>

          <br>
          <br>

          <br><button class= "save-btn" type="submit">Place Order</button>
        
        </form>
        
    </div>
	
</x-layout>