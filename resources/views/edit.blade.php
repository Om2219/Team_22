<x-layout>

<h1> Edit: {{$product->name}}</h1>

    <form action="{{  route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Product Name</label><br>
            <input type="text" name="name" value="{{ old('name',$product->name) }}" required>
        </div>

        <br>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>

            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Select a category --</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <br>

        <div>
            <label>Description</label><br>
            <textarea name="product_description">{{  old('product_description', $product->product_description) }}</textarea>
        </div>

        <br>

        <div>
            <label>Price</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>
        </div>

        <br>

        <div class="" mb-3>
            <label>Stock</label>
            <input type="number" name="stock" id="stock" min="0" value="{{  old('stock', $product->stock->stock) }}" required>
        </div>

        <br>
        <div class="mb-3">
            <label>Low Stock Threshold</label>
            <input type="number" name="low_stock" id="low_stock" min="0" value="{{  old('low_stock', $product->stock->low_stock) }}" required>
        </div>

        <div>
            <label>Product Images</label><br>
                @if ($product->images->isNotEmpty())
                   <img src="{{ asset('images/products/' . $product->images->first()->product_image) }}" alt="{{ $product->name }}">
                @endif
            <input type="file" name="product_image" accept="image/*">
        </div>

        <br>
        <button type="submit">update Product</button>

        @if ($errors->any())
            <div style="color: red; margin-top: 10px;">
                {{  $errors->first() }}
            </div>
        @endif
    </form>

</x-layout>