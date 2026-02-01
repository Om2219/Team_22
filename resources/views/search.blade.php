<x-layout>
    <h2>Search Results for "{{ request()->query('search') }}"</h2>
    <div class="products">
        <ul>
            @foreach($products as $product)
                <li>
                    <h3>{{ $product->name }}</h3>
                    <img src="{{ asset('storage' . $product->image_path) }}" alt="{{ $product->name }}" style="width: 150px;">
                    <p>Price: ${{ number_format($product->price, 2) }}</p>
                    <p>Description:<br> {{ $product->product_description }}</p>
                    <button><a href="{{ route('product.show', $product->id) }}">View Details</button>
                    
                </li>
            @endforeach     
        </ul>
    </div>
</x-layout>