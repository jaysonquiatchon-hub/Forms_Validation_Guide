<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Replace the existing sample courses.
        Course::query()->delete();

        $courses = [
            [
                'code' => 'BSIT1',
                'title' => 'Bachelor of Science in Information Technology',
                'units' => 3,
                'is_active' => true,
            ],
            [
                'code' => 'BSCS1',
                'title' => 'Bachelor of Science in Computer Science',
                'units' => 3,
                'is_active' => true,
            ],
            [
                'code' => 'BSBA1',
                'title' => 'Bachelor of Science in Business Administration',
                'units' => 3,
                'is_active' => true,
            ],
            [
                'code' => 'BSA1',
                'title' => 'Bachelor of Science in Accountancy',
                'units' => 3,
                'is_active' => true,
            ],
            [
                'code' => 'BSHM1',
                'title' => 'Bachelor of Science in Hospitality Management',
                'units' => 3,
                'is_active' => true,
            ],
            [
                'code' => 'BSTM1',
                'title' => 'Bachelor of Science in Tourism Management',
                'units' => 3,
                'is_active' => true,
            ],
            [
                'code' => 'BSED1',
                'title' => 'Bachelor of Secondary Education',
                'units' => 3,
                'is_active' => true,
            ],
            [
                'code' => 'BEED1',
                'title' => 'Bachelor of Elementary Education',
                'units' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}