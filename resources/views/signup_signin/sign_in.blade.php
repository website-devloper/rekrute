<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In - Rekrify</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sign in to Rekrify - Your AI-Powered Job Portal">
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/js/app.js'])
    
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            --success: #10b981;
            --danger: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--gray-50);
            min-height: 100vh;
            display: flex;
        }

        .auth-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Left Panel - Branding */
        .auth-branding {
            flex: 1;
            background: linear-gradient(135deg, var(--gray-900) 0%, #1e1b4b 50%, #312e81 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }

        .branding-bg-effects {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.5;
        }

        .glow-orb-1 {
            width: 400px;
            height: 400px;
            background: var(--primary);
            top: -100px;
            left: -100px;
            animation: float 10s ease-in-out infinite;
        }

        .glow-orb-2 {
            width: 300px;
            height: 300px;
            background: #ec4899;
            bottom: -50px;
            right: -50px;
            animation: float 12s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }

        .branding-content {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 450px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 3rem;
        }

        .logo-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
        }

        .logo-icon svg {
            width: 28px;
            height: 28px;
            color: white;
        }

        .logo-text {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: white;
        }

        .logo-text span {
            color: var(--primary-light);
        }

        .branding-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .branding-subtitle {
            font-size: 1.125rem;
            color: var(--gray-400);
            line-height: 1.7;
            margin-bottom: 3rem;
        }

        .branding-features {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
        }

        .feature-icon {
            width: 44px;
            height: 44px;
            background: rgba(99, 102, 241, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-icon i {
            color: var(--primary-light);
        }

        /* Right Panel - Form */
        .auth-form-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            background: white;
        }

        .form-wrapper {
            width: 100%;
            max-width: 440px;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .form-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: var(--gray-500);
            font-size: 1rem;
        }

        .form-subtitle a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }

        .form-subtitle a:hover {
            text-decoration: underline;
        }

        /* User Type Toggle */
        .user-type-toggle {
            display: flex;
            background: var(--gray-100);
            border-radius: 12px;
            padding: 0.375rem;
            margin-bottom: 2rem;
        }

        .type-btn {
            flex: 1;
            padding: 0.875rem 1.5rem;
            border: none;
            background: transparent;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 0.9375rem;
            font-weight: 600;
            color: var(--gray-500);
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .type-btn.active {
            background: white;
            color: var(--gray-900);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .type-btn i {
            font-size: 1rem;
        }

        /* Alert Messages */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        .alert i {
            margin-top: 0.125rem;
        }

        .alert ul {
            margin: 0;
            padding-left: 1rem;
            font-size: 0.875rem;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            transition: color 0.2s ease;
        }

        .form-input {
            width: 100%;
            padding: 0.9375rem 1rem 0.9375rem 3rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            font-family: inherit;
            font-size: 1rem;
            color: var(--gray-900);
            transition: all 0.2s ease;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .form-input:focus + .input-icon {
            color: var(--primary);
        }

        .form-input::placeholder {
            color: var(--gray-400);
        }

        /* Password Toggle */
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--gray-400);
            cursor: pointer;
            padding: 0.25rem;
        }

        .password-toggle:hover {
            color: var(--gray-600);
        }

        /* Forgot Password */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .remember-me input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .remember-me span {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        .forgot-link {
            font-size: 0.875rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 12px;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.45);
        }

        .btn-submit i {
            transition: transform 0.3s ease;
        }

        .btn-submit:hover i {
            transform: translateX(4px);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 2rem 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: var(--gray-200);
        }

        .divider-text {
            font-size: 0.875rem;
            color: var(--gray-400);
        }

        /* Social Buttons */
        .social-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn-social {
            flex: 1;
            padding: 0.875rem;
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.625rem;
            font-family: inherit;
            font-size: 0.9375rem;
            font-weight: 500;
            color: var(--gray-700);
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-social:hover {
            border-color: var(--gray-300);
            background: var(--gray-50);
        }

        .btn-social img {
            width: 20px;
            height: 20px;
        }

        /* Back to Home */
        .back-home {
            text-align: center;
            margin-top: 2rem;
        }

        .back-home a {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-500);
            text-decoration: none;
            font-size: 0.9375rem;
            transition: color 0.2s ease;
        }

        .back-home a:hover {
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .auth-branding {
                display: none;
            }

            .auth-form-panel {
                flex: 1;
            }
        }

        @media (max-width: 480px) {
            .auth-form-panel {
                padding: 1.5rem;
            }

            .user-type-toggle {
                flex-direction: column;
            }

            .social-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Left Panel - Branding -->
        <div class="auth-branding">
            <div class="branding-bg-effects">
                <div class="glow-orb glow-orb-1"></div>
                <div class="glow-orb glow-orb-2"></div>
            </div>
            
            <div class="branding-content">
                <div class="brand-logo">
                    <div class="logo-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        </svg>
                    </div>
                    <span class="logo-text">REKR<span>IFY</span></span>
                </div>
                
                <h1 class="branding-title">Welcome Back!</h1>
                <p class="branding-subtitle">Sign in to access your personalized job recommendations, saved applications, and career tools.</p>
                
                <div class="branding-features">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <span>Access 12,000+ job opportunities</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <span>Get personalized job alerts</span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <span>Track your application progress</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Form -->
        <div class="auth-form-panel">
            <div class="form-wrapper">
                <div class="form-header">
                    <h2 class="form-title">Sign In</h2>
                    <p class="form-subtitle">Don't have an account? <a href="{{ route('sign_up') }}">Create one</a></p>
                </div>

                <!-- User Type Toggle -->
                <div class="user-type-toggle">
                    <button type="button" class="type-btn active" data-type="candidate">
                        <i class="fas fa-user"></i>
                        Candidate
                    </button>
                    <button type="button" class="type-btn" data-type="employer">
                        <i class="fas fa-building"></i>
                        Employer
                    </button>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('sign_in_store') }}" method="POST" id="loginForm">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" name="email" class="form-input" placeholder="you@example.com" required>
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <div class="input-wrapper">
                            <input type="password" name="password" class="form-input" id="password" placeholder="Enter your password" required>
                            <i class="fas fa-lock input-icon"></i>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-options">
                        <label class="remember-me">
                            <input type="checkbox" name="remember">
                            <span>Remember me</span>
                        </label>
                        <a href="{{ route('forgot_password') }}" class="forgot-link">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn-submit">
                        <span>Sign In</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

                <div class="divider">
                    <div class="divider-line"></div>
                    <span class="divider-text">Or continue with</span>
                    <div class="divider-line"></div>
                </div>

                <div class="social-buttons">
                    <a href="#" class="btn-social">
                        <svg width="20" height="20" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                        Google
                    </a>
                    <a href="#" class="btn-social">
                        <svg width="20" height="20" viewBox="0 0 24 24"><path fill="#0A66C2" d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        LinkedIn
                    </a>
                </div>

                <div class="back-home">
                    <a href="/">
                        <i class="fas fa-arrow-left"></i>
                        Back to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password Toggle
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // User Type Toggle
        document.querySelectorAll('.type-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.type-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>