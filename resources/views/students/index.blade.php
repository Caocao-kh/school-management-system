@extends('layouts.app')

@section('title', 'Student Management')
@section('heading', 'Student Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h4>Students List</h4>

    <a href="{{ route('students.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add Student
    </a>

</div>

{{-- Search and Filter --}}

<div class="card p-4 mb-4">

    <form action="{{ route('students.index') }}" method="GET">

        <div class="row">

            <div class="col-md-4 mb-2">
                <label class="form-label">Search Student</label>

                <input type="text"
                       name="search"
                       class="form-control"
                       placeholder="Search student name..."
                       value="{{ request('search') }}">
            </div>

            <div class="col-md-3 mb-2">
                <label class="form-label">Gender</label>

                <select name="gender" class="form-select">

                    <option value="">All Gender</option>

                    <option value="Male"
                        {{ request('gender') == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ request('gender') == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                </select>
            </div>

            <div class="col-md-3 mb-2">
                <label class="form-label">Department</label>

                <select name="dept_id" class="form-select">

                    <option value="">All Departments</option>

                    @foreach($departments as $department)

                        <option value="{{ $department->dept_id }}"
                            {{ request('dept_id') == $department->dept_id ? 'selected' : '' }}>

                            {{ $department->dept_name }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div class="col-md-2 mb-2 d-flex align-items-end">

                <button class="btn btn-primary w-100">
                    <i class="bi bi-search"></i> Search
                </button>

            </div>

        </div>

        <a href="{{ route('students.index') }}" class="btn btn-secondary btn-sm mt-2">
            Reset Filter
        </a>

    </form>

</div>


{{-- Student Table --}}

<div class="card p-4">

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Department</th>
                    <th>Enrollment Date</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($students as $student)

                    <tr>

                        <td>{{ $student->student_id }}</td>

                        <td>
                            <strong>{{ $student->student_name }}</strong>
                        </td>

                        <td>{{ $student->email }}</td>

                        <td>

                            @if($student->gender == 'Male')
                                <span class="badge bg-primary">Male</span>
                            @else
                                <span class="badge bg-danger">Female</span>
                            @endif

                        </td>

                        <td>{{ $student->dob }}</td>

                        <td>
                            <span class="badge bg-success">
                                {{ $student->department->dept_name ?? 'N/A' }}
                            </span>
                        </td>

                        <td>{{ $student->enrollment_date }}</td>

                        <td>

                            <a href="{{ route('students.show', $student->student_id) }}"
                               class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>

                            <a href="{{ route('students.edit', $student->student_id) }}"
                               class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="{{ route('students.destroy', $student->student_id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this student?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="8" class="text-center text-muted">
                            No students found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}

    <div class="mt-3">

        {{ $students->links('pagination::bootstrap-5') }}

    </div>

</div>

@endsection