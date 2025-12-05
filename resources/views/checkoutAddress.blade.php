<x-layout>
    <button class ="headbut"><a href="/basket">go back</a></button>

    <div class="checkout-master">

        <form action ="{{ route('checkout.place') }}" method = "POST">
        @csrf
          <p>Address:</p>
          <textarea name="country_reigon" id="country_reigon" required></textarea>

          <p>Address:</p>
          <textarea name="first_name" id="first_name" required></textarea>
        
          <p>Address:</p>
          <textarea name="last_name" id="last_name" required></textarea>

          <p>Address:</p>
          <textarea name="address" id="address" required></textarea>

          <p>Address:</p>
          <textarea name="city" id="city" required></textarea>

          <p>Address:</p>
          <textarea name="postcode" id="postcode" required></textarea>

          <p>Address:</p>
          <textarea name="phone" id="phone" required></textarea>
        
          <br><button class= "save-btn" type="submit">Place Order</button>
        
        </form>
        
    </div>
	
</x-layout>