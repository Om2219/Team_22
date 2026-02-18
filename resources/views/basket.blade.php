<x-layout>

    <h1>My Basket</h1>

    <div class="MasterBasketBox">

        @if($basket->isEmpty())
            <p>The basket is currently empty.</p>
        @else
        <div class="basket-container">

            <div class="basket_items">
                @foreach($basket as $product)
                    <div class="basket-item">
                        <img src="{{asset('images/products/' . $product->product_image)}}" 
                            alt="{{$product->name}}" width="200">

                        <div class="item-details">
                            <p>{{$product->name}}</p>
                            <p>Price: £{{$product->price}}</p>
                            @if (session('error')) {{ session('error') }} @endif
                            <form action="{{ route('basket.update') }}" method="POST">
                                @csrf
                                <label for="quantity{{$product->product_id}}">Quantity:</label>
                                <input type="number" name="quantity" value="{{ $product->quantity }}"  min="1"> 
                                <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                <button type="submit" class="save-btn">Update Quantity</button>
                            </form>

                            <p>Total: £{{number_format($product->price * $product->quantity, 2)}}</p>

                            <div class="remove-btn">
                                <form action="{{route('basket.remove', $product->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to remove this item?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="save-btn" type="submit">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="basket_total">
                <p>Grand total: £{{number_format($totalPrice, 2)}}</p>
            </div>

            <div class = "basket-master"> <!--keeping this outside the container-->
                <a href="/checkout" class="save-btn">Checkout</a>
            </div>

        </div>
        @endif
    
    </div>

</x-layout>
