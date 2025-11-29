<x-layout>

    <h1>My Basket</h1>
    
    <div class="MasterBasketBox">

        @if($basket->isEmpty())
            <p>basket is empty</p>
        @else
            <div class="basket_items">
                @foreach($basket as $product)
                    <div class="basket-item">
                        <img src="{{ asset('images/products/' . $product->product_image) }}" 
                            alt="{{ $product->name }}" width="200">
                        <p>{{ $product->name }}</p>
                        <p>price: {{$product->price}}</p>

                        <div>
                            <label for="quantity_{{ $product->id }}">quantity:</label>
                            <input type="number" name="quantity[{{ $product->id }}]" value="{{ $product->quantity }}" min="1">
                        </div>

                        <p>total: {{ number_format($product->price * $product->quantity, 2) }}</p>

                        <form action="{{ route('basket.remove', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">remove</button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="basket_total">
                <p>grand total: {{number_format($totalPrice, 2)}}</p>
            </div>

            <button type="submit">update basket</button>

            <div class = "basket-master">
                <button class="checkoutButton"><a href="/checkout">Checkout</a></button>
            </div>
        @endif
    
    </div>

</x-layout>
