<x-layout>
    <div class="container my-4">
        <h1 class="mb-0 fw-bold"> Add product</h1><br>

        <form action="{{  route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Product Name</label><br>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
            </div>
            <br>


            <div class="mb-3">
                <label class="form-label fw-bold" for="category_id" class="form-label">Category</label>

                <select class="form-select" name="category_id" id="category_id" class="form-control" required>
                    <option value="">-- Select a category --</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <br>

            <div class="mb-3">
                <label class="form-label fw-bold">Description</label><br>
                <textarea class="form-control" name="product_description">{{  old('product_description') }}</textarea>
            </div>
            <br>

            <div class="row">
                <div class="col mb-3">
                    <label class="form-label fw-bold">Price</label><br>
                    <input class="form-control" type="number" step="0.01" name="price" value="{{ old('price') }}" required>
                </div>
                <br>

                <div class="col mb-3">
                    <label class="form-label fw-bold">Stock</label><br>
                    <input class="form-control" type="number" name="stock" id="stock" min="0" value="{{  old('stock', 0) }}" required>
                </div>
                <br>

                <div class="col mb-3">
                    <label class="form-label fw-bold">Low Stock Threshold</label><br>
                    <input class="form-control" type="number" name="low_stock" id="low_stock" min="0" value="{{  old('low_stock', 29) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Product Images</label><br>
                <input class="form-control" type="file" name="product_image" accept="image/*">
            </div>
            <br>

            <button class="btn btn-outline-secondary btn-sm" type="submit">Add Product</button>

            @if ($errors->any())
                <div style="color: red; margin-top: 10px;">
                    {{  $errors->first() }}
                </div>
            @endif
        </form>
    </div>
</x-layout>