<x-layout>

    <h1>Your Ordre has been placed 😊</h1>

    <p>Order Reference:</p>
    <p>{{ $order->order_ref }}</p>

    <p>Order total:</p>
    <p>£{{ number_format($order->total, 2) }}</p>

    <p>Shipping Address:</p> 
    <p>{{ $order->shipping_address }}</p>


    <p>Payment Method:</p> 
    <p>{{ $order->payment_method }}</p>

    <button class = "save-btn"><a href="/home">go back</a></button>

</x-layout>