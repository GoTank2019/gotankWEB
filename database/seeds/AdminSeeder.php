<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
          'name' => 'Administrator',
          'username' => 'admin',
          'email' => 'admin@gmail.com',
          'password' => bcrypt('12345678')
        ]);
    }
}
