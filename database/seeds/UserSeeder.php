<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_name = Str::random(10);
        DB::table('users')->insert([
            'name' => $user_name,
            'email' => "{$user_name}@example.com",
            'password' => Hash::make('password'),
        ]);
    }
}
