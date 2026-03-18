<x-layout>

<div class="order-container">

    <h1 class="order-title">
        Thank you for your order, {{ auth()->user()->forename }} 😊
    </h1>

    <p><strong>Order reference:</strong> {{ $order->order_ref }}</p>

    <div class="order-summary">

        <h3>Order Summary</h3>

        @foreach ($items as $product)
            <div class="summary-item">
                <img src="{{ asset('images/products/' . $product->product_image) }}" 
                     alt="{{ $product->name }}" width="80">

                <div class="summary-details">
                    <p><strong>{{ $product->name }}</strong></p>
                    <p>Qty: {{ $product->quantity }}</p>
                    <p>£{{ number_format($product->price * $product->quantity, 2) }}</p>
                </div>
            </div>
        @endforeach

        <hr>

        @if(isset($totalPrice))
            <p>Subtotal: £{{ number_format($totalPrice, 2) }}</p>
        @endif

        @if(isset($voucher) && $voucher)
            <p style="color: green;">
                Voucher ({{ $voucher->code }}): -£{{ number_format($discount, 2) }}
            </p>
        @endif

        <p class="final-total">
            <strong>Total: £{{ number_format($order->total, 2) }}</strong>
        </p>

    </div>

    <div class="order-details">

        <h3>Order Details</h3>

        <div class="details-shipping">
            <p><strong>Shipping address:</strong></p> 
            <p>
                {{ $order->address_line_1 }}<br>
                {{ $order->address_line_2 }}<br>
                {{ $order->city }}<br>
                {{ $order->postcode }}
            </p>
        </div>

        <div class="details-payment">
            <p><strong>Payment:</strong></p>
            <p>
                Card ending in {{ substr($order->card_number, -4) }}<br>
                Expiry: {{ $order->expiry_month }}/{{ $order->expiry_year }}
            </p>
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

<style>
    .order-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 25px;
    padding: 30px 20px;
    text-align: center;
    }

    .order-title {
        font-size: 40px;
        margin-bottom: 10px;
    }

    .order-summary {
        display: flex;
        flex-direction: column;
        gap: 20px;
        max-width: 600px;
        width: 100%;
        padding: 30px;
        border: 1px solid lightgray;
        border-radius: 6px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        text-align: left;
    }

    .final-total {
        font-size: 1.3rem;
    }

    .order-info {
        max-width: 600px;
    }

    .order-buttons {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 10px;
    }

    .button-row {
        display: flex;
        gap: 15px;
    }

    .order-details {
        display: flex;
        flex-direction: column;
        gap: 20px;
        max-width: 600px;
        width: 100%;
        padding: 30px;
        border: 1px solid lightgray;
        border-radius: 6px;
        box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        text-align: left;
    }

    .details-shipping, .details-payment {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .details-shipping:not(:last-child), .details-payment:not(:last-child) {
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
    }
</style>