<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //DB::unprepared(File::get(base_path() . '/database/seeds/type_voiture.sql'));
        
        /*DB::table('users')->insert([
            'name' => 'admin',
            'email' => '7.taxis@gmail.com',
            'password' => Hash::make('admin'),
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);*/
        $this->call([
            DefaultUserSeeder::class,
            typeVoitureSeeder::class,
        ]);
    }
}
