<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        /**DB::table('users')->insert([
            'name' => 'Primeiro Usuário',
            'email' => 'email@email.com',
            'password' => bcrypt('secret')
        ]);*/
    }
}
