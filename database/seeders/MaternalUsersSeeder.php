<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MaternalUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('maternal_users')->insert([
            'firstname' => 'Admin',
            'middlename' => 'is',
            'surname' => 'trator',
            'birthdate' => '2000-02-20',
            'sex' => 'Male',
            'region' => 'Dar es Salaam',
            'address' => 'District/Street/House no.1',
            'phone_number' => '0615151515',
            'username' => 'admin101',
            'email' => 'admin@gmail.com',
            'role' => 'Admin',
            'password' => Hash::make('admin@101')
        ]);
    }
}
