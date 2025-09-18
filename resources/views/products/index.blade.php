<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
    @csrf
    <button type="submit" 
            class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">
        Tambah ke Keranjang
    </button>
</form>

</body>
</html>