<x-layout>

    {{-- <button class = "headbut"><a href=" {{route('products.productPage')}}">go back</a></button> --}}
{{-- display success message if one exists in the session --}}
    @if (session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
{{-- Display all validation or error messages --}}
    @if ($errors->any())
        <div class="alert alert-danger" id="danger-alert">
            @foreach ($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
    @endif
 {{-- Main product page container with vertical padding --}}
    <div class="container py-5">
       
       <div class="row g-5">
            <div class="col-md-6">
                <div class="row row-cols-lg-1 g-1">
                    <div class="card border-1 shadow-sm"> 
                        @foreach($product->images as $image)
                            <img src="{{asset('images/products/' . $image->product_image)}}" alt="{{$product->name}}" class="card-img-top">
                        @endforeach
                    </div>
                </div>
            </div>
 {{-- Product name --}}
            <div class="col-md-6">
                <h2 class="fw-bold mb-2">{{$product->name}}</h2><br>
                @if($product->is_reward)
                    <h3 class="text-success fw-bold mb-4">{{$product->points_cost}}</h3>
                @else
                    <h3 class="text-success fw-bold mb-4">£{{$product->price}}</h3>
                @endif
    {{-- Product description section --}}
                <div>
                    <h5 class="fw-bold">Product Information</h5>
                    <p class="text-grey"> {{$product->product_description}}</p>
                </div>
                    
                <div class="card modeBoxes border-1 rounded-3 mb-5">    
                    <div class="card-body">
       {{-- Form to add product to basket --}}
                        <form action="{{route('basket.add', $product->id)}}" method="POST" novalidate>
                            @csrf
                            <div class="row g-2 align-items-center">
            
                                {{-- Quantity input --}}
                                <div class="col-3">
                                    <label for="quantity" class="form-label small fw-bold">Qty:</label><br><br>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control"><br>
                                </div>
             {{-- Add to basket button --}} 
                                <div class="col-9 pt-4">
                                <button class = "btn btn-success w-100 fw-bold py-2" type="submit"><i class="bi bi-cart-plus me-2"></i>Add to Basket</button>
                                </div>
                            </div>
                        </form>
{{-- Display current stock level --}}
                        <p><i class="bi bi-box-seam me-1"></i> Stock: <strong>{{ $product->stock->stock }}</strong> available</p>
                        {{-- Wishlist section --}}
                        <div class="mt-3">
                            {{-- Only logged-in users can add/remove wishlist items --}}
                        @auth
                        @php
                            $isFavourited = auth()->user()
                                            ->favouriteProducts()
                                            ->where('products.id', $product->id)
                                            ->exists();
                        @endphp
{{-- If product is already in wishlist, show remove button --}}
                        @if($isFavourited)
                        <form method="POST" action="{{ route('wishlist.destroy', $product) }}">
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger w-100 fw-bold">
                         <i class="bi bi-heart-fill me-2"></i>Remove from Wishlist
                        </button>
                         </form>
      {{-- Otherwise show add to wishlist button --}}
                         @else
                            <form method="POST" action="{{ route('wishlist.store', $product) }}">
                                @csrf
                                    <button type="submit" class="btn btn-outline-success w-100 fw-bold">
                         <i class="bi bi-heart me-2"></i>Add to Wishlist
                </button>
            </form>
        @endif
     {{-- If user is not logged in, show login link --}}
    @else
        <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100 fw-bold">
            <i class="bi bi-person me-2"></i>Login to add to Wishlist
        </a>
    @endauth
</div>
                        
                    </div>
                </div>
            </div>
         {{-- Admin-only controls for editing and deleting the product --}}
            @if(Auth::check() && Auth::user()->role === 'admin')
                <div class="d-flex gap-2">
                    {{-- Edit product button --}}
                    <a href="{{ route('product.edit', $product) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                    {{-- Delete product form --}}
                    <form action ="{{ route('product.destroy', $product) }}" method="POST">
                            @csrf
                            @method('DELETE')
                             {{-- Confirmation prompt before deleting --}}
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-outline-danger btn-sm"> Delete Product</button>
                    </form>
                    <hr>
                </div>
            @endif
            </div>
        </div>

        <div>
            {{-- Reviews section --}}
            <h2 class="fw-bold mb-3">Reviews</h2>

            @php
                $avg = round($product->reviews->avg('rating') ?? 0, 1);
                $count = $product->reviews->count();
            @endphp
{{-- Display average rating and review count --}}
            <p class="mb-1">
                Average rating: <strong>{{ $avg }}</strong> / 5
                ({{ $count }} {{ $count === 1 ? 'review' : 'reviews' }})
            </p>

            {{-- show stars for average --}}
            
            <p style="font-size: 22px; line-height: 1;">
                @for ($i = 1; $i <= 5; $i++)
                    {{ $i <= round($avg) ? '★' : '☆' }}
                @endfor
            </p>
{{-- Logged-in users can leave a review --}}
            @if(Auth::check())
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Leave a review</h3>
 {{-- Review submission form --}}
                        <form method="POST" action="{{ route('reviews.store', $product) }}">
                            @csrf
                              {{-- Rating dropdown --}}
                            <div class="mb-2">
                                <label for="rating" class="form-label fw-bold">Rating</label>
                                <select name="rating" id="rating" class="form-select" required>
                                    <option value="">-- Select --</option>
                    {{-- Generate options from 5 stars down to 1 star --}}
                                    @for ($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                            {{ $i }} star{{ $i === 1 ? '' : 's' }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
 {{-- Optional written review --}}
                            <label for="comment" class="form-label fw-bold">Review (optional)</label>
                            <textarea name="comment" id="comment" rows="4" cols="50" maxlength="1000"  class="form-control">{{ old('comment') }}</textarea><br>

                            <button type="submit" class="btn btn-outline-secondary btn-sm">Post review</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-danger">
                    <p><a href="{{ route('login') }}">Log in</a> to leave a review.</p>
                </div>
            @endif

            {{-- list reviews --}}
            @if($product->reviews->isEmpty())
                <p>No reviews yet.</p>
            @else
                <h4 class="fw-bold mb-3">What people are saying</h4>
                @foreach($product->reviews->sortByDesc('created_at') as $review)
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">
                            <strong>{{ $review->user->name ?? 'User' }}</strong>
                            <span style="margin-left:10px;">
                                @for ($i = 1; $i <= 5; $i++)
                                    {{ $i <= $review->rating ? '★' : '☆' }}
                                @endfor
                            </span>
                            <div style="font-size: 12px; opacity: 0.8;">
                                {{ $review->created_at->format('d M Y') }}
                            </div>
                            @if($review->comment)
                                <p>{{ $review->comment }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
    </div>
 
</x-layout>

<script>

    //these scripts set the success and failure messages to fade out
    //after 2 seconds of being on screen
    //looks badboy

    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('danger-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }, 2000);
        }
    });
</script>