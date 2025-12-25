<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rekrute - Your AI-Powered Job Portal. Connect with top employers and find your dream career opportunity.">
    <meta name="keywords" content="jobs, careers, recruitment, hiring, job portal, employment">
    <meta name="theme-color" content="#3b82f6">
    
    @vite(['resources/css/premium-design.css', 'resources/css/find_job.css', 'resources/css/home-modern.css', 'resources/js/app.js'])
    
    <!-- Clean Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons & Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

    <style>
        :root {
            /* Clean Blue Theme */
            --primary: #3b82f6;       /* Blue 500 */
            --primary-dark: #2563eb;  /* Blue 600 */
            --primary-light: #60a5fa; /* Blue 400 */
            
            --secondary: #64748b;     /* Slate 500 */
            --accent: #f59e0b;        /* Amber 500 */
            --success: #10b981;       /* Emerald 500 */
            --danger: #ef4444;        /* Red 500 */
            --info: #0ea5e9;          /* Sky 500 */
            
            --dark: #1e293b;          /* Slate 800 */
            --dark-soft: #334155;     /* Slate 700 */
            --light: #f8fafc;         /* Slate 50 */
            --white: #ffffff;
            
            --gray-50: #f9fafb;       /* Gray 50 */
            --gray-100: #f3f4f6;      /* Gray 100 */
            --gray-200: #e5e7eb;      /* Gray 200 */
            --gray-300: #d1d5db;      /* Gray 300 */
            --gray-400: #9ca3af;      /* Gray 400 */
            --gray-500: #6b7280;      /* Gray 500 */
            --gray-600: #4b5563;      /* Gray 600 */
            --gray-700: #374151;      /* Gray 700 */
            --gray-800: #1f2937;      /* Gray 800 */
            --gray-900: #111827;      /* Gray 900 */
            
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            
            --radius-sm: 0.375rem;
            --radius: 0.5rem;
            --radius-md: 0.75rem;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--white);
            color: var(--gray-800);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            color: var(--gray-900);
            letter-spacing: -0.025em;
        }

        /* Clean Loader */
        .page-loader {
            position: fixed;
            inset: 0;
            background: var(--white);
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease, visibility 0.5s ease;
        }

        .page-loader.hidden {
            opacity: 0;
            visibility: hidden;
        }

        .loader-spinner {
            width: 40px;
            height: 40px;
            border: 3px solid var(--gray-200);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Clean Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: var(--gray-300);
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--gray-400);
        }

        /* Selection */
        ::selection {
            background: var(--primary-light);
            color: white;
        }

        /* Clean Alert */
        .alert-premium {
            border-radius: var(--radius);
            border: 1px solid transparent;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 1.25rem;
            background: white;
        }

        .alert-premium.alert-success {
            background: #ecfdf5;
            border-color: #a7f3d0;
            color: #047857;
        }

        .alert-premium.alert-danger {
            background: #fef2f2;
            border-color: #fecaca;
            color: #b91c1c;
        }

        /* Focus visible for accessibility */
        :focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        /* Smooth fade-in for main content */
        main {
            opacity: 0;
            animation: fadeIn 0.4s ease forwards;
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 44px;
            height: 44px;
            background: white;
            color: var(--gray-600);
            border: 1px solid var(--gray-200);
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-md);
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .back-to-top:hover {
            background: var(--gray-50);
            color: var(--primary);
            border-color: var(--primary-light);
            transform: translateY(-2px);
        }

        .back-to-top svg { width: 20px; height: 20px; }
        
        /* Links */
        a { text-decoration: none; color: inherit; transition: color 0.2s; }
        a:hover { color: var(--primary); }
    </style>

    <title>Rekrute - Find Your Dream Job</title>
</head>
<body>
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-spinner"></div>
    </div>

    <x-navbar />
    
    <div class="container mt-3">
        @if(session('success'))
            <div class="alert alert-success alert-premium alert-dismissible fade show" role="alert" data-aos="fade-down">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-premium alert-dismissible fade show" role="alert" data-aos="fade-down">
                <i class="fas fa-exclamation-circle"></i>
                <span>{{ session('error') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-premium alert-dismissible fade show" role="alert" data-aos="fade-down">
                <ul class="mb-0" style="list-style: none; padding: 0;">
                    @foreach($errors->all() as $error)
                        <li><i class="fas fa-times-circle me-2"></i>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <main id="main-content">
        @yield('content')
    </main>

    <x-footer />

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to top">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide page loader with subtle transition
            const loader = document.getElementById('pageLoader');
            if (loader) {
                setTimeout(() => {
                    loader.classList.add('hidden');
                }, 400);
            }

            // Initialize AOS with softer settings
            AOS.init({
                duration: 600,
                once: true,
                easing: 'ease-out-cubic',
                offset: 30
            });

            // Back to top button
            const backToTopBtn = document.getElementById('backToTop');
            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 400) {
                    backToTopBtn.classList.add('visible');
                } else {
                    backToTopBtn.classList.remove('visible');
                }
            });

            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
</body>
</html>