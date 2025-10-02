@if($products->isEmpty())
    <p class="text-gray-600">Tidak ada produk yang cocok.</p>
@else
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($products as $home)
            <div class="border rounded-lg p-3 shadow hover:shadow-md">
                <h3 class="font-semibold">{{ $product->name }}</h3>
                <p class="text-sm text-gray-600">{{ $product->description }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endif
