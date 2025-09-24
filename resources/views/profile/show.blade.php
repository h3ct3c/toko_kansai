@extends('layouts.app')

<link href="/src/style.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
<div class="flex min-h-screen">
  {{-- Sidebar --}}
  <div class="w-64 bg-gray-100 border-r">
    @include('layout.userside')
  </div>

  {{-- Konten Profil --}}
  <div class="flex-1 p-6">
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
      <h2 class="text-xl font-semibold mb-4">Profile</h2>

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

    <a href="{{ route('profile.edit') }}"
       class="inline-block mt-3 px-4 py-2 rounded bg-blue-900 hover:bg-blue-700 text-white">
       Edit Profil
    </a>
  </div>
</div>
@endsection
