@extends('layouts.admin')

@section('page_title', 'User Manage')

@section('content')
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
    <h1 class="text-3xl font-semibold text-gray-800">Manajemen Pengguna</h1>

    <!-- Form hapus terpilih -->
    <form id="bulkDeleteForm" action="{{ route('user_manage.deleteSelected') }}" method="POST" class="flex items-center">
        @csrf
        @method('DELETE')
        <input type="hidden" name="selected_ids" id="selected_ids">
        <button type="submit"
            onclick="return confirm('Hapus semua user terpilih?')"
            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-sm transform hover:scale-[1.02] transition duration-300">
            Hapus Terpilih
        </button>
    </form>
</div>

<!-- Container tabel -->
<div class="bg-white shadow-xl rounded-2xl border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full text-left text-sm text-gray-700">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs font-semibold tracking-wide border-b">
                <tr>
                    <th class="px-6 py-4 w-4">
                        <input type="checkbox" id="select-all" class="rounded text-blue-600 focus:ring-blue-500">
                    </th>
                    <th class="px-6 py-4 w-5/12">Nama</th>
                    <th class="px-6 py-4 w-2/12">Role</th>
                    <th class="px-6 py-4 w-2/12">Dibuat</th>
                    <th class="px-6 py-4 w-1/12 text-center">Status</th>
                    <th class="px-6 py-4 w-2/12 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach($users as $user)
                <tr class="hover:bg-gray-50 transition">
                    <!-- Checkbox untuk multiple delete -->
                    <td class="px-6 py-4">
                        <input type="checkbox" name="selected_ids[]" value="{{ $user->id }}" form="bulkDeleteForm"
                            class="user-checkbox rounded text-blue-600 focus:ring-blue-500">
                    </td>

                    <!-- Nama dan Email -->
                    <td class="px-6 py-3">
                        <div class="flex flex-col">
                            <span class="font-semibold text-gray-900">{{ $user->name }}</span>
                            <span class="text-xs text-gray-500">{{ $user->email }}</span>
                        </div>
                    </td>

                    <!-- Role -->
                    <td class="px-6 py-3 text-gray-700">
                        {{ $user->role === 'admin' ? 'Admin' : 'User' }}
                    </td>

                    <!-- Tanggal dibuat -->
                    <td class="px-6 py-3 text-gray-700">
                        {{ $user->created_at->translatedFormat('d M Y') }}
                    </td>

                    <!-- Status -->
                    <td class="px-6 py-3 text-center">
                        @if($user->isOnline())
                            <span class="inline-flex items-center gap-2 text-xs font-medium text-green-700">
                                <span class="h-2 w-2 bg-green-500 rounded-full"></span>Online
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 text-xs font-medium text-blue-900">
                                <span class="h-2 w-2 bg-blue-900 rounded-full"></span>Offline
                            </span>
                        @endif
                    </td>

                    <!-- Aksi -->
                    <td class="px-6 py-3 flex justify-center gap-3">
                        <!-- Tombol Edit -->
                        <a href="{{ route('user_manage.edit', $user->id) }}" 
                            class="inline-flex items-center h-8 gap-1.5 border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 px-3 py-1.5 rounded-lg text-xs font-medium shadow-sm transform hover:scale-[1.02] transition duration-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Edit
                        </a>

                        <!-- Tombol Delete -->
                        <form action="{{ route('user_manage.destroy', $user->id) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center gap-1.5 bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-lg text-xs font-medium shadow-sm transform hover:scale-[1.02] transition duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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

    @if($users->isEmpty())
    <div class="p-8 text-center text-gray-500">
        Tidak ada pengguna yang ditemukan.
    </div>
    @endif
</div>

<!-- Script pilih semua dan kirim ID terpilih -->
<script>
    const selectAll = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('.user-checkbox');
    const bulkForm = document.getElementById('bulkDeleteForm');
    const hiddenInput = document.getElementById('selected_ids');

    selectAll.addEventListener('change', () => {
        checkboxes.forEach(cb => cb.checked = selectAll.checked);
    });

    bulkForm.addEventListener('submit', (e) => {
        const selected = Array.from(checkboxes)
            .filter(cb => cb.checked)
            .map(cb => cb.value);

        if (selected.length === 0) {
            e.preventDefault();
            alert('Pilih minimal satu user untuk dihapus.');
            return;
        }

        hiddenInput.value = selected.join(',');
    });
</script>
@endsection
