@include('layout.header')

<div class="container mx-auto mt-10 px-6">
    <div class="bg-white shadow-xl rounded-2xl p-8">
        <h2 class="text-3xl font-bold text-blue-900 mb-6 border-b pb-3">
            {{ __('messages.Detail Order') }} #{{ $orders->id }}
        </h2>

        {{-- STATUS DAN INFORMASI UMUM --}}
        <div class="grid md:grid-cols-3 gap-6 mb-8">
            <div class="bg-blue-50 rounded-xl p-4">
                <p class="text-gray-600 text-sm">
                    {{ __('messages.Status') }}
                </p>
                <p class="text-lg font-semibold text-blue-900">
                    {{ ucfirst($orders->status) }}
                </p>
            </div>

            <div class="bg-blue-50 rounded-xl p-4">
                <p class="text-gray-600 text-sm">
                    {{ __('messages.Total Item') }}
                </p>
                <p class="text-lg font-semibold text-blue-900">
                    {{ $orders->items->sum('quantity') }}
                </p>
            </div>

            <div class="bg-blue-50 rounded-xl p-4">
                <p class="text-gray-600 text-sm">
                    {{ __('messages.Total Price') }}
                </p>
                <p class="text-lg font-bold text-green-600">
                    Rp{{ number_format($orders->total_price, 0, ',', '.') }}
                </p>
            </div>
        </div>

        {{-- SHIPPING ADDRESS --}}
        <div class="bg-gray-50 rounded-2xl p-6 mb-8 border">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">
                {{ __('messages.Shipping Address') }}
            </h3>

            <div class="grid md:grid-cols-2 gap-4 text-gray-700">
                <p><span class="font-medium">{{ __('messages.Recipient Name') }}:</span> {{ $orders->customer->name ?? '-' }}</p>
                <p><span class="font-medium">{{ __('messages.Phone Number') }}:</span> {{ $orders->nomor_telepon ?? '-' }}</p>
                <p><span class="font-medium">{{ __('messages.Street Address') }}:</span> {{ $orders->jalan ?? '-' }}</p>
                <p><span class="font-medium">{{ __('messages.Sub-district') }}:</span> {{ $orders->kelurahan ?? '-' }}</p>
                <p><span class="font-medium">{{ __('messages.District') }}:</span> {{ $orders->kecamatan ?? '-' }}</p>
                <p><span class="font-medium">{{ __('messages.City') }}:</span> {{ $orders->kota ?? '-' }}</p>
                <p><span class="font-medium">{{ __('messages.Province') }}:</span> {{ $orders->provinsi ?? '-' }}</p>
                <p><span class="font-medium">{{ __('messages.Postal Code') }}:</span> {{ $orders->kode_pos ?? '-' }}</p>
            </div>
        </div>

        {{-- ORDERED PRODUCTS --}}
        @if(isset($orders->items) && count($orders->items) > 0)
            <div class="bg-white border rounded-2xl p-6 shadow-sm mb-8">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">
                    {{ __('messages.Ordered Products') }}
                </h3>

                <div class="flex flex-wrap gap-5">
                    @foreach($orders->items as $item)
                        @php
                            preg_match('/\(([^)]+)\)/', $item->product_name, $match);
                            $colorText = $match[1] ?? null;
                        @endphp

                        <div class="flex flex-col items-center text-center border rounded-xl p-4 shadow-sm hover:shadow-md transition">
                            <img src="{{ asset('img/' . $item->product->image) }}" 
                                 alt="{{ $item->product_name }}" 
                                 class="w-32 h-32 object-cover rounded-lg mb-2">

                            <p class="font-medium text-gray-800 text-sm w-32 truncate">
                                {{ preg_replace('/\s*\([^)]*\)/', '', $item->product_name) }}
                            </p>

                            <p class="text-gray-600 text-xs">
                                {{ __('messages.Quantity') }}: {{ $item->quantity }}
                            </p>

                            @if($colorText)
                                <div class="text-sm mt-2">
                                    {{ __('messages.Color') }}:
                                    <span class="inline-block px-2 py-0.3 rounded-full border"
                                          style="background-color: {{ strtolower($colorText) }};">
                                        {{ ucfirst($colorText) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- BACK BUTTON --}}
        <div class="text-right mt-8">
            <a href="{{ route('order.show') }}" 
               class="inline-block bg-blue-900 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-800 transition shadow-md">
                {{ __('messages.Back to Order List') }}
            </a>
        </div>
    </div>
</div>

<div class="mb-[200px]"></div>

@extends('layout.footer')
