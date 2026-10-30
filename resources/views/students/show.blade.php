@extends('layouts.app')

@section('title', 'Student Details')
@section('heading', 'Student Details')

@section('content')

<div class="card p-4">

    <h4 class="mb-4">Student Information</h4>

    <table class="table table-bordered">

        <tr>
            <th width="30%">Student ID</th>
            <td>{{ $student->student_id }}</td>
        </tr>

        <tr>
            <th>Student Name</th>
            <td>{{ $student->student_name }}</td>
        </tr>

        <tr>
            <th>Email</th>
            <td>{{ $student->email }}</td>
        </tr>

        <tr>
            <th>Gender</th>
            <td>{{ $student->gender }}</td>
        </tr>

        <tr>
            <th>Date of Birth</th>
            <td>{{ $student->dob }}</td>
        </tr>

        <tr>
            <th>Enrollment Number</th>
            <td>{{ $student->enrollment }}</td>
        </tr>

        <tr>
            <th>Enrollment Date</th>
            <td>{{ $student->enrollment_date }}</td>
        </tr>

        <tr>
            <th>Department</th>
            <td>{{ $student->department->dept_name ?? 'N/A' }}</td>
        </tr>

        <tr>
            <th>Description</th>
            <td>{{ $student->description }}</td>
        </tr>

    </table>

    <div>
        <a href="{{ route('students.edit', $student->student_id) }}"
           class="btn btn-warning">
            Edit Student
        </a>

        <a href="{{ route('students.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>

</div>

@endsection