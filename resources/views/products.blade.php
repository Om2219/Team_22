<x-layout>
 <link rel = "stylesheet" type="text/css" href="public/css/app.css"/>

    <div class="filters" style="padding: 10px; background: #111010; margin-bottom: 20px; border-radius: 8px;">
        <form action="{{ route('search') }}" method="GET">
            <input type="hidden" name="search" value="{{ request()->query('search') }}">
            
            <label for="sort" style="font-weight: bold; color: #5d4037;">Sort By Price:</label>
            <select name="sort" id="sort" onchange="this.form.submit()" style="padding: 5px; border-radius: 4px;">
                <option value="">Newest</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Low to High</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>High to Low</option>
            </select>
        </form>
    </div>

 <section id="itemsForSale">

    @foreach($products as $product)
        <div class="productBox">
                @if ($product->images->isNotEmpty())
                <img src="{{ asset('images/products/' . $product->images->first()->product_image) }}" alt="{{ $product->name }}">
                @endif

            <br>
            <p>{{$product->name}}<p>
            <br>
            <button class ="headbut"><a href="{{route('product.show' , $product -> id)}}">View Product</a></button>
        </div>
    @endforeach
    
</section>
   
</x-layout>