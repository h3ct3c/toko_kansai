{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-2xl shadow">
    <h2 class="text-2xl font-bold mb-6">Profile Settings</h2>

    @if(session('success'))
        <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Avatar --}}
        <div>
            <label class="block font-medium">Avatar</label>
            <div class="flex items-center gap-4">
                <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : '/img/default-avatar.png' }}" 
                     class="w-16 h-16 rounded-full object-cover">
                <input type="file" name="avatar" accept="image/*">
            </div>
        </div>

        {{-- Name --}}
        <div>
            <label class="block font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                   class="w-full border rounded p-2">
        </div>

        {{-- Phone --}}
        <div>
            <label class="block font-medium">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" 
                   class="w-full border rounded p-2">
        </div>

        {{-- Email (readonly) --}}
        <div>
            <label class="block font-medium">Email</label>
            <input type="email" value="{{ $user->email }}" class="w-full border rounded p-2 bg-gray-100" readonly>
        </div>

        {{-- Password --}}
        <div>
            <label class="block font-medium">New Password</label>
            <input type="password" name="password" class="w-full border rounded p-2">
            <input type="password" name="password_confirmation" placeholder="Confirm password" 
                   class="w-full border rounded p-2 mt-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save Changes</button>
    </form>
</div>
@endsection
