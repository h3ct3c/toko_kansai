@include('layout.header')

{{-- bawahbar --}}
  <div class="border-b border-gray-300 text-gray-900 text-[15px] font-sansserif mt-4">
    <div class="max-w-[1410px] mx-auto flex justify-center py-1">
      <div class="flex space-x-8">
        <a href="{{ route('profile.show') }}" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">My Account</a>
        <a href="" class="block py-2 px-2 border-b border-transparent hover:border-gray-900">Address</a>
        <a href="" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">Wishlist</a>
        <a href="{{ route('profile.edit') }}" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">Account Settings</a>
      </div>
    </div>
  </div>

{{-- Konten Edit Profil --}}
<div class="flex-1 p-6">
  <div class="max-w-[800px] mx-auto bg-white border rounded-lg shadow-sm p-8">
    <h2 class="text-2xl text-blue-900 font-bold mb-6 tracking-wide border-b pb-3">Account Settings</h2>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      {{-- Nama --}}
      <div>
        <label class="block text-sm font-medium mb-1">Nama</label>
        <input type="text" name="name" 
               value="{{ old('name', $user->name) }}"
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900">
        @error('name') 
          <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
        @enderror
      </div>

      {{-- Email (readonly) --}}
      <div>
        <label class="block text-sm font-medium mb-2">Email</label>
        <input type="email" name="email" 
               value="{{ $user->email }}" readonly
               class="w-full border border-gray-200 bg-gray-100 rounded-md px-4 py-2 text-gray-600 cursor-not-allowed">
      </div>

      {{-- Password Lama --}}
      <div>
        <label class="block text-sm font-medium mb-2">Password Lama</label>
        <input type="password" name="current_password" 
               placeholder="Masukkan password lama"
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900">
        @error('current_password') 
          <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
        @enderror
      </div>

      {{-- Password Baru --}}
      <div>
        <label class="block text-sm font-medium mb-2">Password Baru</label>
        <input type="password" name="password" 
               placeholder="Masukkan password baru"
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900">
        @error('password') 
          <div class="text-red-600 text-sm mt-1">{{ $message }}</div> 
        @enderror
      </div>

      {{-- Konfirmasi Password --}}
      <div>
        <label class="block text-sm font-medium mb-2">Konfirmasi Password Baru</label>
        <input type="password" name="password_confirmation" 
               placeholder="Ulangi password baru"
               class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900">
      </div>

      {{-- Submit --}}
      <div>
        <button type="submit" 
                class="w-full md:w-auto px-6 py-3 font-semibold text-white rounded-md 
                       bg-blue-900 border border-blue-700 shadow-md shadow-blue-800 transition duration-200 ease-out
                       hover:opacity-80 hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-lg 
                       active:translate-x-2 active:translate-y-1 active:shadow-none
                       disabled:opacity-50 disabled:cursor-not-allowed">
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</div>

<div class="mb-32"></div>

@include('layout.footer')
