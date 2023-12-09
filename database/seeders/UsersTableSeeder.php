<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'zicro',
            'email' => 'admin@zicro.com',
            'password' => bcrypt('password')
        ]);

        $user->createToken('zicro')->plainTextToken;

        User::factory()->count(5)->create();
    }
}
