
  <script src="https://cdn.tailwindcss.com"></script>
{{-- Memastikan div flex utama membungkus sidebar dan content --}}
<div class="flex">
    
{{-- Sidebar --}}
@include('layout.adminside')

    {{-- Content Utama: flex-1 agar mengambil sisa lebar --}}
    <div class="flex-1 flex flex-col min-h-screen ms-[266px]">
        <main class="p-6">
            {{-- Header Konten --}}
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900">General Report</h1>
                <button class="text-gray-900 hover:text-gray-600 flex items-center gap-2 font-medium">
                    <svg height="24px" width="24px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#000000;} </style> <g> <path class="st0" d="M403.925,108.102c-27.595-27.595-62.899-47.558-102.459-56.29L304.182,0L201.946,53.867l-27.306,14.454 l-5.066,2.654l8.076,4.331l38.16,20.542l81.029,43.602l2.277-42.859c28.265,7.546,53.438,22.53,73.623,42.638 c29.94,29.939,48.358,71.119,48.358,116.776c0,23.407-4.843,45.58-13.575,65.687l40.37,17.532 c11.076-25.463,17.242-53.637,17.242-83.219C465.212,198.306,441.727,145.904,403.925,108.102z"></path> <path class="st0" d="M296.256,416.151l-81.101-43.612l-2.272,42.869c-28.26-7.555-53.51-22.53-73.618-42.636 c-29.945-29.95-48.364-71.12-48.364-116.767c0-23.427,4.844-45.522,13.576-65.697l-40.37-17.531 c-11.076,25.53-17.242,53.723-17.242,83.228c0,57.679,23.407,110.157,61.21,147.893c27.595,27.594,62.899,47.548,102.453,56.202 l-2.716,51.9l102.169-53.878l27.455-14.454l4.988-2.643l-7.999-4.332L296.256,416.151z"></path> </g> </g></svg>
                    Reload Data
                </button>
            </div>
            
            <hr class="mb-8">

            {{-- Stats Cards (Menggunakan Desain Baru) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                
                {{-- 1. Total Revenue Card (Menggantikan Item Sales) --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                            {{-- Asumsi Anda memiliki variabel $totalRevenue dari controller --}}
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                Rp{{ number_format($totalRevenue ?? 48291000, 0, ',', '.') }}
                            </p>
                            <div class="flex items-center mt-2">
                                <span class="text-green-600 text-sm font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    {{ $revenueChange ?? '12' }}%
                                </span>
                                <span class="text-gray-500 text-sm ml-2">vs bulan lalu</span>
                            </div>
                        </div>
                        {{-- Ikon Revenue (Warna Biru) --}}
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg width="28px" height="28px" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg" aria-labelledby="dolarIconTitle" stroke="#4563f7" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title id="dolarIconTitle">Dolar</title> <path d="M12 4L12 6M12 18L12 20M15.5 8C15.1666667 6.66666667 14 6 12 6 9 6 8.5 7.95652174 8.5 9 8.5 13.140327 15.5 10.9649412 15.5 15 15.5 16.0434783 15 18 12 18 10 18 8.83333333 17.3333333 8.5 16"></path> </g></svg>
                            <i class="fas fa-dollar-sign text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                {{-- 2. Registered Users Card --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Registered Users</p>
                            {{-- Menggunakan variabel $totalUsers dari kode lama Anda --}}
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ number_format($totalUsers) }}
                            </p>
                            <div class="flex items-center mt-2">
                                <span class="text-green-600 text-sm font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    {{ $userChange ?? '8' }}%
                                </span>
                                <span class="text-gray-500 text-sm ml-2">vs bulan lalu</span>
                            </div>
                        </div>
                        {{-- Ikon Users (Warna Hijau) --}}
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg fill="#6ef165" width="26px" height="26px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#6ef165"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>users</title> <path d="M16 21.916c-4.797 0.020-8.806 3.369-9.837 7.856l-0.013 0.068c-0.011 0.048-0.017 0.103-0.017 0.16 0 0.414 0.336 0.75 0.75 0.75 0.357 0 0.656-0.25 0.731-0.585l0.001-0.005c0.875-3.885 4.297-6.744 8.386-6.744s7.511 2.859 8.375 6.687l0.011 0.057c0.076 0.34 0.374 0.59 0.732 0.59 0 0 0.001 0 0.001 0h-0c0.057-0 0.112-0.007 0.165-0.019l-0.005 0.001c0.34-0.076 0.59-0.375 0.59-0.733 0-0.057-0.006-0.112-0.018-0.165l0.001 0.005c-1.045-4.554-5.055-7.903-9.849-7.924h-0.002zM9.164 10.602c0 0 0 0 0 0 2.582 0 4.676-2.093 4.676-4.676s-2.093-4.676-4.676-4.676c-2.582 0-4.676 2.093-4.676 4.676v0c0.003 2.581 2.095 4.673 4.675 4.676h0zM9.164 2.75c0 0 0 0 0 0 1.754 0 3.176 1.422 3.176 3.176s-1.422 3.176-3.176 3.176c-1.754 0-3.176-1.422-3.176-3.176v0c0.002-1.753 1.423-3.174 3.175-3.176h0zM22.926 10.602c2.582 0 4.676-2.093 4.676-4.676s-2.093-4.676-4.676-4.676c-2.582 0-4.676 2.093-4.676 4.676v0c0.003 2.581 2.095 4.673 4.675 4.676h0zM22.926 2.75c1.754 0 3.176 1.422 3.176 3.176s-1.422 3.176-3.176 3.176c-1.754 0-3.176-1.422-3.176-3.176v0c0.002-1.753 1.423-3.174 3.176-3.176h0zM30.822 19.84c-0.878-3.894-4.308-6.759-8.406-6.759-0.423 0-0.839 0.031-1.246 0.089l0.046-0.006c-0.049 0.012-0.092 0.028-0.133 0.047l0.004-0.002c-0.751-2.129-2.745-3.627-5.089-3.627-2.334 0-4.321 1.485-5.068 3.561l-0.012 0.038c-0.017-0.004-0.030-0.014-0.047-0.017-0.359-0.053-0.773-0.084-1.195-0.084-0.002 0-0.005 0-0.007 0h0c-4.092 0.018-7.511 2.874-8.392 6.701l-0.011 0.058c-0.011 0.048-0.017 0.103-0.017 0.16 0 0.414 0.336 0.75 0.75 0.75 0.357 0 0.656-0.25 0.731-0.585l0.001-0.005c0.737-3.207 3.56-5.565 6.937-5.579h0.002c0.335 0 0.664 0.024 0.985 0.070l-0.037-0.004c-0.008 0.119-0.036 0.232-0.036 0.354 0.006 2.987 2.429 5.406 5.417 5.406s5.411-2.419 5.416-5.406v-0.001c0-0.12-0.028-0.233-0.036-0.352 0.016-0.002 0.031 0.005 0.047 0.001 0.294-0.044 0.634-0.068 0.98-0.068 0.004 0 0.007 0 0.011 0h-0.001c3.379 0.013 6.203 2.371 6.93 5.531l0.009 0.048c0.076 0.34 0.375 0.589 0.732 0.59h0c0.057-0 0.112-0.007 0.165-0.019l-0.005 0.001c0.34-0.076 0.59-0.375 0.59-0.733 0-0.057-0.006-0.112-0.018-0.165l0.001 0.005zM16 18.916c-0 0-0 0-0.001 0-2.163 0-3.917-1.753-3.917-3.917s1.754-3.917 3.917-3.917c2.163 0 3.917 1.754 3.917 3.917 0 0 0 0 0 0.001v-0c-0.003 2.162-1.754 3.913-3.916 3.916h-0z"></path> </g></svg>
                            <i class="fas fa-users text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                {{-- 3. Total Orders Card (Menggantikan New Orders) --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Orders</p>
                            {{-- Asumsi Anda memiliki variabel $totalOrders dari controller --}}
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ number_format($totalOrders ?? 2847) }}
                            </p>
                            <div class="flex items-center mt-2">
                                {{-- Jika Order berkurang, gunakan warna merah dan ikon panah bawah --}}
                                @php $orderChange = 15; @endphp
                                @if($orderChange < 0)
                                    <span class="text-red-600 text-sm font-medium flex items-center">
                                        <i class="fas fa-arrow-down mr-1"></i>
                                        {{ abs($orderChange) }}%
                                    </span>
                                @else
                                    <span class="text-green-600 text-sm font-medium flex items-center">
                                        <i class="fas fa-arrow-up mr-1"></i>
                                        {{ $orderChange }}%
                                    </span>
                                @endif
                                <span class="text-gray-500 text-sm ml-2">vs bulan lalu</span>
                            </div>
                        </div>
                        {{-- Ikon Orders (Warna Orange) --}}
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <svg width="27px" height="27px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#e9781c"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M21 5L19 12H7.37671M20 16H8L6 3H3M11 6L13 8L17 4M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="#df7716" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                            <i class="fas fa-shopping-cart text-orange-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                {{-- 4. Total Products Card --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Products</p>
                            {{-- Menggunakan variabel $totalProducts dari kode lama Anda --}}
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ number_format($totalProducts ?? 1247) }}
                            </p>
                            <div class="flex items-center mt-2">
                                <span class="text-green-600 text-sm font-medium flex items-center">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    {{ $productChange ?? '5' }}%
                                </span>
                                <span class="text-gray-500 text-sm ml-2">vs bulan lalu</span>
                            </div>
                        </div>
                        {{-- Ikon Products (Warna Ungu) --}}
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg width="26px" height="26px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#8700f5" stroke="#8700f5"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title></title> <g fill="none" fill-rule="evenodd" id="页面-1" stroke="none" stroke-width="1"> <g id="导航图标" transform="translate(-325.000000, -80.000000)"> <g id="编组" transform="translate(325.000000, 80.000000)"> <polygon fill="#8700f5FFFFFF" fill-opacity="0.01" fill-rule="nonzero" id="路径" points="24 0 0 0 0 24 24 24"></polygon> <polygon id="路径" points="22 7 12 2 2 7 2 17 12 22 22 17" stroke="#8700f5" stroke-linejoin="round" stroke-width="1.5"></polygon> <line id="路径" stroke="#8700f5" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="2" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="#8700f5" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="12" x2="12" y1="22" y2="12"></line> <line id="路径" stroke="#8700f5" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="22" x2="12" y1="7" y2="12"></line> <line id="路径" stroke="#8700f5" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" x1="17" x2="7" y1="4.5" y2="9.5"></line> </g> </g> </g> </g></svg>
                            <i class="fas fa-box text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Slot untuk konten tambahan --}}
            @yield('content')
        </main>
    </div>
</div>