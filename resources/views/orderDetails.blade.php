<x-layout>
    <div class="order-container">

        <h1 class="order-title">
            Order {{$order->order_ref}}
        </h1>             

        <div class="order-panels">

            <div class="order-summary modeBoxes">
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

                <p class="final-total">
                    <strong>Total: £{{number_format($order->total, 2)}}</strong>
                </p>
            </div>
            
            <div class="order-details modeBoxes">
                <h3>Order Details</h3>

                <div class="details-address">
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
                        Card ending in {{$order->card_number}}<br>
                        Expiry: {{$order->expiry_month}}/{{$order->expiry_year}}
                    </p>
                </div>

                <div class="details-status">
                    <p><strong>Status:</strong></p>
                    <p>{{$order->status}}</p>
                </div>

                <div class="details-timestamp">
                    <p><strong>Placed on:</strong></p>
                    <p>{{$order->created_at->format('d M Y, H:i')}}</p>
                </div>
            </div>

        </div>

        <a href="/order" class="save-btn">← Back to My Orders</a>

    </div>
</x-layout>