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

  {{-- Konten Profil --}}
  <div class="justify-items-center p-6">
    <div class="max-w-5xl mx-auto mt-4">
      <h2 class="text-[42px] font-bold mb-2 text-blue-900">
      <p><span>Hello, </span>
      {{ explode(' ', $user->name)[0] ?? '' }}
     </p>
      </h2>
      <div class="text-lg font-sansserif text-gray-900">Account Overview</div>
     </div>
    </div>

<div class="mb-96"></div>

@include('layout.footer')
