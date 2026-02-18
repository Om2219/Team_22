<x-layout>
    <a href="/basket" class="save-btn">go back</a>

    <div class="checkout-master">

        <form action="{{ route('checkout.place') }}" method="POST">
            @csrf

            <div class="address-details">

                <h3>Shipping address</h3>

                <label for="address_line1">Address line 1</label>
                <input type="text" name="address_line_1" id="address_line_1" required>

                <label for="address_line2">Address line 2</label>
                <input type="text" name="address_line_2" id="address_line_2">

                <label for="postcode">Postcode</label>
                <input type="text" name="postcode" id="postcode" required>

                <label for="city">City</label>
                <input type="text" name="city" id="city" required>

            </div>

            <div class="payment-details">

                <h3>Payment Details</h3>

                <label for="card_number">Card number</label>
                <input type="text" name="card_number" id="card_number" pattern="\d{13,20}" required>

                <label for="expiry_month">Expiry month</label>
                <select name="expiry_month" id="expiry_month" required>
                    <option value=""></option>
                    @for ($m = 1; $m <= 12; $m++)
                        <option value="{{sprintf('%02d',$m)}}">{{sprintf('%02d',$m)}}</option>
                    @endfor
                </select>

                <label for="expiry_year">Expiry year</label>
                <select name="expiry_year" id="expiry_year" required>
                    <option value=""></option>
                    @php
                        $currentYear = date('Y');
                    @endphp
                    @for ($y = $currentYear; $y <= $currentYear + 10; $y++)
                        <option value="{{$y}}">{{$y}}</option>
                    @endfor
                </select>

                <label for="security_code">Security code (CVV)</label>
                <input type="text" name="security_code" id="security_code" required>
                <br><br>
            </div>

            <button class="save-btn" type="submit">Place Order</button>

        </form>

    </div>
</x-layout>
