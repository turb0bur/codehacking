<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id'   => 1,
            'is_active' => 1,
            'name'      => 'Volodymyr Butko',
            'email'     => 'butko1991@gmail.com',
            'password'  => bcrypt('Artepass1!')
        ]);
    }
}
