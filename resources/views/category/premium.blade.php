@include("layout.header")

<div class="mb-16"></div>


@php
    use App\Models\Product;

    // Ganti angka 1 sesuai kategori yang kamu mau tampilkan
    $categoryId = 4;
    $products = Product::where('category_id', $categoryId)->get();
@endphp

<div class="mt-12 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-2 gap-y-12 justify-items-center">
    @forelse ($products as $product)
        <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
            <a href="{{ url('product/'.$product->id) }}">
                <img src="{{ asset('img/' . $product->image) }}" 
                     alt="{{ $product->name }}"
                     class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
                <div class="p-3 text-center">
                    <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
                    <p class="mt-3 text-sm text-red-500 font-semibold">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </p>
                    <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
                </div>
            </a>
        </div>
    @empty
        <p class="text-center col-span-full text-gray-500">Belum ada produk tersedia di kategori ini.</p>
    @endforelse
</div>

  
<div class="mb-96"></div>
@include('layout.footer')



