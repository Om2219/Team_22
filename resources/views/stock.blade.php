<x-layout>

<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success"> {{ session('success') }} </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger"> {{ session('error') }} </div>
    @endif

    <div class="mb-4 text-left">
        <h1 class="fw-bold">Stock Checker</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered align-middle">

                <thead>
                    <tr class="text-center">
                        <th>Product Name</th>
                        <th>Current Stock</th>
                        <th>Update Stock</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($products as $product)
                        <tr class="text-center
                            @if($product->stock && $product->stock->stock <= $product->stock->low_stock)
                                table-danger
                            @endif">

                            <td> {{ $product->name }} </td>

                            <td>
                                @if($product->stock)
                                    @if($product->stock->stock <= $product->stock->low_stock)
                                        <span class="text-danger fw-bold"> {{ $product->stock->stock }} </span>
                                    @else
                                        {{ $product->stock->stock }}
                                    @endif
                                @endif
                            </td>

                            <td>
                                <form action="{{ route('updateStock', $product) }}" method="POST" class="d-inline-flex gap-3">
                                    @csrf
                                    <input type="number" name="stock" value="{{ $product->stock->stock }}"  min="0" class="form-control form-control-sm" style="width:100px;">
                                    <button type="submit" class="btn btn-sm btn-outline-dark"> Update </button>
                                </form>

                                @if($product->stock->stock <= $product->stock->low_stock)
                                    <form action="{{ route('stockRestock', $product) }}" method="POST" class="d-inline ms-2">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success"> Restock </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</x-layout>