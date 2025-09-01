@extends('layout.app') {{-- kalau pakai layout utama --}}

@section('content')
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
    @forelse ($products as $product)
        <div class="border rounded-md p-4">
            <img src="{{ asset('storage/' . $product->image) }}" 
                 alt="{{ $product->name }}" class="w-full h-40 object-cover mb-2">
            <h2 class="font-bold text-lg">{{ $product->name }}</h2>
            <p class="text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-sm mt-2">{{ $product->description }}</p>
        </div>
    @empty
        <p>Tidak ada produk tersedia.</p>
    @endforelse
</div>
@endsection
