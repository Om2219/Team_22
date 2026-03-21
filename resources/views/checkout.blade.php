<x-layout>
    <a href="/basket" class="save-btn">Go back</a>

    <div class="checkout-container">

        <div class="checkout-master modeBoxes">

            <div class="error-message" id="error-message" style="display: none;">
                Please fill in all required fields. Required fields are denoted by the red asterisk.
            </div>

            <form action="{{ route('checkout.place') }}" method="POST" id="checkout-form">
                @csrf

                <div class="address-details">
                    <h3>Shipping address</h3>

                    <label for="address_line1">Address line 1 <span class="required-asterisk">[<span class="asterisk">*</span>]</span></label>
                    <input type="text" name="address_line_1" id="address_line_1" required>

                    <label for="address_line2">Address line 2</label>
                    <input type="text" name="address_line_2" id="address_line_2">

                    <label for="postcode">Postcode <span class="required-asterisk">[<span class="asterisk">*</span>]</span></label>
                    <input type="text" name="postcode" id="postcode" required>

                    <label for="city">City <span class="required-asterisk">[<span class="asterisk">*</span>]</span></label>
                    <input type="text" name="city" id="city" required>
                </div>

                <div class="payment-details">
                    <h3>Payment Details</h3>

                    <label for="card_number">Card number <span class="required-asterisk">[<span class="asterisk">*</span>]</span></label>
                    <input type="text" name="card_number" id="card_number" pattern="\d{13,20}" maxlength="19" required>

                    <label for="expiry_month">Expiry month <span class="required-asterisk">[<span class="asterisk">*</span>]</span></label>
                    <select name="expiry_month" id="expiry_month" required>
                        <option value=""></option>
                        @for ($m = 1; $m <= 12; $m++)
                            <option value="{{sprintf('%02d',$m)}}">{{sprintf('%02d',$m)}}</option>
                        @endfor
                    </select>

                    <label for="expiry_year">Expiry year <span class="required-asterisk">[<span class="asterisk">*</span>]</span></label>
                    <select name="expiry_year" id="expiry_year" required>
                        <option value=""></option>
                        @php
                            $currentYear = date('Y');
                        @endphp
                        @for ($y = $currentYear; $y <= $currentYear + 10; $y++)
                            <option value="{{$y}}">{{$y}}</option>
                        @endfor
                    </select>

                    <label for="security_code">Security code (CVV) <span class="required-asterisk">[<span class="asterisk">*</span>]</span></label>
                    <input type="text" name="security_code" id="security_code" pattern="\d{3,4}" required>
                    <br><br>
                </div>

                <button class="save-btn" type="submit" id="submit-btn">Place Order</button>
            </form>

        </div>

        <div class="order-summary modeBoxes">
            <h3>Order Summary</h3>

            @foreach($basket as $product)
                <div class="summary-item">
                    <img src="{{ asset('images/products/' . $product->product_image) }}" 
                        alt="{{ $product->name }}" width="60">
                    <div class="summary-details">
                        <p><strong>{{$product->name}}</strong></p>
                        <p>Qty: {{$product->quantity}}</p>
                        <p>Subtotal: £{{number_format($product->price * $product->quantity, 2)}}</p>
                    </div>
                </div>
            @endforeach

            <p>Subtotal: £{{number_format($totalPrice, 2)}}</p>

            @if($voucher)
                <p style="color: green;">
                    Voucher ({{$voucher->code}}): -£{{number_format($discount, 2)}}
                </p>
            @endif

            <p><strong>Total: £{{number_format($finalTotal, 2)}}</strong></p>
        </div>
        </div>
    </div>
</x-layout>

<script>

    //this script takes the card number and transforms it like so
    //original card number: XXXXXXXXXXXXXXXX
    //transformed card number: XXXX XXXX XXXX XXXX
    //it basically puts spaces every 4 digits
    //because it looks badboy
    //this is purely visual, does not affect anything backend wise

    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('card_number').addEventListener('input', function (e) {
            let cardNumber = e.target.value.replace(/\D/g, '');
            let formattedNumber = '';
            for (let i = 0; i < cardNumber.length; i += 4) {
                formattedNumber += cardNumber.substring(i, i + 4) + ' ';
            }
            e.target.value = formattedNumber.trim(); 
        });

        document.getElementById('submit-btn').addEventListener('click', function (e) {
            var cardNumberInput = document.getElementById('card_number');

            cardNumberInput.value = cardNumberInput.value.replace(/\s+/g, '');
        });

    //this script basically shows an error on the screen if all required fields arent full
    //AND also checks if the expiry date is valid
    //can be reused to do other bits of validation
    //fades away, appears at top
    //looks certi

        document.getElementById('submit-btn').addEventListener('click', function (e) {
            var form = document.getElementById('checkout-form');
            var errorMessage = document.getElementById('error-message');
            var allRequiredFieldsFilled = true;

            form.querySelectorAll('[required]').forEach(function(input) {
                if (!input.value) {
                    allRequiredFieldsFilled = false;
                }
            });

            var month = document.getElementById('expiry_month').value;
            var year = document.getElementById('expiry_year').value;

            var isExpired = false;

            if (month && year) {
                var now = new Date();
                var currentMonth = now.getMonth() + 1;
                var currentYear = now.getFullYear();

                if (year < currentYear || (year == currentYear && month < currentMonth)) {
                    isExpired = true;
                }
            }

            if (!allRequiredFieldsFilled || isExpired) {
                e.preventDefault();

                errorMessage.style.display = 'block';
                errorMessage.style.opacity = '1';

                if (isExpired) {
                    errorMessage.textContent = "Your card has expired. Please use a valid expiry date.";
                } else {
                    errorMessage.textContent = "Please fill in all required fields. Required fields are denoted by the red asterisk.";
                }

                clearTimeout(errorMessage.fadeTimeout);
                clearTimeout(errorMessage.hideTimeout);

                errorMessage.fadeTimeout = setTimeout(function() {
                    errorMessage.style.opacity = '0';
                }, 2000);

                errorMessage.hideTimeout = setTimeout(function() {
                    errorMessage.style.display = 'none';
                    errorMessage.style.opacity = '1';
                }, 4000);

            } else {
                errorMessage.style.display = 'none';
            }
        });
    });
</script>