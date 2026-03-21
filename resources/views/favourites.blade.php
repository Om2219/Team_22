<x-layout>
    <div class="container py-5">

        <div class="col-md-6"><h1 class="mb-0 fw-bold">My Wishlist</h1></div><br>

            @if (session('success'))
            <p style="color: green;">{{  session('success') }}</p>
            @endif
            @if ($favourites->isEmpty())
            <p>You haven't got any products wishlisted yet.</p>
            @else
            <div class="row row-cols-lg-4 g-4">
            @foreach ($favourites as $product)
            <div class="col d-flex">
                <div class="card border-1 shadow-sm d-flex flex-column modeBoxes">
                    <div class="position-relative overflow-hidden bg-light">
                        @if ($product->images->first())
                        <img 
                        src="{{ asset('images/products/' . $product->images->first()->product_image) }}" 
                        alt="{{ $product->name }}"
                        class="card-img-top h-100">
                        @endif
                    </div>
                    <div class="card-body d-flex flex-column text-center border-top">
                        <h2 class="fw-bold mb-2">{{  $product->name }}</h2>
                        <!-- <p>£{{  $product->price }}</p> -->
                        <div class="mt-auto">
                            @if($product->is_reward)
                                <p class="fw-bold text-success mb-2">{{$product->points_cost}} Points<p>
                            @else
                                <p class="fw-bold text-success mb-2">£{{$product->price}}<p>
                            @endif
                            <br>
                            <a href="{{ route('product.show', $product) }}" class="btn btn-outline-dark btn-sm rounded-pill w-100 fw-bold py-2 viewProducts">
                                View Product
                            </a>
                        </div>
                        <form method="POST" action="{{ route('wishlist.destroy', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger rounded-pill ">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div><br>
        <div class="back-btn-wrapper">
            <a href="/account" class="save-btn">Go back</a>
        </div>
    </div>  
</x-layout>