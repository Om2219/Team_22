<x-layout>

    {{-- <button class = "headbut"><a href=" {{route('products.productPage')}}">go back</a></button> --}}
 
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
        
            <div class="col-md-6">
                <h2 class="fw-bold mb-2">{{$product->name}}</h2><br>
                <h3 class="text-success fw-bold mb-4">£{{$product->price}}</h3>
                
                @if (session('error')) {{ session('error') }} @endif
                
                <div>
                    <h5 class="fw-bold">Product Information</h5>
                    <p class="text-grey"> {{$product->product_description}}<p>
                </div>
                    
                <div class="card bg-light border-1 rounded-3 mb-5">    
                    <div class="card-body">
                        <form action="{{route('basket.add', $product->id)}}" method="POST" novalidate>
                            @csrf
                            <div class="row g-2 align-items-center">
                                <div class="col-3">
                                    <label for="quantity" class="form-label small fw-bold">Qty:</label><br><br>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" class="form-control"><br>
                                </div>
                                <div class="col-9 pt-4">
                                <button class = "btn btn-success w-100 fw-bold py-2" type="submit"><i class="bi bi-cart-plus me-2"></i>Add to Basket</button>
                                </div>
                            </div>
                        </form>

                        <p><i class="bi bi-box-seam me-1"></i> Stock: <strong>{{ $product->stock->stock }}</strong> available</p>
                        
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('product.edit', $product) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                <form action ="{{ route('product.destroy', $product) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('MONKEY BYE BYE YES??')" class="btn btn-outline-danger btn-sm"> Delete Product</button>
                </form>
                <hr>
            </div>
            </div>
        </div>


        <div >
            <h2 class="fw-bold mb-3">Reviews</h2>

            @php
                $avg = round($product->reviews->avg('rating') ?? 0, 1);
                $count = $product->reviews->count();
            @endphp

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

            @if (session('success'))
                <div class="alert alert-success">
                    <p style="color: green;">{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>    
            @endif

            @if(Auth::check())
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">Leave a review</h3>

                        <form method="POST" action="{{ route('reviews.store', $product) }}">
                            @csrf
                            <div class="mb-2">
                                <label for="rating" class="form-label fw-bold">Rating</label>
                                <select name="rating" id="rating" class="form-select" required>
                                    <option value="">-- Select --</option>
                                    @for ($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                            {{ $i }} star{{ $i === 1 ? '' : 's' }}
                                        </option>
                                    @endfor
                                </select>
                            </div>

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