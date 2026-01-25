<x-layout>
    <h1> Add product</h1>
    
    <form action="{{  route('products.store') }}" method ="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Product Name</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>
        <br>
        <div>
            <label>Category</label><br>
            <input type="text" name="category_name" value="{{ old('category_name') }}" required>
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

        <div>
            <label>Product Images</label><br>
            <input type="file" name="product_image" accept="image/*">
        </div>
        <br>
        <button type ="submit">Add Product</button>
        
        @if ($errors->any())
        <div style="color: red; margin-top: 10px;">
            {{  $errors->first() }}
        </div>
    @endif
    </form>
</x-layout>