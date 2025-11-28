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
    </div>

    

   
</x-layout>