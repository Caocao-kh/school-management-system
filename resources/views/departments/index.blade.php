@extends('layouts.app')

@section('title', 'Departments')
@section('heading', 'Department Management')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h4>Departments</h4>

    <a href="{{ route('departments.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Add Department
    </a>

</div>

<div class="card p-4">

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Manager ID</th>
                    <th>Location ID</th>
                    <th>Students</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($departments as $department)

                <tr>
                    <td>{{ $department->dept_id }}</td>

                    <td>{{ $department->dept_name }}</td>

                    <td>{{ $department->manager_id }}</td>

                    <td>{{ $department->location_id }}</td>

                    <td>
                        <span class="badge bg-primary">
                            {{ $department->students_count }}
                        </span>
                    </td>

                    <td>

                        <a href="{{ route('departments.edit', $department->dept_id) }}"
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('departments.destroy', $department->dept_id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Delete this department?')">

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
                    <td colspan="6" class="text-center">
                        No departments found.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection