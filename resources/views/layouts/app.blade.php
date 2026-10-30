<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'School Management System')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #172554;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px;
        }

        .sidebar h4 {
            color: white;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 8px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: #2563eb;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            background: white;
            padding: 18px 25px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,.05);
        }

        @media(max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">

        <h4>
            <i class="bi bi-mortarboard-fill"></i>
            School MS
        </h4>

        <a href="/">
            <i class="bi bi-speedometer2"></i>
            Dashboard
        </a>

        <a href="{{ route('departments.index') }}">
            <i class="bi bi-building"></i>
            Departments
        </a>

        <a href="{{ route('students.index') }}">
            <i class="bi bi-people"></i>
            Students
        </a>

    </div>

    <!-- Main Content -->
    <div class="main-content">

        <div class="topbar d-flex justify-content-between align-items-center">
            <h5 class="mb-0">@yield('heading', 'Dashboard')</h5>

            <div class="d-flex align-items-center gap-3">

                <span>
                    <i class="bi bi-person-circle"></i>
                    {{ auth()->user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>

                </form>

            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>