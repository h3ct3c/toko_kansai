@include('layout.header')

{{-- bawahbar --}}
  <div class=" text-gray-900 text-[15px] font-semiblod mt-6">
    <div class="max-w-[1410px] mx-auto flex justify-start py-1">
      <div class="flex space-x-8">
        <a href="" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">Home</a>
      </div>
    </div>
  </div>

<div class="mt-20 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
  gap-x-2 gap-y-12 justify-items-center">

  @forelse($products ?? collect() as $search)
    <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
      <a href="{{ url('/  ') }}">
        <img src="{{ asset('img/'.$search->image) }}"
             alt="{{ $search->name }}" 
             class="w-full h-[200px] object-cover bg-gray-200 group-hover:opacity-60 p-4" />
        <div class="p-3 text-center">
          <h3 class="text-sm text-gray-700 font-semibold">{{ $search->name }}</h3>
          <p class="mt-3 text-sm text-red-500 font-semibold">
            RP.{{ number_format($search->price, 0, ',', '.') }}
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