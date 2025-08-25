<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FixUserPasswordSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            // kalau password belum di-hash
            if (strlen($user->password) < 60) {
                $user->password = Hash::make($user->password);
                $user->save();
            }
        }
    }
}
