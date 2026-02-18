<x-layout>
    <h1 class="Ah">My Wishlist</h1> 
    @if (session('success'))
    <p style="color: green;">{{  session('success') }}</p>
    @endif
    @if ($favourites->isEmpty())
    <p>You haven't got any products wishlisted yet.</p>
    @else
    <div class="MasterAccountBox">
        @foreach ($favourites as $product)
        <div class="accountBox">
        @if ($product->images->first())
        <img 
        src="{{ asset('images/products/' . $product->images->first()->product_image) }}" 
        alt="{{ $product->name }}"
        class="imageIcon">
        @endif
        <h2>{{  $product->name }}</h2>
        <p>£{{  $product->price }}</p>
        <a href="{{ route('product.show', $product) }}">
            <button class="headbut">View Product</button>
        </a>
        <form method="POST" action="{{ route('wishlist.destroy', $product) }}">
            @csrf
            @method('DELETE')
            <button class="headbut">Remove</button>
        </form>
        </div>
        @endforeach
    </div>
@endif
</x-layout>