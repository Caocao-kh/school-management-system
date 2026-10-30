<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'dept_name' => 'Information Technology',
                'manager_id' => 1,
                'location_id' => 101,
            ],
            [
                'dept_name' => 'Computer Science',
                'manager_id' => 2,
                'location_id' => 102,
            ],
            [
                'dept_name' => 'Business Administration',
                'manager_id' => 3,
                'location_id' => 103,
            ],
            [
                'dept_name' => 'Accounting',
                'manager_id' => 4,
                'location_id' => 104,
            ],
            [
                'dept_name' => 'English',
                'manager_id' => 5,
                'location_id' => 105,
            ],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(
                ['dept_name' => $department['dept_name']],
                $department
            );
        }
    }
}