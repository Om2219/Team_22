<x-layout>
    <div class="container my-4">
    
        <div class="row mb-4 shadow-sm p-3 rounded-4 align-items-center border modeBoxes">
            <div class="col-md-6"><h4 class="mb-0 fw-bold">Products</h4></div>
            <div class="col-md-6 d-flex justify-content-md-end mt-3 mt-md-0">
                <form action="{{ url()->current() }}" method="GET" class="d-flex align-items-center">
                    <label for="sort" class="me-2 fw-semibold">Sort By:</label>
                    <div class="filterbar">
                        <select name="sort" id="sort" onchange="this.form.submit()" class="form-select form-select-sm">
                            <option value="">Newest</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Low to High</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>High to Low</option>
                            <option value="rating_desc" {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>Highest Rated</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        {{-- Product layout 4 columns --}}
        <div class="row row-cols-lg-4 g-4">
        
        {{-- loops through all the products--}}
            @foreach($products as $product)
                <div class="col d-flex">
                    {{-- might remove the border im not sure --}}
                    <div class="card border-1 shadow-sm d-flex flex-column modeBoxes">
                        <div class="position-relative overflow-hidden bg-light">
                            @if ($product->images->isNotEmpty())
                            <img src="{{ asset('images/products/' . $product->images->first()->product_image) }}" alt="{{ $product->name }}" class="card-img-top">
                            @endif
                        </div>

                        <br>
                        {{-- might remove the border top im not sure --}}
                        <div class="card-body d-flex flex-column text-center border-top">

                            <h4 class="fw-bold mb-2">{{$product->name}}</h4>
                            @if($product->is_reward)
                                <p class="fw-bold text-success mb-2">{{$product->points_cost}} Points<p>
                            @else
                                <p class="fw-bold text-success mb-2">£{{$product->price}}<p>
                            @endif
                            <br>
                            <div class="mt-auto">
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-dark btn-sm rounded-pill w-100 fw-bold py-2 viewProducts">View Product</a>
                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
            
        </div>

        {{-- Product recently viewed are stored and displaye dat the bottom --}}
        <div class="container my-4" style="width: 67%;">

            @if(isset($rvp) && $rvp->count())
            <div class="mb-4 text-center">
                <h3>continue browsing where you left off</h3>
            </div>
                <div class="row row-cols-lg-4 g-4">
                    @foreach($rvp as $product)
                        <div class="col d-flex">
                            {{-- might remove the border im not sure --}}
                            <div class="card border-1 shadow-sm d-flex flex-column">
                                <div class="position-relative overflow-hidden bg-light">
                                    @if ($product->images->isNotEmpty())
                                    <img src="{{ asset('images/products/' . $product->images->first()->product_image) }}" alt="{{ $product->name }}" class="card-img-top">
                                    @endif
                                </div>

                                <br>
                                {{-- might remove the border top im not sure --}}
                                <div class="card-body d-flex flex-column text-center border-top">

                                    <h4 class="fw-bold mb-2">{{$product->name}}</h4>
                                    @if($product->is_reward)
                                        <p class="fw-bold text-success mb-2">{{$product->points_cost}} Points<p>
                                    @else
                                        <p class="fw-bold text-success mb-2">£{{$product->price}}<p>
                                    @endif
                                    <br>
                                    <div class="mt-auto">
                                        <a href="{{ route('product.show', $product->id) }}" class="btn btn-outline-dark btn-sm rounded-pill w-100 fw-bold py-2 viewProducts">View Product</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            @endif
        </div>
    </div>

    <div class="allPrButtons"><div class="d-flex flex-column align-items-center gap-2">{{ $products->links('pagination::bootstrap-5') }}</div>
    </div>
</x-layout>


