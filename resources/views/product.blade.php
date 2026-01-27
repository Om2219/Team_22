<x-layout>

    {{-- <button class = "headbut"><a href=" {{route('products.productPage')}}">go back</a></button> --}}
 
    <div class="productsBox ">
    {{-- <p> place holder </p> --}}
       <div>
        @foreach($product->images as $image)
            <img src="{{asset('images/products/' . $image->product_image)}}" alt="{{$product->name}}" class = "imageIcon">
        @endforeach
       </div>
 
        <div>
            <h2>{{$product->name}}</h2>
            <p>£{{$product->price}}<p>

            @if (session('error')) {{ session('error') }} @endif
        
            <form action="{{route('basket.add', $product->id)}}" method="POST" novalidate>
                @csrf
                <label for="quantity">Quantity:</label><br><br>
                <input type="number" name="quantity" id="quantity" value="1" min="1"><br><br>
                <button class = "save-btn" type="submit">Add to basket</button>
            </form>
            <p>In Stock:<br>{{$product->stock->stock}}</p>
        </div>
    </div><br>
    <h2>Product Information</h2>
    <p>{{$product->product_description}}<p>

    <div>

       <button class ="headbut"><a href="{{ route('product.edit', $product)}}">Edit Product</a></button>

       <form action ="{{ route('product.destroy', $product) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('MONKEY BYE BYE YES??')"> Delete Product</button>
        </form>
    
    </div>
 
</x-layout>