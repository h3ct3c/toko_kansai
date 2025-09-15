@include("layout.header")

@section('content')
<div class="bg-blue-900 py-12">
  <h1 class="text-4xl font-bold text-white text-center">Semua Produk Cat</h1>
  <p class="text-white text-center mt-2">Temukan cat berkualitas untuk semua kebutuhan proyek Anda</p>
</div>

<div class="mt-20 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
  gap-x-2 gap-y-12 justify-items-center">

  @forelse($products ?? collect() as $product)
    <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
      <a href="{{ url('') }}">
        <img src="{{ asset('img/'.$product->image) }}" 
             alt="{{ $product->name }}" 
             class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
        <div class="p-3 text-center">
          <h3 class="text-sm text-gray-700 font-semibold">{{ $product->name }}</h3>
          <p class="mt-3 text-sm text-red-500 font-semibold">
            RP.{{ number_format($product->price, 0, ',', '.') }}
          </p>
          <p class="mt-1 text-sm font-medium text-gray-900">⭐⭐⭐⭐⭐</p>
        </div>
      </a>
    </div>
  @empty
    <div class="mt-44 col-span-full text-center text-gray-500">
      Tidak ada produk untuk ditampilkan.
    </div>
  @endforelse

</div>

<div class="mb-[500px]"></div>

@include('layout.footer')
</body>
</html>
