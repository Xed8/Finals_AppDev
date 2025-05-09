<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FitZone - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/exercise-weight-icon-6.png') }}" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #4b2953;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left {
            width: 50%;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left h2 {
            color: #c74856;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .left img {
            width: 70%;
            max-width: 400px;
        }

        .right {
            flex: 1;
            background-color: #4b2953;
            color: #f9eebd;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 1rem;
        }

        .right h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .login-box {
            background-color: #5c2e68;
            padding: 40px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.3);
        }

        .login-box h3 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #fbeec1;
            text-align: center;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 10px;
            margin-bottom: 15px;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #f9eebd;
            color: #fff;
            outline: none;
        }

        input::placeholder {
            color: #ddd;
        }

        .remember-forgot {
            font-size: 0.9em;
            color: #f9eebd;
            margin-bottom: 20px;
        }

        .login-btn {
            width: 100%;
            background-color: #f9eebd;
            color: #4b2953;
            font-weight: bold;
            border: none;
            padding: 12px;
            cursor: pointer;
            border-radius: 5px;
        }

        .signup {
            margin-top: 20px;
            font-size: 0.9em;
            color: #f9eebd;
            text-align: center;
        }

        .signup a {
            color: #fbeec1;
            font-weight: bold;
            text-decoration: underline;
            cursor: pointer;
        }

        .register-popup {
            display: none;
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            max-width: 400px; /* smaller box */
            background: #774c8b;
            color: #fbeec1;
            padding: 1.5rem; /* slightly smaller padding */
            border-radius: 15px; /* a little tighter */
            animation: slideIn 0.5s forwards;
            z-index: 10;
            box-shadow: 0 6px 15px rgba(0,0,0,0.25); /* a little softer shadow */
        }

        @keyframes slideIn {
            0% { transform: translate(-50%, -20%) scale(0.8); opacity: 0; }
            100% { transform: translate(-50%, 0) scale(1); opacity: 1; }
        }
        .register-popup form .mb-2, 
        .register-popup form .mb-3 {
            margin-bottom: 0.6rem; /* tighter space between fields */
        }

        .register-popup input, 
        .register-popup select {
            padding: 6px 10px; /* smaller input box height */
            font-size: 0.9rem;
        }

        .register-popup {
            padding: 1.5rem 1.2rem; /* less padding inside popup */
            max-height: 90vh; /* prevent modal from getting too tall */
            overflow-y: auto; /* enable scroll if needed */
        }

        .register-popup h4 {
            color: #fbeec1;
            margin-bottom: 0.8rem;
            text-align: center;
            font-size: 1.5rem; /* slightly smaller title */
        }

        .register-popup label {
            color: #fbeec1;
            font-size: 0.9rem; /* smaller labels */
        }

        .register-popup input,
        .register-popup select {
            background-color: #fbeec1;
            color: #512e5f;
            border: none;
            font-size: 0.9rem; /* smaller input text */
            padding: 8px; /* smaller input box height */
        }

        .register-popup input:focus,
        .register-popup select:focus {
            outline: 2px solid #f2547d;
            box-shadow: none;
        }

        .alert-error {
            background-color: #f2547d;
            color: #fff;
            padding: 8px 12px;
            border-radius: 8px;
            margin-bottom: 0.8rem;
            font-size: 0.85rem;
        }

        .btn-success, .btn-secondary {
            padding: 8px 12px;
            font-size: 0.9rem;
        }

        .btn-success {
            background-color: #fbeec1;
            color: #512e5f;
            font-weight: bold;
        }

        .btn-secondary {
            background-color: transparent;
            border: 1px solid #fbeec1;
            color: #fbeec1;
        }

        .btn-secondary:hover {
            background-color: #fbeec1;
            color: #512e5f;
        }
        
        .admin-login-btn {
            bottom: 20px;
            right: 20px;
            z-index: 1050;
            position: fixed;
            background-color: #fbeec1;
            color: #4b2953;
            font-family: 'Segoe UI', sans-serif;
            font-size: 0.85rem;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .admin-login-btn:hover {
            background-color: #e4d59c;
            color: #3b1e40;
        }
        #adminLoginModal .form-control {
            background-color: #f9eebd !important;
            color: #4b2953 !important;
            border: 1px solid #e4d59c;
            font-weight: 500;
        }

        #adminLoginModal .form-control:focus {
            background-color: #fffde7 !important;
            color: #4b2953 !important;
            border-color: #f2547d;
            box-shadow: 0 0 0 0.2rem rgba(242, 84, 125, 0.25);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="left">
        <h2>A Leap to Fitness</h2>
        <img src="{{ asset('images/fitness-woman.jpg') }}" alt="Fitness Woman">
    </div>

    <div class="right">
        <h1>FitZone</h1>
        <div class="login-box">
            <h3>Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                
                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>

                <button type="submit" class="login-btn">LOGIN</button>
            </form>

            <div class="signup">
                <p>Don't have an account? <a id="show-register">Sign Up</a></p>
            </div>
        </div>

        <!-- Registration Pop-Up -->
        <div class="register-popup shadow" id="register-popup">
            <h4>Create Your FitZone Account</h4>

            @if ($errors->any())
                <div class="alert-error">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/register">
                @csrf
                <div class="mb-2">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Middle Name</label>
                    <input type="text" name="middle_name" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="" disabled selected>Select your gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-2">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Create Account</button>
                    <button type="button" class="btn btn-secondary" id="close-register">Close</button>
                </div>
            </form>
        </div>

<!-- Admin Login Button (Bottom Right Corner) -->
<button class="btn position-fixed admin-login-btn" data-bs-toggle="modal" data-bs-target="#adminLoginModal">
    Admin
</button>

<!-- Admin Login Modal -->
<div class="modal fade" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="adminLoginModalLabel">Admin Login</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="admin-username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="admin-username" required>
                    </div>

                    <div class="mb-3">
                        <label for="admin-password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="admin-password" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Login</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    const signUpBtn = document.getElementById("show-register");
    const registerPopup = document.getElementById("register-popup");
    const closeBtn = document.getElementById("close-register");

    signUpBtn.addEventListener("click", () => {
        registerPopup.style.display = "block";
    });

    closeBtn.addEventListener("click", () => {
        registerPopup.style.display = "none";
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
