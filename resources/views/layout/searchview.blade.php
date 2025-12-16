@include('layout.header')

{{-- bawahbar --}}
  <div class="border-b bg-gradient-to-br from-blue-900 to-blue-800 text-gray-200 text-[15px] font-normal">
    <div class="max-w-[1409px] mx-auto flex justify-start py-2">
      <div class="flex space-x-6">
        <h2 class="mt-2"> 
          Hasil Pencarian Anda untuk:
          <i>
          <p class="text-[32px] font-medium">
            "{{ $keyword }}"
          </p>
          </i>
        </h2>
      </div>
    </div>
  </div>

<div class="mt-20 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 
  gap-x-2 gap-y-12 justify-items-center">

  @forelse($products ?? collect() as $search)
    <div class="group border rounded-md overflow-hidden max-w-[200px] hover:shadow-lg transition-shadow">
      <a href="{{ url(path: 'product/'.$search->id) }}">
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
<div class="mb-44"></div>

@include('layout.footer')