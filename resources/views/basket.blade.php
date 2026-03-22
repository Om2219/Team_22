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
                        <div class="item-image">
                            <img src="{{asset('images/products/' . $product->product_image)}}" 
                            alt="{{$product->name}}" width="200">
                        </div>

                        <div class="item-details">
                            <p><b>{{$product->name}}</b></p>
                            <p>Price: £{{$product->price}}</p>
                            @if (session('error')) <div class="alert alert-danger" id="danger-alert"role="alert">{{session('error')}}</div> @endif
                            <form action="{{route('basket.update')}}" method="POST">
                                @csrf
                                <div class="quantityAlign">
                                    <label for="quantity{{$product->product_id}}">Quantity:</label>
                                    <div class="fieldAlign">
                                        <input class="inputTxt" type="number" name="quantity" value="{{$product->quantity}}"  min="1">
                                    </div>
                                    <div class="fieldAlign">
                                        <input class="inputTxt "type="hidden" name="product_id" value="{{$product->product_id}}">
                                        <button type="submit" class="save-btn">Update Quantity</button>
                                    </div>
                                </div>
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
                <p>Subtotal: £{{number_format($totalPrice, 2)}}</p>
                @if ($voucher)
                    <P style="color: green;"><strong>Voucher ({{$voucher->code }}):</strong>-£{{  number_format($discount, 2)}}</P>
                    @if($voucher->min_spend && $totalPrice < $voucher->min_spend)
                        <p style="color: red;"> Spend £{{number_format($voucher->min_spend - $totalPrice, 2)}} more to use this voucher</p>
                    @endif
                @endif
                <hr>
                <p style="font-size: 1.2rem;"> <strong>Total:</strong> £{{number_format($finalTotal, 2)}}</p>
            </div>

            <h3>Voucher</h3>
            
            @if (session('voucher_error'))
                <p style="color:red;">{{session('voucher_error')}}</p>
            @endif
            @if (session('voucher_success'))
                <p style="color:green;">{{session('voucher_success')}}</p>
            @endif
            @if (!session()->has('voucher'))
                <form method="POST" action="{{route('voucher.apply')}}">
                    @csrf
                    <input class="inputTxt" type="text" name="code" placeholder="Enter voucher code" required>
                    <button type="submit" class="save-btn">Apply</button>
                </form>
            @else
            <p> Voucher Applied: <strong>{{session('voucher.code')}}</strong></p>
            <form method="POST" action="{{route('voucher.remove')}}">
                @csrf
                <button type="submit" class="save-btn">Remove voucher</button>
            </form>
            @endif   

            <div class = "basket-master"> <!--keeping this outside the container-->
                <a href="/checkout" class="save-btn">Checkout</a>
            </div>

        </div>
        @endif
    
    </div>

</x-layout>

<script>

    //these scripts set the success and failure messages to fade out
    //after 2 seconds of being on screen
    //looks badboy

    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('danger-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        }
    });
</script>