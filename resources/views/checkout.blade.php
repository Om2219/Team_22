<x-layout>
    <button class ="headbut"><a href="/basket">go back</a></button>

    <div class="checkout-master">

        <form action ="{{ route('checkout.place') }}" method = "POST">
        @csrf
          <p>Address:</p>
          <textarea name="shipping_address" id="shipping_address" required></textarea>

          <p>Payment method:</p>
          <textarea name="payment_method" id="payment_method" required></textarea>
        
          <br><button class= "save-btn" type="submit">Place Order</button>
        
        </form>
        
    </div>
	
</x-layout>