@extends('layouts.app')

@section('title', 'Edit Department')
@section('heading', 'Edit Department')

@section('content')

<div class="card p-4">

    <form action="{{ route('departments.update', $department->dept_id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Department Name</label>

            <input type="text"
                   name="dept_name"
                   class="form-control"
                   value="{{ old('dept_name', $department->dept_name) }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Manager ID</label>

            <input type="number"
                   name="manager_id"
                   class="form-control"
                   value="{{ old('manager_id', $department->manager_id) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Location ID</label>

            <input type="number"
                   name="location_id"
                   class="form-control"
                   value="{{ old('location_id', $department->location_id) }}">
        </div>

        <button class="btn btn-primary">
            Update Department
        </button>

        <a href="{{ route('departments.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

@endsection