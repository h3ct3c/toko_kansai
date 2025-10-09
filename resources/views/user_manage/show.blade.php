@extends('layouts.dashboard')

@section('content')
<div class="min-h-screen w-[1230px] bg-gray-100 px-8 py-10 text-gray-900">
    <!-- Header -->
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-semibold text-gray-800">Detail Pengguna</h1>
        <a href="{{ route('user_manage.index') }}" 
           class="inline-flex items-center gap-2 bg-gray-500 hover:bg-gray-400 text-white px-4 py-2 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-8 w-full mx-auto">
        <div class="space-y-8">
            <!-- ID -->
            <div class="grid grid-cols-2 border-b">
                <p class="font-semibold text-gray-500">ID</p>
                <p>{{ $user->id }}</p>
            </div>

            <!-- Nama -->
            <div class="grid grid-cols-2 border-b">
                <p class="font-semibold text-gray-500">Nama</p>
                <p>{{ $user->name }}</p>
            </div>

            <!-- Email -->
            <div class="grid grid-cols-2 border-b">
                <p class="font-semibold text-gray-500">Email</p>
                <p>{{ $user->email }}</p>
            </div>

            <!-- Role -->
            <div class="grid grid-cols-2 items-center border-b">
                <p class="font-semibold text-gray-500">Role</p>
                <p>
                    @if($user->role === 'admin')
                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">Admin</span>
                    @else
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-medium">User</span>
                    @endif
                </p>
            </div>

            <!-- Status -->
            <div class="grid grid-cols-2 items-center border-b">
                <p class="font-semibold text-gray-500">Status</p>
                <p>
                    @if($user->status === 'active')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium border-b">Active</span>
                    @elseif($user->status === 'inactive')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-medium border-b">Inactive</span>
                    @else
                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-medium border-b">Unknown</span>
                    @endif
                </p>
            </div>

            <!-- Tanggal Akun Dibuat -->
            <div class="grid grid-cols-2 items-center border-b">
                <p class="font-semibold text-gray-500">Dibuat Pada</p>
                <p>
                    {{ $user->created_at->translatedFormat('d F Y • H:i') }}
                </p>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div class="mt-10 flex justify-end">
            <form action="{{ route('user_manage.updateStatus', $user->id) }}" method="POST">
                @csrf
                <input type="hidden" name="status" value="{{ $user->status === 'active' ? 'inactive' : 'active' }}">
                <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white px-5 py-2 rounded-lg font-medium shadow-md transition">
                    {{ $user->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
