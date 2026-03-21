<x-layout>

<div class="order-container">

    <h1 class="order-title">
        Thank you for your order, {{auth()->user()->forename}} 😊
    </h1>

    <p><strong>Order reference:</strong> {{$order->order_ref}}</p>

    <div class="order-panels">

        <div class="order-summary">

            <h3>Order Summary</h3>

            @foreach ($items as $product)
                <div class="summary-item">
                    <img src="{{asset('images/products/' . $product->product_image)}}" 
                         alt="{{$product->name}}" width="80">

                    <div class="summary-details">
                        <p><strong>{{$product->name}}</strong></p>
                        <p>Qty: {{$product->quantity}}</p>
                        <p>£{{number_format($product->price * $product->quantity, 2)}}</p>
                    </div>
                </div>
            @endforeach

            <hr>

            @if(isset($totalPrice))
                <p>Subtotal: £{{number_format($totalPrice, 2)}}</p>
            @endif

            @if(isset($voucher) && $voucher)
                <p style="color: green;">
                    Voucher ({{$voucher->code}}): -£{{number_format($discount, 2)}}
                </p>
            @endif

            <p class="final-total">
                <strong>Total: £{{number_format($order->total, 2)}}</strong>
            </p>

        </div>

        <div class="order-details modeBoxes">

            <h3>Order Details</h3>

            <div class="details-shipping">
                <p><strong>Shipping address:</strong></p> 
                <p>
                    {{$order->address_line_1}}<br>
                    {{$order->address_line_2}}<br>
                    {{$order->city}}<br>
                    {{$order->postcode}}
                </p>
            </div>

            <div class="details-payment">
                <p><strong>Payment:</strong></p>
                <p>
                    Card ending in {{substr($order->card_number, -4)}}<br>
                    Expiry: {{$order->expiry_month }}/{{$order->expiry_year}}
                </p>
            </div>

        </div>

    </div>

    <div class="order-buttons">
        <p>What do you want to do next?</p>
        <div class="actual-buttons">
            <a href="/home" class="save-btn">Back to Home</a>
            <a href="/order" class="save-btn">View my orders</a>
        </div>
    </div>

</div>

</x-layout>