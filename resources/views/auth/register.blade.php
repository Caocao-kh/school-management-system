<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - School Management System</title>

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

        .register-card {
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0,0,0,.08);
        }
    </style>
</head>

<body>

<div class="register-card">

    <div class="text-center mb-4">

        <h2>🎓 Create Account</h2>

        <p class="text-muted">School Management System</p>

    </div>

    @if($errors->any())
        <div class="alert alert-danger">

            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">Full Name</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   placeholder="Enter your name"
                   required>

        </div>

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
                   placeholder="Minimum 8 characters"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">Confirm Password</label>

            <input type="password"
                   name="password_confirmation"
                   class="form-control"
                   placeholder="Confirm password"
                   required>

        </div>

        <div class="d-grid">

            <button type="submit" class="btn btn-primary">
                Create Account
            </button>

        </div>

    </form>

    <div class="text-center mt-4">

        <p>
            Already have an account?

            <a href="{{ route('login') }}">
                Login Here
            </a>
        </p>

    </div>

</div>

</body>
</html>