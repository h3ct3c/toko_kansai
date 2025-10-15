<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserManageController extends Controller
{
    public function __construct()
    {
        // Middleware biar cuma admin yang bisa akses semua method di sini
        $this->middleware('admin');
    }

    // ✅ Tambahin ini buat nampilin daftar semua user
    public function index()
    {
        $users = User::all();
        return view('user_manage.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user_manage.show', compact('user'));
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('user_manage.index')->with('success', 'Role berhasil diperbarui.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->save();

        return redirect()->route('user_manage.index')->with('success', 'Status berhasil diperbarui.');
    }

    public function bulkDelete(Request $request)
{
    $ids = $request->ids;
    if ($ids) {
        \App\Models\User::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', count($ids) . ' pengguna berhasil dihapus.');
    }
    return redirect()->back()->with('error', 'Tidak ada pengguna yang dipilih.');
}

public function edit($id)
{
    $user = User::findOrFail($id);
    return view('user_manage.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'role' => 'required|in:admin,user',
    ]);

    $user = User::findOrFail($id);
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
    ]);

    return redirect()->route('user_manage.index')->with('success', 'Data user berhasil diperbarui.');
}


public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('user_manage.index')->with('success', 'User berhasil dihapus.');
}


}
