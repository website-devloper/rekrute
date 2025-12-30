<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up - Rekrify</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Create your Rekrify account - Join thousands finding their dream jobs">
    
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
            --secondary: #8b5cf6;
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

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background: linear-gradient(135deg, var(--gray-900) 0%, #1e1b4b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow-x: hidden;
        }

        /* Background Effects */
        .bg-effects {
            position: fixed;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.4;
        }

        .orb-1 { width: 500px; height: 500px; background: var(--primary); top: -200px; left: -100px; animation: float 12s ease-in-out infinite; }
        .orb-2 { width: 400px; height: 400px; background: #ec4899; bottom: -150px; right: -100px; animation: float 15s ease-in-out infinite reverse; }
        .orb-3 { width: 300px; height: 300px; background: var(--secondary); top: 50%; right: 20%; animation: float 10s ease-in-out infinite; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-40px) rotate(5deg); }
        }

        /* Main Container */
        .signup-container {
            width: 100%;
            max-width: 1100px;
            position: relative;
            z-index: 1;
        }

        /* Header */
        .signup-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .logo-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
        }

        .logo-icon svg { width: 26px; height: 26px; color: white; }

        .logo-text {
            font-family: 'Outfit', sans-serif;
            font-size: 1.75rem;
            font-weight: 800;
            color: white;
        }

        .logo-text span { color: var(--primary-light); }

        .signup-header h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 2.25rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
        }

        .signup-header p {
            color: var(--gray-400);
            font-size: 1.0625rem;
        }

        .signup-header p a {
            color: var(--primary-light);
            text-decoration: none;
            font-weight: 600;
        }

        .signup-header p a:hover { text-decoration: underline; }

        /* Role Selection Cards */
        .role-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .role-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1.5rem;
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .role-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .role-card.employer::before {
            background: linear-gradient(90deg, var(--secondary), #ec4899);
        }

        .role-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--gray-100);
        }

        .role-icon {
            width: 72px;
            height: 72px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .candidate .role-icon {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        }

        .employer .role-icon {
            background: linear-gradient(135deg, var(--secondary), #7c3aed);
            box-shadow: 0 10px 30px rgba(139, 92, 246, 0.3);
        }

        .role-icon i { font-size: 1.75rem; color: white; }

        .role-header h2 {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.375rem;
        }

        .role-header p {
            color: var(--gray-500);
            font-size: 0.9375rem;
        }

        /* Alert Messages */
        .alert {
            padding: 0.875rem 1rem;
            border-radius: 10px;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 0.625rem;
            font-size: 0.875rem;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        .alert ul { margin: 0; padding-left: 1rem; }

        /* Form Styles */
        .form-group { margin-bottom: 1rem; }

        .form-label {
            display: block;
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.375rem;
        }

        .input-wrapper { position: relative; }

        .input-icon {
            position: absolute;
            left: 0.875rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .form-input {
            width: 100%;
            padding: 0.8125rem 0.875rem 0.8125rem 2.625rem;
            border: 2px solid var(--gray-200);
            border-radius: 10px;
            font-family: inherit;
            font-size: 0.9375rem;
            color: var(--gray-900);
            transition: all 0.2s;
            background: white;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .form-input:focus + .input-icon { color: var(--primary); }
        .form-input::placeholder { color: var(--gray-400); }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        /* Password Strength */
        .password-strength {
            margin-top: 0.5rem;
            display: flex;
            gap: 0.25rem;
        }

        .strength-bar {
            flex: 1;
            height: 4px;
            background: var(--gray-200);
            border-radius: 2px;
            transition: background 0.3s;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 0.9375rem;
            border: none;
            border-radius: 10px;
            font-family: inherit;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1.25rem;
        }

        .candidate .btn-submit {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
        }

        .employer .btn-submit {
            background: linear-gradient(135deg, var(--secondary), #7c3aed);
            color: white;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.35);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.45);
        }

        .btn-submit i { transition: transform 0.3s; }
        .btn-submit:hover i { transform: translateX(4px); }

        /* Benefits List */
        .benefits-list {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--gray-100);
        }

        .benefits-list h4 {
            font-size: 0.8125rem;
            font-weight: 600;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.75rem;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray-600);
            margin-bottom: 0.5rem;
        }

        .benefit-item i { color: var(--success); font-size: 0.75rem; }

        /* Back Home */
        .back-home {
            text-align: center;
            margin-top: 2rem;
        }

        .back-home a {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-400);
            text-decoration: none;
            font-size: 0.9375rem;
            transition: color 0.2s;
        }

        .back-home a:hover { color: white; }

        /* Responsive */
        @media (max-width: 900px) {
            .role-cards { grid-template-columns: 1fr; }
            body { padding: 1.5rem; }
        }

        @media (max-width: 480px) {
            .form-row { grid-template-columns: 1fr; }
            .role-card { padding: 1.5rem; }
        }
    </style>
</head>
<body>
    <!-- Background Effects -->
    <div class="bg-effects">
        <div class="glow-orb orb-1"></div>
        <div class="glow-orb orb-2"></div>
        <div class="glow-orb orb-3"></div>
    </div>

    <div class="signup-container">
        <!-- Header -->
        <div class="signup-header">
            <div class="brand-logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    </svg>
                </div>
                <span class="logo-text">REKR<span>IFY</span></span>
            </div>
            <h1>Create Your Account</h1>
            <p>Already have an account? <a href="{{ route('sign_in') }}">Sign in</a></p>
        </div>

        <!-- Role Cards -->
        <div class="role-cards">
            <!-- Candidate Card -->
            <div class="role-card candidate">
                <div class="role-header">
                    <div class="role-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <h2>I'm a Job Seeker</h2>
                    <p>Looking for your next opportunity</p>
                </div>

                @if($errors->any() && !request()->has('sign_up_recruter'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('sign_up_store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <div class="input-wrapper">
                            <input type="text" name="name" class="form-input" placeholder="John Doe" required>
                            <i class="fas fa-user input-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <div class="input-wrapper">
                            <input type="email" name="email" class="form-input" placeholder="john@example.com" required>
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <div class="input-wrapper">
                                <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                                <i class="fas fa-lock input-icon"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-wrapper">
                                <input type="password" name="confirm_pass" class="form-input" placeholder="••••••••" required>
                                <i class="fas fa-lock input-icon"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="sign_up_candidate" class="btn-submit">
                        <span>Create Account</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

                <div class="benefits-list">
                    <h4>What you'll get</h4>
                    <div class="benefit-item"><i class="fas fa-check"></i> Access to 12,000+ job listings</div>
                    <div class="benefit-item"><i class="fas fa-check"></i> Personalized job recommendations</div>
                    <div class="benefit-item"><i class="fas fa-check"></i> Easy one-click applications</div>
                </div>
            </div>

            <!-- Employer Card -->
            <div class="role-card employer">
                <div class="role-header">
                    <div class="role-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h2>I'm an Employer</h2>
                    <p>Looking to hire top talent</p>
                </div>

                @if($errors->any() && request()->has('sign_up_recruter'))
                    <div class="alert alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('sign_up_store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <div class="input-wrapper">
                            <input type="text" name="nameR" class="form-input" placeholder="Jane Smith" required>
                            <i class="fas fa-user input-icon"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Work Email</label>
                        <div class="input-wrapper">
                            <input type="email" name="emailR" class="form-input" placeholder="jane@company.com" required>
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <div class="input-wrapper">
                                <input type="password" name="passwordR" class="form-input" placeholder="••••••••" required>
                                <i class="fas fa-lock input-icon"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-wrapper">
                                <input type="password" name="confirm_passR" class="form-input" placeholder="••••••••" required>
                                <i class="fas fa-lock input-icon"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="sign_up_recruter" class="btn-submit">
                        <span>Start Hiring</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>

                <div class="benefits-list">
                    <h4>What you'll get</h4>
                    <div class="benefit-item"><i class="fas fa-check"></i> Post unlimited job listings</div>
                    <div class="benefit-item"><i class="fas fa-check"></i> Access candidate database</div>
                    <div class="benefit-item"><i class="fas fa-check"></i> Advanced analytics dashboard</div>
                </div>
            </div>
        </div>

        <!-- Back Home -->
        <div class="back-home">
            <a href="/">
                <i class="fas fa-arrow-left"></i>
                Back to Homepage
            </a>
        </div>
    </div>
</body>
</html>