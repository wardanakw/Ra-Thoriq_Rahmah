<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistem Penilaian RA THORIQUR RAHMAH</title>
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #FFF5F5 0%, #FFF8F0 50%, #F0FFF4 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Background Decoration */
        body::before {
            content: '🎈';
            position: absolute;
            top: 50px;
            left: 50px;
            font-size: 60px;
            animation: float 6s ease-in-out infinite;
            opacity: 0.3;
        }

        body::after {
            content: '🌟';
            position: absolute;
            bottom: 50px;
            right: 50px;
            font-size: 80px;
            animation: float 8s ease-in-out infinite;
            opacity: 0.3;
        }

        .decoration-1 {
            position: absolute;
            top: 20%;
            right: 10%;
            font-size: 40px;
            animation: float 7s ease-in-out infinite;
            opacity: 0.2;
        }

        .decoration-2 {
            position: absolute;
            bottom: 25%;
            left: 8%;
            font-size: 50px;
            animation: float 9s ease-in-out infinite;
            opacity: 0.2;
        }

        .decoration-3 {
            position: absolute;
            top: 15%;
            left: 15%;
            font-size: 35px;
            animation: float 5s ease-in-out infinite;
            opacity: 0.15;
        }

        .decoration-4 {
            position: absolute;
            bottom: 15%;
            right: 15%;
            font-size: 45px;
            animation: float 7s ease-in-out infinite 1s;
            opacity: 0.15;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(5deg);
            }
        }

        /* ===== LOGIN CARD ===== */
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 40px 35px;
            box-shadow: 0 20px 60px rgba(255, 107, 107, 0.15);
            border: none;
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 10;
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Logo / Icon */
        .login-logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-logo .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: #fff;
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .login-logo h3 {
            font-weight: 800;
            color: #2C3E50;
            margin-top: 12px;
            font-size: 24px;
        }

        .login-logo h3 span {
            color: #FF6B6B;
        }

        .login-logo p {
            color: #7F8C8D;
            font-size: 14px;
            font-weight: 600;
            margin-top: -2px;
        }

        /* ===== FORM ===== */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 700;
            color: #2C3E50;
            font-size: 14px;
            margin-bottom: 6px;
            display: block;
        }

        .form-group label i {
            color: #FF6B6B;
            margin-right: 6px;
        }

        .form-control {
            border: 2px solid #F0F0F0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #FAFFFE;
            color: #2C3E50;
        }

        .form-control:focus {
            border-color: #FF6B6B;
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.15);
            outline: none;
            background: #fff;
        }

        .form-control:hover {
            border-color: #FFB3B3;
            transform: translateY(-1px);
            box-shadow: 0 3px 10px rgba(255, 107, 107, 0.05);
        }

        .form-control::placeholder {
            color: #BDC3C7;
            font-size: 13px;
        }

        .input-group-text {
            background: #FFF5F5;
            border: 2px solid #F0F0F0;
            border-radius: 12px 0 0 12px;
            color: #FF6B6B;
            font-size: 18px;
        }

        .form-control.input-with-icon {
            border-radius: 0 12px 12px 0;
            border-left: none;
        }

        /* ===== BUTTON ===== */
        .btn-login {
            background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 5px;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 30px rgba(255, 107, 107, 0.4);
            background: linear-gradient(135deg, #FF5252, #FF6B6B);
            color: #fff;
        }

        .btn-login i {
            font-size: 20px;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* ===== FOOTER ===== */
        .login-footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #F0F0F0;
        }

        .login-footer p {
            font-size: 13px;
            color: #BDC3C7;
            font-weight: 600;
            margin: 0;
        }

        .login-footer p i {
            color: #FF6B6B;
        }

        /* ===== ALERT ===== */
        .alert-custom {
            border: none;
            border-radius: 12px;
            padding: 12px 16px;
            font-weight: 600;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideDown 0.5s ease;
            margin-bottom: 15px;
        }

        .alert-custom-danger {
            background: #FFF0F0;
            color: #E74C3C;
            border-left: 4px solid #E74C3C;
        }

        .alert-custom-success {
            background: #E8F5E9;
            color: #27AE60;
            border-left: 4px solid #27AE60;
        }

        .alert-custom i {
            font-size: 20px;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 576px) {
            .login-card {
                padding: 30px 20px;
                border-radius: 20px;
                margin: 20px;
                max-width: 100%;
            }

            .login-logo .logo-icon {
                width: 65px;
                height: 65px;
                font-size: 32px;
            }

            .login-logo h3 {
                font-size: 20px;
            }

            .login-logo p {
                font-size: 13px;
            }

            .form-control {
                padding: 10px 14px;
                font-size: 13px;
            }

            .btn-login {
                padding: 12px;
                font-size: 14px;
            }

            body::before {
                font-size: 40px;
                top: 20px;
                left: 20px;
            }

            body::after {
                font-size: 50px;
                bottom: 20px;
                right: 20px;
            }

            .decoration-1,
            .decoration-2,
            .decoration-3,
            .decoration-4 {
                display: none;
            }
        }

        @media (max-width: 380px) {
            .login-card {
                padding: 25px 15px;
                margin: 15px;
            }

            .login-logo .logo-icon {
                width: 55px;
                height: 55px;
                font-size: 28px;
            }

            .login-logo h3 {
                font-size: 18px;
            }

            .form-control {
                padding: 8px 12px;
                font-size: 12px;
            }

            .btn-login {
                padding: 10px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <!-- ===== DECORATIONS ===== -->
    <div class="decoration-1">🌈</div>
    <div class="decoration-2">🧸</div>
    <div class="decoration-3">🎨</div>
    <div class="decoration-4">✨</div>

    <!-- ===== LOGIN CARD ===== -->
    <div class="login-card">
        
        <!-- Logo -->
        <div class="login-logo">
            <div class="logo-icon">
                <i class="bi bi-stars"></i>
            </div>
            <h3>RA THORIQUR RAHMAH </h3>
            <p>Sistem Penilaian Perkembangan Anak</p>
        </div>

        <!-- Alert Error -->
        @if(session('error'))
        <div class="alert-custom alert-custom-danger">
            <i class="bi bi-exclamation-triangle-fill"></i>
            {{ session('error') }}
        </div>
        @endif

        <!-- Alert Success -->
        @if(session('success'))
        <div class="alert-custom alert-custom-success">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login.proses') }}">
            @csrf

            <div class="form-group">
                <label>
                    <i class="bi bi-person"></i>
                    Username
                </label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <input type="text" 
                           class="form-control input-with-icon" 
                           name="username" 
                           placeholder="Masukkan username"
                           value="{{ old('username') }}"
                           autofocus>
                </div>
                @error('username')
                    <small class="text-danger" style="font-weight: 600; margin-top: 4px; display: block;">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="form-group">
                <label>
                    <i class="bi bi-lock"></i>
                    Password
                </label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                    <input type="password" 
                           class="form-control input-with-icon" 
                           name="password" 
                           placeholder="Masukkan password">
                </div>
                @error('password')
                    <small class="text-danger" style="font-weight: 600; margin-top: 4px; display: block;">
                        <i class="bi bi-exclamation-circle"></i> {{ $message }}
                    </small>
                @enderror
            </div>

            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right"></i>
                Masuk ke Sistem
            </button>

        </form>

        <!-- Footer -->
        <div class="login-footer">
            <p>
                <i class="bi bi-heart-fill"></i>
                 RA Thariqur Rahmah - Penilaian Perkembangan Anak
            </p>
        </div>

    </div>

    <!-- ===== SCRIPTS ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Auto focus -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const usernameInput = document.querySelector('input[name="username"]');
            if (usernameInput) {
                usernameInput.focus();
            }

            // Hilangkan alert setelah 5 detik
            const alerts = document.querySelectorAll('.alert-custom');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    alert.style.opacity = '0';
                    alert.style.transition = 'opacity 0.5s ease';
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 500);
                }, 5000);
            });
        });
    </script>

</body>
</html>