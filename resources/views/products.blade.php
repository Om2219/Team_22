<x-layout>
 
    <div >

    @foreach($products as $product)

        <img src="{{ asset('images/products/' . $product->images->first()->product_image) }}"  alt="{{ $product->name }}" width="200">
        <button class ="headbut"><a href="{{route('product.show' , $product -> id)}}">View Product</a></button>
        <p>{{$product->name}}<p>
    @endforeach




    </div>

   
</x-layout>