@extends('layouts.app')

@section('title', 'Add Student')
@section('heading', 'Student Registration')

@section('content')

<div class="card p-4">

    <h4 class="mb-4">Register New Student</h4>

    <form action="{{ route('students.store') }}" method="POST">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">Student Name</label>

                <input type="text"
                       name="student_name"
                       class="form-control"
                       value="{{ old('student_name') }}"
                       placeholder="Enter student name"
                       required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email') }}"
                       placeholder="Enter email"
                       required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Gender</label>

                <select name="gender" class="form-select" required>

                    <option value="">Select Gender</option>

                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                </select>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Date of Birth</label>

                <input type="date"
                       name="dob"
                       class="form-control"
                       value="{{ old('dob') }}">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Enrollment Number</label>

                <input type="text"
                       name="enrollment"
                       class="form-control"
                       value="{{ old('enrollment') }}"
                       placeholder="Enter enrollment number">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Enrollment Date</label>

                <input type="date"
                       name="enrollment_date"
                       class="form-control"
                       value="{{ old('enrollment_date') }}"
                       required>

            </div>

            {{-- Department Dropdown --}}

            <div class="col-md-12 mb-3">

                <label class="form-label">Department</label>

                <select name="dept_id" class="form-select" required>

                    <option value="">Select Department</option>

                    @foreach($departments as $department)

                        <option value="{{ $department->dept_id }}"
                            {{ old('dept_id') == $department->dept_id ? 'selected' : '' }}>

                            {{ $department->dept_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-12 mb-3">

                <label class="form-label">Description</label>

                <textarea name="description"
                          class="form-control"
                          rows="4"
                          placeholder="Enter description">{{ old('description') }}</textarea>

            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Save Student
        </button>

        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection