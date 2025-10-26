@include('layout.header')

{{-- bawahbar --}}
  <div class="border-b border-gray-300 text-gray-900 text-[15px] font-sansserif shadow-sm mt-4">
    <div class="max-w-[1410px] mx-auto flex justify-center py-1">
      <div class="flex space-x-8">
        <a href="{{ route('profile.show') }}" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">My Account</a>
        <a href="{{ route('profile.edit') }}" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">Account Settings</a>
      </div>
    </div>  
  </div>

{{-- Konten Edit Profil (Main Content) --}}
<div class="min-h-screen pt-12 pb-20">
    {{-- max-w-xl untuk centering dan tampilan lebih fokus --}}
    <div class="max-w-[900px] mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Container Form di tengah --}}
        <div class="bg-white rounded-xl shadow-2xl p-8 border border-gray-100">
            <h2 class="text-2xl font-bold text-blue-900 mb-6 border-b pb-4">Account Settings</h2>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                {{-- Bagian Nama --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" id="name" name="name" 
                        value="{{ old('name', $user->name) }}"
                        {{-- Focus ring diubah ke blue-900 --}}
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition duration-150 shadow-sm">
                    @error('name') 
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                {{-- Bagian Email (readonly) --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" 
                        value="{{ $user->email }}" readonly
                        class="w-full border border-gray-200 bg-gray-100 rounded-lg px-4 py-2.5 text-gray-500 cursor-not-allowed">
                    <p class="mt-1 text-xs text-gray-500">Email tidak dapat diubah.</p>
                </div>
                
                {{-- Batas untuk Password --}}
                <div class="border-t border-gray-200 pt-8">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Ubah Password</h3>
                    
                    <div class="space-y-6">
                        {{-- Password Lama --}}
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Password Lama</label>
                            <input type="password" id="current_password" name="current_password" 
                                placeholder="Masukkan password lama Anda"
                                {{-- Focus ring diubah ke blue-900 --}}
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition duration-150 shadow-sm">
                            @error('current_password') 
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        {{-- Password Baru --}}
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                            <input type="password" id="password" name="password" 
                                placeholder="Minimal 8 karakter"
                                {{-- Focus ring diubah ke blue-900 --}}
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition duration-150 shadow-sm">
                            @error('password') 
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                placeholder="Ulangi password baru Anda"
                                {{-- Focus ring diubah ke blue-900 --}}
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-blue-900 transition duration-150 shadow-sm">
                        </div>
                    </div>
                </div>
                
                {{-- Tombol Submit --}}
                <div class="pt-6">
                    <button type="submit" 
                        {{-- Warna tombol utama diubah ke blue-900 --}}
                        class="w-full inline-flex justify-center items-center px-6 py-3 font-semibold text-white bg-blue-900 rounded-lg shadow-md transform hover:scale-[1.02] transition duration-300 
                            hover:bg-blue-800 hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="mb-32"></div>

@include('layout.footer')
