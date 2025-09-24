@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
  <h2 class="text-xl font-semibold mb-4">Profil Saya</h2>

  @if(session('success'))
    <div class="mb-3 text-green-700">{{ session('success') }}</div>
  @endif

  <div class="mb-4">
    <img
      src="{{ $user->avatar ? asset('storage/'.$user->avatar) : asset('images/default-avatar.png') }}"
      alt="avatar"
      class="w-16 h-16 rounded-full object-cover"
    >
  </div>

  <div class="mb-2">
    <strong>Nama:</strong> {{ $user->name }}
  </div>

  <div class="mb-2">
    <strong>Email:</strong> {{ $user->email }}
  </div>

  <a href="{{ route('profile.edit') }}" class="text-blue-600 border rounded-lg">Edit Profil</a>
</div>
@endsection
