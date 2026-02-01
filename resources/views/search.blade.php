<x-layout>
    <h2>Search Results for "{{ request()->query('search') }}"</h2>
    <div>
        <ul >
            @foreach($products as $product)
                <li class="searchBox">
                    <h3>{{ $product->name }}</h3>
                    {{-- <img src="{{ asset('storage' . $product->image_path) }}" alt="{{ $product->name }}" style="width: 150px;"> --}}
                    @if ($product->images->isNotEmpty())
                        <img src="{{ asset('images/products/' . $product->images->first()->product_image) }}" alt="{{ $product->name }}">
                    @endif
                    <p>Price: ${{ number_format($product->price, 2) }}</p>
                    <p>Description:<br> {{ $product->product_description }}</p>
                    <button><a href="{{ route('product.show', $product->id) }}">View Details</a></button>
                    
                </li>
            @endforeach     
        </ul>
    </div>
</x-layout>