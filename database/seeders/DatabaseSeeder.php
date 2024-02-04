<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'guilherme',
            'firstname' => 'Guilherme',
            'lastname' => 'Delmiro',
            'email' => 'guilherme.delmiro@gmail.com',
            'password' => bcrypt('P@ssword')
        ]);
    }
}
