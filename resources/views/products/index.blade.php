<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>  
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
<div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="my-title">Product List</h1>

    <form action="{{ route('products.index') }}" method="GET" class="d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Search by name..." value="{{ request('search') }}">
        <button type="submit" class="my-btn-primary">Search</button>
    </form>
</div>

<a href="{{ route('products.create') }}" class="my-btn-primary mb-3 d-inline-block">Add New Product</a>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->quantity }}</td>
                <td class="d-flex gap-2">
                <a href="{{ route('products.edit', $product->id) }}" class="my-btn-warning">Edit</a>
    
  <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="my-btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
</td>
 </tr>
     
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
