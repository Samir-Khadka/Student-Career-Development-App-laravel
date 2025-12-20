<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'JavaScript', 'category' => 'Programming', 'description' => 'Essential for web development'],
            ['name' => 'React', 'category' => 'Frontend', 'description' => 'Popular JavaScript library for building user interfaces'],
            ['name' => 'Python', 'category' => 'Programming', 'description' => 'Versatile programming language for various applications'],
            ['name' => 'PHP', 'category' => 'Backend', 'description' => 'Server-side scripting language for web development'],
            ['name' => 'MySQL', 'category' => 'Database', 'description' => 'Popular relational database management system'],
            ['name' => 'Communication', 'category' => 'Soft Skills', 'description' => 'Essential for professional success'],
            ['name' => 'Teamwork', 'category' => 'Soft Skills', 'description' => 'Collaborative skills for project work'],
            ['name' => 'Problem Solving', 'category' => 'Soft Skills', 'description' => 'Analytical thinking and solution development'],
            ['name' => 'Project Management', 'category' => 'Soft Skills', 'description' => 'Planning and executing projects effectively'],
        ];

        foreach ($skills as $skill) {
            DB::table('skills')->insert($skill);
        }
    }
}