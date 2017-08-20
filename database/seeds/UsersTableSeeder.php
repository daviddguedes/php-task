<?php

use Illuminate\Database\Seeder;

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
            [
                'name' => 'James Bond',
                'email' => 'jamesbond@007.uk',
                'password' => bcrypt('manatwork'),
                'remember_token' => str_random(10),
            ],
            [
                'name' => 'Bono Vox',
                'email' => 'bonovox@u2.ir',
                'password' => bcrypt('withorwithoutyou'),
                'remember_token' => str_random(10),
            ]
        ]);
    }
}
