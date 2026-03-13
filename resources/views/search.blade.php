<x-layout>
    {{-- <h2>Search Results for "{{ request()->query('search') }}"</h2> --}}

    {{-- <div class="filters" style="padding: 10px; background: #111010; margin-bottom: 20px; border-radius: 8px;">
        <form action="{{ route('search') }}" method="GET">
            <input type="hidden" name="search" value="{{ request()->query('search') }}">
            
            <label for="sort" style="font-weight: bold; color: hsl(0, 11%, 98%);">Sort By Price:</label>
            <select name="sort" id="sort" onchange="this.form.submit()" style="padding: 5px; border-radius: 4px;">
                <option value="">Newest</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Low to High</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>High to Low</option>
            </select>
        </form>
    </div> --}}

    {{-- <div>
        <ul style="list-style: none; padding: 0; margin: 0;">
            @foreach($products as $product)
                <li class="searchBox">
                    <h3>{{ $product->name }}</h3>
                    @if ($product->images->isNotEmpty())
                        <img src="{{ asset('images/products/' . $product->images->first()->product_image) }}" alt="{{ $product->name }}">
                    @endif
                    <p>Price: £{{ number_format($product->price, 2) }}</p>
                    <button><a href="{{ route('product.show', $product->id) }}">View Details</a></button>
                </li>
            @endforeach     
            
        </ul>
    </div> --}}
    {{-- {{ $products->links() }} --}}

    <div class="container my-4">

        <div class="row mb-4 shadow-sm p-3 bg-white rounded-4 align-items-center border">
            <div class="col-md-6">
                <h4 class="mb-0 fw-bold">
                    Search Results for "{{ request()->query('search') }}"
                </h4>
            </div>

            <div class="col-md-6 d-flex justify-content-md-end mt-3 mt-md-0">
                <form action="{{ route('search') }}" method="GET" class="d-flex align-items-center">
                    <input type="hidden" name="search" value="{{ request()->query('search') }}">
                    <label for="sort" class="me-2 fw-semibold">Sort By:</label>
                    <div class="filterbar">
                        <select name="sort" id="sort" onchange="this.form.submit()" class="form-select form-select-sm">
                            <option value="">Newest</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}> Low to High </option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}> High to Low </option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="row row-cols-lg-4 g-4">

        @foreach($products as $product)

        <div class="col d-flex">

            <div class="card border-1 shadow-sm d-flex flex-column">
                <div class="position-relative overflow-hidden bg-light">
                    @if ($product->images->isNotEmpty())
                        <img src="{{ asset('images/products/' . $product->images->first()->product_image) }}" alt="{{ $product->name }}" class="card-img-top">
                    @endif
                </div>
                <div class="card-body d-flex flex-column text-center border-top">
                    <h4 class="fw-bold text-black mb-2">{{$product->name}}</h4>
                    @if($product->is_reward)
                        <p class="fw-bold text-success mb-2">{{$product->points_cost}} Points</p>
                    @else
                        <p class="fw-bold text-success mb-2">£{{$product->price}}</p>
                    @endif
                    <div class="mt-auto">
                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-dark btn-sm rounded-pill w-100 fw-bold py-2"> View Product </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    <div class="allPrButtons"><div class="d-flex flex-column align-items-center gap-2">{{ $products->links('pagination::bootstrap-5') }}</div>
    </div>
 
</x-layout>