<x-layout>

    <h1>Thank you for your order, {{auth()->user()->forename }} 😊</h1>

    <p>Order reference:</p>
    <p>{{ $order->order_ref }}</p>

    <p>Order total:</p>
    <p>£{{ number_format($order->total, 2) }}</p>

    <p>Shipping address:</p> 
    <p>{{$order->address_line_1}}<br>{{$order->address_line_2}}<br>{{$order->city }}<br>{{$order->postcode}}</p>

    <p>Payment details:</p>
    <p>Card ending in {{ substr($order->card_number, -4) }}<br>Expiry: {{ $order->expiry_month }}/{{ $order->expiry_year }}
    </p>


    @foreach ($items as $product)

        <p>{{ $product->quantity }} × {{ $product->name }}  £{{ $product->price }}</p>
        <img src="{{ asset('images/products/' . $product->product_image) }}"  alt="{{ $product->name }}" width="200">

    @endforeach

    <br><button class = "save-btn"><a href="/home">Go back</a></button>  

</x-layout>