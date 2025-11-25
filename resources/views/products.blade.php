<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Product List</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category ID</th>
                <th>Description</th>
                <th>Price</th>
                <th>Created When</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category_id }}</td>
                <td>{{ $product->product_description }}</td>
                <td>{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->created_when ?? '-' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

</body>
</html>