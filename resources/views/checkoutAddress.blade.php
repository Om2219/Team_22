<x-layout>
    <button class ="headbut"><a href="/basket">go back</a></button>

    <div class="checkout-master">

        <form action ="{{ route('checkout.place') }}" method = "POST">
        @csrf
          <p>Address:</p>
          <p>Country/Region:</p>
          <input type="text" name="country_region" required>

          <p>First Name:</p>
          <input type="text" name="first_name" required>

          <p>Last Name:</p>
          <input type="text" name="last_name" required>

          <p>Address:</p>
          <input type="text" name="address" required>

          <p>City:</p>
          <input type="text" name="city" required>

          <p>Postcode:</p>
          <input type="text" name="postcode" required>

          <p>Phone:</p>
          <input type="text" name="phone" pattern="\d{16}">

          <br>
          <br>
        
          <br><button class= "save-btn" type="submit">Place Order</button>
        
        </form>
        
    </div>
	
</x-layout>