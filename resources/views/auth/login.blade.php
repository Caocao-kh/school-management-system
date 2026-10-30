<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - School Management System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,.08);
        }

        .login-icon {
            font-size: 50px;
            color: #2563eb;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="text-center mb-4">

        <div class="login-icon">🎓</div>

        <h3>Welcome Back</h3>

        <p class="text-muted">School Management System</p>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">Email Address</label>

            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email') }}"
                   placeholder="Enter your email"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">Password</label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Enter your password"
                   required>

        </div>

        <div class="d-grid">

            <button type="submit" class="btn btn-primary">
                Login
            </button>

        </div>

    </form>

    <div class="text-center mt-4">

        <p>
            Don't have an account?

            <a href="{{ route('register') }}">
                Register Here
            </a>
        </p>

    </div>

</div>

</body>
</html>