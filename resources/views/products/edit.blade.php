<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Products</h1>
    <div class="">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form action="{{ route('products.update', ['product' => $product]) }}" method="POST">
        @csrf
        @method('put')
        <div class="">
            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="name" value="{{ $product->name }}"/>
        </div>
        <div class="qty">
            <label for="">Qty:</label>
            <input type="text" name="qty" placeholder="qty" value="{{ $product->qty }}"/>
        </div>
        <div class="price">
            <label for="">Price:</label>
            <input type="text" name="price" placeholder="price" value="{{ $product->price }}"/>
        </div>
        <div class="">
            <label for="description">Description:</label>
            <input type="text" name="description" placeholder="description" value="{{ $product->description }}"/>
        </div>
        <div class="">
            <input type="submit" value="Update">
        </div>
    </form>
</body>
</html>
