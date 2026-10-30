@extends('layouts.app')

@section('title', 'Dashboard')
@section('heading', 'School Dashboard')

@section('content')

@php
    $studentCount = \App\Models\Student::count();
    $departmentCount = \App\Models\Department::count();
    $maleCount = \App\Models\Student::where('gender', 'Male')->count();
    $femaleCount = \App\Models\Student::where('gender', 'Female')->count();
@endphp

<div class="row">

    <div class="col-md-3 mb-4">

        <div class="card p-4">

            <h6 class="text-muted">Total Students</h6>

            <h2>{{ $studentCount }}</h2>

            <i class="bi bi-people fs-2 text-primary"></i>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card p-4">

            <h6 class="text-muted">Departments</h6>

            <h2>{{ $departmentCount }}</h2>

            <i class="bi bi-building fs-2 text-success"></i>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card p-4">

            <h6 class="text-muted">Male Students</h6>

            <h2>{{ $maleCount }}</h2>

            <i class="bi bi-person fs-2 text-primary"></i>

        </div>

    </div>

    <div class="col-md-3 mb-4">

        <div class="card p-4">

            <h6 class="text-muted">Female Students</h6>

            <h2>{{ $femaleCount }}</h2>

            <i class="bi bi-person fs-2 text-danger"></i>

        </div>

    </div>

</div>

<div class="card p-4">

    <h4>Welcome, {{ auth()->user()->name }}!</h4>

    <p class="text-muted">
        Welcome to your School Management System dashboard.
    </p>

    <div>

        <a href="{{ route('students.index') }}"
           class="btn btn-primary">
            Manage Students
        </a>

        <a href="{{ route('departments.index') }}"
           class="btn btn-success">
            Manage Departments
        </a>

    </div>

</div>

@endsection