<x-layout>
 <link rel = "stylesheet" type="text/css" href="public/css/app.css"/>

 <section id="itemsForSale">

    @foreach($products as $product)
        <div class="productBox">
            @if ($product->images->isNotEmpty())
    <img src="{{ asset('images/products/' . $product->images->first()->product_image) }}" alt="{{ $product->name }}">
@endif

            <br>
            <p2>{{$product->name}}<p2>
            <br>
            <button class ="headbut"><a href="{{route('product.show' , $product -> id)}}">View Product</a></button>
        </div>
    @endforeach
    
</section>
   
</x-layout>