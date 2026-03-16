<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mentors = User::role('mentor')->get();

        for ($i = 1; $i <= 5; $i++) {

            ClassModel::create([
                'name' => 'Class '.$i,
                'description' => 'Description for class '.$i,
                'mentor_id' => $mentors->random()->id,
            ]);
        }
    }
}
