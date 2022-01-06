<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Faker name
        $faker = \Faker\Factory::create('id_ID');

        // Seeding data
        DB::table('users')->insert([
            'name'      => $faker->name(),
            'role' => 'admin',
            'email' => 'admin@mail.com',
            'phone' => $faker->phoneNumber(),
            'address' => $faker->address(),
            'password' => Hash::make('password'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'      => $faker->name(),
            'role' => 'admin',
            'email' => $faker->email(),
            'phone' => $faker->phoneNumber(),
            'address' => $faker->address(),
            'password' => Hash::make('password'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'      => $faker->name(),
            'role' => 'member',
            'email' => 'member@mail.com',
            'phone' => $faker->phoneNumber(),
            'address' => $faker->address(),
            'password' => Hash::make('password'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name'      => $faker->name(),
            'role' => 'member',
            'email' => $faker->email(),
            'phone' => $faker->phoneNumber(),
            'address' => $faker->address(),
            'password' => Hash::make('password'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
