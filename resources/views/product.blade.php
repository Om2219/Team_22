<x-layout>

    {{-- <button class = "headbut"><a href=" {{route('products.productPage')}}">go back</a></button> --}}
 
    <div class="productsBox ">
    {{-- <p> place holder </p> --}}
       <div>
        @foreach($product->images as $image)
            <img src="{{asset('images/products/' . $image->product_image)}}" alt="{{$product->name}}" class = "imageIcon">
        @endforeach
       </div>
 
        <div>
            <h2>{{$product->name}}</h2>
            <p>£{{$product->price}}<p>

            @if (session('error')) {{ session('error') }} @endif
        
            <form action="{{route('basket.add', $product->id)}}" method="POST" novalidate>
                @csrf
                <label for="quantity">Quantity:</label><br><br>
                <input type="number" name="quantity" id="quantity" value="1" min="1"><br><br>
                <button class = "save-btn" type="submit">Add to basket</button>
            </form>
            <p>In Stock:<br>{{$product->stock->stock}}</p>
        </div>
    </div><br>
    @auth
        @if(auth()->user()->favouriteProducts->contains($product->id))
        <form method="POST" action="{{ route('wishlist.destroy', $product) }}">
            @csrf
            @method('DELETE')
            <button class="headbut">Remove from wishlist</button>
        </form>
        @else
            <form method="POST" action="{{ route('wishlist.store', $product) }}">
                @csrf<button class="headbut">add to wishlist</button>
            </form>
        @endif
        @else 
            <a href="{{  route('login') }}">
                <button class ="headbut">Login to add to wishlist</button>
            </a>
        @endauth
    <h2>Product Information</h2>
    <p>{{$product->product_description}}<p>

    <div>

       <button class ="headbut"><a href="{{ route('product.edit', $product)}}">Edit Product</a></button>

       <form action ="{{ route('product.destroy', $product) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('MONKEY BYE BYE YES??')"> Delete Product</button>
        </form>
  <hr>

<h2>Reviews</h2>

@php
    $avg = round($product->reviews->avg('rating') ?? 0, 1);
    $count = $product->reviews->count();
@endphp

<p>
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
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
@endif

@if(Auth::check())
    <h3>Leave a review</h3>

    <form method="POST" action="{{ route('reviews.store', $product) }}">
        @csrf

        <label for="rating">Rating</label>
        <select name="rating" id="rating" required>
            <option value="">-- Select --</option>
            @for ($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                    {{ $i }} star{{ $i === 1 ? '' : 's' }}
                </option>
            @endfor
        </select>

        <br><br>

        <label for="comment">Review (optional)</label><br>
        <textarea name="comment" id="comment" rows="4" cols="50" maxlength="1000">{{ old('comment') }}</textarea>

        <br><br>
        <button type="submit">Post review</button>
    </form>
@else
    <p><a href="{{ route('login') }}">Log in</a> to leave a review.</p>
@endif

{{-- list reviews --}}
@if($product->reviews->isEmpty())
    <p>No reviews yet.</p>
@else
    <h3>What people are saying</h3>
    @foreach($product->reviews->sortByDesc('created_at') as $review)
        <div style="border: 1px solid #ccc; padding: 10px; margin: 10px 0;">
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
    @endforeach
@endif
    </div>
 
</x-layout>