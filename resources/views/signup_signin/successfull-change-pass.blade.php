<!DOCTYPE html>
<html lang="en">
<head>
    <title>Password Reset Successful - Rekrify</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/js/app.js'])
    
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --gray-900: #0f172a;
            --success: #10b981;
            --gray-500: #64748b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--gray-900) 0%, #1e1b4b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
        }

        .bg-effects { position: fixed; inset: 0; pointer-events: none; }
        .glow-orb { position: absolute; border-radius: 50%; filter: blur(100px); opacity: 0.4; }
        .orb-1 { width: 400px; height: 400px; background: var(--primary); top: -100px; right: -100px; animation: float 12s ease-in-out infinite; }
        .orb-2 { width: 300px; height: 300px; background: #ec4899; bottom: -100px; left: -100px; animation: float 10s ease-in-out infinite reverse; }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-30px); }
        }

        .forgot-container { width: 100%; max-width: 460px; position: relative; z-index: 1; }

        .forgot-card {
            background: white; border-radius: 1.5rem; padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            text-align: center;
        }

        .brand-logo { display: flex; align-items: center; justify-content: center; gap: 0.625rem; margin-bottom: 2rem; }
        .logo-icon { width: 48px; height: 48px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 12px; display: flex; align-items: center; justify-content: center; }
        .logo-icon svg { width: 24px; height: 24px; color: white; }
        .logo-text { font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 800; color: var(--gray-900); }
        .logo-text span { color: var(--primary); }

        .success-icon {
            width: 80px; height: 80px; background: #dcfce7;
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.5rem;
        }
        .success-icon i { font-size: 2.5rem; color: var(--success); }

        h1 { font-family: 'Outfit', sans-serif; font-size: 1.75rem; font-weight: 700; color: var(--gray-900); margin-bottom: 0.5rem; }
        p { color: var(--gray-500); margin-bottom: 2rem; }

        .btn-submit {
            width: 100%; padding: 1rem; background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white; border: none; border-radius: 12px; font-size: 1rem; font-weight: 600;
            display: inline-block; text-decoration: none; box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
            transition: all 0.3s;
        }
        .btn-submit:hover { transform: translateY(-2px); box-shadow: 0 8px 25px rgba(99, 102, 241, 0.45); }
    </style>
</head>
<body>
    <div class="bg-effects">
        <div class="glow-orb orb-1"></div>
        <div class="glow-orb orb-2"></div>
    </div>

    <div class="forgot-container">
        <div class="forgot-card">
            <div class="brand-logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    </svg>
                </div>
                <span class="logo-text">REKR<span>IFY</span></span>
            </div>

            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            
            <h1>Password Reset!</h1>
            <p>Your password has been successfully updated. You can now log in with your new credentials.</p>

            <a href="{{ route('sign_in') }}" class="btn-submit">
                Login Now
            </a>
        </div>
    </div>
</body>
</html>