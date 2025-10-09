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
}
