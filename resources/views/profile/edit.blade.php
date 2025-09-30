@include('layout.header')

  {{-- bawahbar --}}
  <div class=" text-gray-900 text-[15px] font-sansserif mt-6">
    <div class="max-w-[1410px] mx-auto flex justify-center py-1">
      <div class="flex space-x-8">
        <a href="{{ route('profile.show') }}" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">My Account</a>
        <a href="" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">Address</a>
        <a href="" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">Wishlist</a>
        <a href="{{ route('profile.edit') }}" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">Account Settings</a>
      </div>
    </div>
  </div>

  {{-- Konten Edit Profil --}}
  <div class="flex-1 p-6">
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow-">
      <h2 class="text-xl font-semibold mb-4">Edit Profil</h2>
      
      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        

        {{-- Nama --}}
        <div class="mb-4">
          <label class="block text-sm font-medium">Nama</label>
          <input type="text" name="name" 
                 value="{{ old('name', $user->name) }}"
                 class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-900">
          @error('name') 
            <div class="text-red-600 text-sm">{{ $message }}</div> 
          @enderror
        </div>

        {{-- Email --}}
        <div class="mb-4">
          <label class="block text-sm font-medium">Email</label>
          <input type="email" name="email" 
                 value="{{ old('email', $user->email) }}"
                 class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-900">
          @error('email') 
            <div class="text-red-600 text-sm">{{ $message }}</div> 
          @enderror
        </div>

        {{-- Password --}}
        <div class="mb-4">
          <label class="block text-sm font-medium">Password</label>
          <input type="password" name="password" 
                 placeholder="********"
                 class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
          @error('password') 
            <div class="text-red-600 text-sm">{{ $message }}</div> 
          @enderror
        </div>

        <button type="submit" 
                class="flex ps-1 w-max mt-2">
  <a 
    class="flex items-center gap-2 justify-items-center shrink-0 text-center rounded-md 
           px-5 py-2.5 font-medium text-white 
           bg-gradient-to-br from-gray-400 to-gray-500 border border-gray-400 shadow-md shadow-gray-500
           transition duration-200 ease-out
           hover:opacity-80 hover:translate-x-0.5 hover:translate-y-0.5 hover:shadow-lg 
           active:translate-x-2 active:translate-y-1 active:shadow-none
           disabled:opacity-50 disabled:cursor-not-allowed">
           
    <span>submit</span>
  </a>
</div>
        </button>
      </form>
    </div>
  </div>
</div>
<div class="mb-96"></div>

@include('layout.footer')