<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Dieu My',
            'email' => 'dieumy@gmail.com',
            'password' => bcrypt('dieumy@gmail.com'),
            'role' => (0),
        ]);
        DB::table('users')->insert([
            'name' => 'chan',
            'email' => 'chan@gmail.com',
            'password' => bcrypt('chan@gmail.com'),
            'role' => (1),
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyen C',
            'email' => 'nguyenc@gmail.com',
            'password' => bcrypt('nguyenc@gmail.com'),
            'role' => (1),
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyen D',
            'email' => 'nguyend@gmail.com',
            'password' => bcrypt('nguyend@gmail.com'),
            'role' => (1),
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyen E',
            'email' => 'nguyene@gmail.com',
            'password' => bcrypt('nguyene@gmail.com'),
            'role' => (1),
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyen F',
            'email' => 'nguyenf@gmail.com',
            'password' => bcrypt('nguyenf@gmail.com'),
            'role' => (1),
        ]);
        DB::table('users')->insert([
            'name' => 'Nguyen G',
            'email' => 'nguyeng@gmail.com',
            'password' => bcrypt('nguyeng@gmail.com'),
            'role' => (1),
        ]);

    }
}
