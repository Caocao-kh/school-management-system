@extends('layouts.app')

@section('title', 'Add Department')
@section('heading', 'Add Department')

@section('content')

<div class="card p-4">

    <form action="{{ route('departments.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Department Name</label>

            <input type="text"
                   name="dept_name"
                   class="form-control"
                   value="{{ old('dept_name') }}"
                   placeholder="Enter department name"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Manager ID</label>

            <input type="number"
                   name="manager_id"
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Location ID</label>

            <input type="number"
                   name="location_id"
                   class="form-control">
        </div>

        <button class="btn btn-primary">
            Save Department
        </button>

        <a href="{{ route('departments.index') }}"
           class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

@endsection