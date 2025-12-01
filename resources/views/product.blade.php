<x-layout>
 
    <div >
    {{-- <p> place holder </p> --}}

     <button><a href=" {{route('products.productPage')}}">go back</a></button>

    <p>{{$product->name}}<p>
    <p>{{$product->product_description}}<p>
    <p>{{$product->price}}<p>

    @foreach($product->images as $image)
            <img src="{{ asset('images/products/' . $image->product_image) }}" 
                 alt="{{ $product->name }}" width="200">
     @endforeach

     <form action="{{ route('basket.add', $product->id) }}" method="POST">
        @csrf
        <label for="quantity">quantity:</label>
        <input type="number" name="quantity" id="quantity" value="1" min="1">
        <button type="submit">add to basket</button>
    </form>

    </div>

</x-layout>