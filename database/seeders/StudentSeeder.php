<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Department;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            ['John Smith', 'john@gmail.com', 'Male', '2002-01-15', 'ST001', '2025-01-10', 'Information Technology'],
            ['Mary Johnson', 'mary@gmail.com', 'Female', '2003-03-20', 'ST002', '2025-01-10', 'Computer Science'],
            ['David Brown', 'david@gmail.com', 'Male', '2001-05-12', 'ST003', '2025-01-10', 'Business Administration'],
            ['Sarah Wilson', 'sarah@gmail.com', 'Female', '2002-07-25', 'ST004', '2025-01-10', 'Accounting'],
            ['Michael Davis', 'michael@gmail.com', 'Male', '2003-09-10', 'ST005', '2025-01-10', 'English'],
            ['Emma Garcia', 'emma@gmail.com', 'Female', '2002-11-18', 'ST006', '2025-01-10', 'Information Technology'],
            ['James Miller', 'james@gmail.com', 'Male', '2001-04-22', 'ST007', '2025-01-10', 'Computer Science'],
            ['Olivia Martinez', 'olivia@gmail.com', 'Female', '2003-06-14', 'ST008', '2025-01-10', 'Business Administration'],
            ['William Anderson', 'william@gmail.com', 'Male', '2002-08-30', 'ST009', '2025-01-10', 'Accounting'],
            ['Sophia Taylor', 'sophia@gmail.com', 'Female', '2001-12-05', 'ST010', '2025-01-10', 'English'],
            ['Daniel Thomas', 'daniel@gmail.com', 'Male', '2003-02-17', 'ST011', '2025-01-10', 'Information Technology'],
            ['Isabella Moore', 'isabella@gmail.com', 'Female', '2002-05-19', 'ST012', '2025-01-10', 'Computer Science'],
            ['Alexander Martin', 'alex@gmail.com', 'Male', '2001-07-21', 'ST013', '2025-01-10', 'Business Administration'],
            ['Mia Jackson', 'mia@gmail.com', 'Female', '2003-10-11', 'ST014', '2025-01-10', 'Accounting'],
            ['Ethan White', 'ethan@gmail.com', 'Male', '2002-03-08', 'ST015', '2025-01-10', 'English'],
            ['Charlotte Harris', 'charlotte@gmail.com', 'Female', '2001-09-16', 'ST016', '2025-01-10', 'Information Technology'],
            ['Benjamin Clark', 'ben@gmail.com', 'Male', '2003-04-27', 'ST017', '2025-01-10', 'Computer Science'],
            ['Amelia Lewis', 'amelia@gmail.com', 'Female', '2002-06-13', 'ST018', '2025-01-10', 'Business Administration'],
            ['Lucas Robinson', 'lucas@gmail.com', 'Male', '2001-08-24', 'ST019', '2025-01-10', 'Accounting'],
            ['Harper Walker', 'harper@gmail.com', 'Female', '2003-12-09', 'ST020', '2025-01-10', 'English'],
        ];

        foreach ($students as $student) {

            $department = Department::where(
                'dept_name',
                $student[6]
            )->firstOrFail();

            Student::updateOrCreate(
                ['email' => $student[1]],
                [
                    'student_name' => $student[0],
                    'email' => $student[1],
                    'gender' => $student[2],
                    'dob' => $student[3],
                    'enrollment' => $student[4],
                    'enrollment_date' => $student[5],
                    'description' => 'Sample student record',
                    'dept_id' => $department->dept_id,
                ]
            );
        }
    }
}