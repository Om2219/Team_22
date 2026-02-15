<x-layout>
    <h1> Add product</h1>

    <form action="{{  route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Product Name</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>

                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">-- Select a category --</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>
        <br>
        <div>
            <label>Description</label><br>
            <textarea name="product_description">{{  old('product_description') }}</textarea>
        </div>

        <br>

        <div>
            <label>Price</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}" required>
        </div>

        <br>
        <div class="" mb-3>
            <label>Stock</label>
            <input type="number" name="stock" id="stock" min="0" value="{{  old('stock', 0) }}" required>
        </div>
        <br>
        <div class="mb-3">
            <label>Low Stock Threshold</label>
            <input type="number" name="low_stock" id="low_stock" min="0" value="{{  old('low_stock', 29) }}" required>
        </div>

        <div>
            <label>Product Images</label><br>
            <input type="file" name="product_image" accept="image/*">
        </div>
        <br>
        <button type="submit">Add Product</button>

        @if ($errors->any())
            <div style="color: red; margin-top: 10px;">
                {{  $errors->first() }}
            </div>
        @endif
    </form>
</x-layout>