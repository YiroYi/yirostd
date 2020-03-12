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
          'name' => 'Yiro',
          'email' => 'yiroyi@live.com',
          'password' => bcrypt('Angie123$'),
          'access_user' => 'YiroYi',
          'last_name' => 'Yi',
          'phone' => '17701634751',
          'status' => 1,
          'sex' => 1,
          'idrol' => 1
      ]);
    }
}
