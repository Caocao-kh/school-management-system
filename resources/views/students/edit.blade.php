@extends('layouts.app')

@section('title', 'Edit Student')
@section('heading', 'Edit Student')

@section('content')

<div class="card p-4">

    <h4 class="mb-4">Update Student Information</h4>

    <form action="{{ route('students.update', $student->student_id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">Student Name</label>

                <input type="text"
                       name="student_name"
                       class="form-control"
                       value="{{ old('student_name', $student->student_name) }}"
                       required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Email</label>

                <input type="email"
                       name="email"
                       class="form-control"
                       value="{{ old('email', $student->email) }}"
                       required>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Gender</label>

                <select name="gender" class="form-select" required>

                    <option value="Male"
                        {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                </select>

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Date of Birth</label>

                <input type="date"
                       name="dob"
                       class="form-control"
                       value="{{ old('dob', $student->dob) }}">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Enrollment Number</label>

                <input type="text"
                       name="enrollment"
                       class="form-control"
                       value="{{ old('enrollment', $student->enrollment) }}">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">Enrollment Date</label>

                <input type="date"
                       name="enrollment_date"
                       class="form-control"
                       value="{{ old('enrollment_date', $student->enrollment_date) }}"
                       required>

            </div>

            <div class="col-md-12 mb-3">

                <label class="form-label">Department</label>

                <select name="dept_id" class="form-select" required>

                    @foreach($departments as $department)

                        <option value="{{ $department->dept_id }}"
                            {{ old('dept_id', $student->dept_id) == $department->dept_id ? 'selected' : '' }}>

                            {{ $department->dept_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="col-md-12 mb-3">

                <label class="form-label">Description</label>

                <textarea name="description"
                          class="form-control"
                          rows="4">{{ old('description', $student->description) }}</textarea>

            </div>

        </div>

        <button class="btn btn-primary">
            Update Student
        </button>

        <a href="{{ route('students.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection