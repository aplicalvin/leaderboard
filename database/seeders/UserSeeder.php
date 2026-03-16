<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        $admin = User::create([
            'username' => 'admin',
            'full_name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Polke001'),
        ]);

        $admin->assignRole('admin');


        // Mentor
        for ($i = 1; $i <= 5; $i++) {

            $mentor = User::create([
                'username' => 'mentor'.$i,
                'full_name' => 'Mentor '.$i,
                'email' => 'mentor'.$i.'@gmail.com',
                'password' => bcrypt('password'),
            ]);

            $mentor->assignRole('mentor');
        }


        // Member
        for ($i = 1; $i <= 10; $i++) {

            $member = User::create([
                'username' => 'member'.$i,
                'full_name' => 'Member '.$i,
                'email' => 'member'.$i.'@gmail.com',
                'password' => bcrypt('password'),
            ]);

            $member->assignRole('member');
        }
    }
}
