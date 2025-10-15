@extends('layouts.admin')

@section('content')
<div class="min-h-screen w-full lg:w-[1230px] lg:ms-[258px] px-4 lg:px-8 py-10 text-gray-900 mx-auto">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
        <h1 class="text-3xl font-semibold text-gray-800">Manajemen Pengguna</h1>
        <a href="{{ route('dashboard') }}" 
           class="inline-flex items-center gap-2 bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12h18M3 6h18M3 18h18" />
            </svg>
            Kembali ke Dashboard
        </a>
    </div>

    <form id="bulkDeleteForm" action="{{ route('user_manage.bulk_delete') }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit"
            onclick="return confirm('Hapus semua user terpilih?')"
            class="mb-4 bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm font-medium transition shadow-sm">
            Hapus Terpilih
        </button>   

        <div class="bg-white shadow-xl rounded-2xl border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full text-left text-sm text-gray-700">
                    <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold tracking-wide border-b">
                        <tr>
                            <th class="px-6 py-4 w-4">
                                <input type="checkbox" id="select-all" class="rounded text-blue-600 focus:ring-blue-500">
                            </th>
                            <th class="px-6 py-4 w-5/12">Nama</th>
                            <th class="px-6 py-4 w-2/12">Posisi (Role)</th>
                            <th class="px-6 py-4 w-2/12">Dibuat</th>
                            <th class="px-6 py-4 w-1/12 text-center">Status</th>
                            <th class="px-6 py-4 w-2/12 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-50 transition">
                                {{-- Checkbox untuk multiple delete --}}
                                <td class="px-6 py-4">
                                    <input type="checkbox" name="ids[]" value="{{ $user->id }}" class="user-checkbox rounded text-blue-600 focus:ring-blue-500">
                                </td>

                                {{-- Nama dan Email --}}
                                <td class="px-6 py-3">
                                    <div class="flex flex-col">
                                        <span class="font-semibold text-gray-900">{{ $user->name }}</span>
                                        <span class="text-xs text-gray-500">{{ $user->email }}</span>
                                    </div>
                                </td>

                                {{-- Role --}}
                                <td class="px-6 py-3 text-gray-700">
                                    {{ $user->role === 'admin' ? 'Admin' : 'User' }}
                                </td>

                                {{-- Tanggal dibuat --}}
                                <td class="px-6 py-3 text-gray-700">
                                    {{ $user->created_at->translatedFormat('d M Y') }}
                                </td>

                                {{-- Status online/offline --}}
                                <td class="px-6 py-3">
                                    @if($user->isOnline())
                                        <span class="inline-flex items-center gap-2 text-xs font-medium text-green-700">
                                            <span class="h-2 w-2 bg-green-500 rounded-full"></span>
                                            Online
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-2 text-xs font-medium text-red-700">
                                            <span class="h-2 w-2 bg-red-500 rounded-full"></span>
                                            Offline
                                        </span>
                                    @endif
                                </td>

                                {{-- Aksi Edit & Delete --}}
                                <td class="px-6 py-3 flex justify-end gap-3">
                                    <a href="{{ route('user_manage.edit', $user->id) }}" 
                                       class="inline-flex items-center gap-1.5 border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 px-3 py-1.5 rounded-lg text-xs font-medium transition shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="{{ route('user_manage.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-1.5 bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium transition shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pesan jika kosong --}}
            @if($users->isEmpty())
                <div class="p-8 text-center text-gray-500">
                    Tidak ada pengguna yang ditemukan.
                </div>
            @endif
        </div>
    </form>
</div>

{{-- Script untuk "Pilih Semua" --}}
<script>
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.user-checkbox');

    selectAll.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
    });
</script>
@endsection
