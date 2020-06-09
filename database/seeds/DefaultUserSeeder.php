<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => '7.taxis@gmail.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);
    }
}
