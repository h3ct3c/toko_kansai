@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-xl font-semibold mb-4">Edit Profil</h2>

  <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label class="block text-sm font-medium">Nama</label>
      <input type="text" name="name" value="{{ old('name', $user->name) }}"
             class="w-full border rounded px-3 py-2">
      @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <div class="mb-4">
      <label class="block text-sm font-medium">Foto Profil</label>
      <div class="mt-2 flex items-center">
        <img
          src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('images/default-avatar.png') }}"
          alt="avatar"
          class="w-16 h-16 rounded-full object-cover mr-3"
        >
        <input type="file" name="avatar" accept="image/*">
      </div>
      @error('avatar') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="px-4 py-2 border-blue-500 bg-sky-400 hover:bg-blue-600 text-black rounded">Simpan</button>
  </form>
</div>
@endsection
