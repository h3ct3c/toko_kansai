@include('layout.header')

  {{-- bawahbar --}}
  <div class=" text-gray-900 text-[15px] font-sansserif mt-6">
    <div class="max-w-[1410px] mx-auto flex justify-center py-1">
      <div class="flex space-x-8">
        <a href="{{ route('profile.show') }}" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">My Account</a>
        <a href="" class="block py-2 px-2 border-b border-transparent hover:border-gray-900">Address</a>
        <a href="" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">Wishlist</a>
        <a href="{{ route('profile.edit') }}" class="block py-2 px-1 border-b border-transparent hover:border-gray-900">Account Settings</a>
      </div>
    </div>
  </div>

  {{-- Konten Profil --}}
  <div class="flex-1 p-6">
    <div class="max-w-5xl mx-auto mt-7">
      <h2 class="text-3xl font-bold mb-6 text-blue-900">My Account</h2>

      {{-- Personal Details --}}
      <div class="border rounded h-[150px] mb-6 p-6 relative bg-white shadow">
        <h3 class="text-lg font-semibold mb-4">Personal Details</h3>
        <div class="space-y-2 text-sm">
          <p><span class="font-semibold">First Name:</span> {{ explode(' ', $user->name)[0] ?? '' }}</p>
          <p><span class="font-semibold">Last Name:</span> {{ explode(' ', $user->name)[1] ?? '' }}</p>
        </div>
        <a href="{{ route('profile.edit', ['section' => 'personal']) }}"
           class="absolute top-6 right-6 text-gray-600 hover:bg-gray-200 rounded-full p-1">
          Edit
        </a>
      </div>

      {{-- Email & Password --}}
      <div class="border rounded h-[150px] mb-6 p-6 relative bg-white shadow">
        <h3 class="text-lg font-semibold mb-4">Email & Password</h3>
        <div class="space-y-2 text-sm">
          <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
          <p><span class="font-semibold">Password:</span> ••••••••••••</p>
        </div>
        <a href="{{ route('profile.edit', ['section' => 'security']) }}"
           class="absolute top-6 right-6 text-gray-600 hover:bg-gray-200 rounded-full p-1">
          Edit
        </a>
      </div>
    </div>
  </div>
</div>
<div class="mb-96"></div>

@include('layout.footer')
