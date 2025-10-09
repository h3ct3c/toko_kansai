@extends('layouts.dashboard')

@section('content')
<div class="min-h-screen w-[1260px] bg-gray-100 px-8 py-10 text-gray-900">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
        <h1 class="text-3xl font-semibold text-gray-800">Manajemen Pengguna</h1>
        <a href="{{ route('dashboard') }}" 
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 6h18M3 18h18" />
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <!-- Table Container -->
    <div class="bg-white shadow-lg rounded-2xl border border-gray-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm text-gray-700">
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold tracking-wide">
                    <tr>
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Dibuat Pada</th>
                        <th class="px-6 py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if($user->role === 'admin')
                                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-medium">Admin</span>
                                @else
                                    <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-medium">User</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($user->status === 'active')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-medium">Active</span>
                                @elseif($user->status === 'inactive')
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-medium">Inactive</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-medium">Unknown</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->created_at->translatedFormat('d M Y • H:i') }}
                            </td>
                            <td class="px-6 py-4 flex justify-center gap-3">
                                <!-- Detail -->
                                <a href="{{ route('user_manage.show', $user->id) }}" 
                                   class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-2 rounded-lg text-xs font-medium shadow transition">
                                    Detail
                                </a>

                                <!-- Status toggle -->
                                <form action="{{ route('user_manage.updateStatus', $user->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="{{ $user->status === 'active' ? 'inactive' : 'active' }}">
                                    <button type="submit"
                                            class="{{ $user->status === 'active' 
                                                ? 'bg-red-500 hover:bg-red-600' 
                                                : 'bg-green-500 hover:bg-green-600' }} 
                                                text-white px-3 py-2 rounded-lg text-xs font-medium shadow transition">
                                        {{ $user->status === 'active' ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($users->isEmpty())
            <div class="p-8 text-center text-gray-500">
                Tidak ada pengguna yang ditemukan.
            </div>
        @endif
    </div>
</div>
@endsection
