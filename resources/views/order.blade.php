<x-layout>

    <div class="orders-container">

        <h1>My Orders</h1>

        @if($orders->isEmpty())
            <p>You have not placed any orders yet.</p>
        @else
            <div class="orders-list modeBoxes">
                @foreach($orders as $order)
                    <div class="order-row">

                        <div class="order-left">
                            <div>
                                <p class="label">Order Ref:</p>
                                <p>{{ $order->order_ref }}</p>
                            </div>

                            <div>
                                <p class="label">Date:</p>
                                <p>{{ $order->created_at->format('d M Y, H:i') }}</p>
                            </div>

                            <div>
                                <p class="label">Status:</p>
                                <p>{{ ucfirst($order->status) }}</p>
                            </div>
                        </div>

                        <div class="order-right">
                            <div class="price-block">
                                <p class="label">Price:</p>
                                <p class="order-price">£{{ number_format($order->total, 2) }}</p>
                            </div>

                            <a href="{{ route('orders.details', $order->order_ref) }}" class="save-btn">
                                View Order
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

        @endif

    </div>

    <div class="back-btn-wrapper">
        <a href="/account" class="save-btn">Go back</a>
    </div>

</x-layout>