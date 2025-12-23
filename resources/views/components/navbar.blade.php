<!-- Premium Glassmorphism Navbar -->
<nav class="modern-navbar" id="mainNavbar">
    <div class="navbar-container">
        <div class="navbar-content">
            <!-- Logo -->
            <a href="/" class="navbar-logo">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline>
                        <polyline points="7.5 19.79 7.5 14.6 3 12"></polyline>
                        <polyline points="21 12 16.5 14.6 16.5 19.79"></polyline>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                </div>
                <span class="logo-text">REKR<span class="text-primary">UTE</span></span>
            </a>

            <!-- Desktop Navigation -->
            <ul class="navbar-links desktop-menu">
                <li><a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ route('jobs') }}" class="nav-item {{ request()->routeIs('jobs') ? 'active' : '' }}">Jobs</a></li>
                <li><a href="{{ route('companies') }}" class="nav-item {{ request()->routeIs('companies') ? 'active' : '' }}">Companies</a></li>
                <li><a href="{{ route('about') }}" class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
                <li><a href="{{ route('contact') }}" class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>

            <!-- Action Buttons -->
            <div class="navbar-actions">
                @auth('candidate')
                    <div class="user-dropdown">
                        <button class="btn-profile" id="userDropdownBtn">
                            <div class="profile-avatar">
                                <span>{{ substr(session('name'), 0, 1) }}</span>
                            </div>
                            <span class="profile-name">{{ session('name') }}</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu" id="userDropdownMenu">
                            <a href="{{ route('candidateProfile') }}" class="dropdown-item">
                                <i class="fas fa-user"></i> My Profile
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-briefcase"></i> My Applications
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <hr class="dropdown-divider">
                            <a href="{{ route('logout') }}" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>
                @elseauth('employer')
                    <a href="{{ route('dashboard.recruiter') }}" class="btn-dashboard">
                        <i class="fas fa-chart-line me-2"></i> Dashboard
                    </a>
                @else
                    <a href="{{route('sign_in')}}" class="btn-login">Login</a>
                    <a href="{{route('sign_up')}}" class="btn-register">
                        <span>Get Started</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                @endauth
            </div>

            <!-- Mobile Toggle -->
            <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-side-menu" id="mobileMenu">
        <div class="mobile-menu-header">
            <span class="logo-text">REKR<span class="text-primary">UTE</span></span>
            <button class="close-menu" id="closeMenu" aria-label="Close menu">&times;</button>
        </div>
        <ul class="mobile-nav-links">
            <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('jobs') }}" class="{{ request()->routeIs('jobs') ? 'active' : '' }}"><i class="fas fa-briefcase"></i> Jobs</a></li>
            <li><a href="{{ route('companies') }}" class="{{ request()->routeIs('companies') ? 'active' : '' }}"><i class="fas fa-building"></i> Companies</a></li>
            <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}"><i class="fas fa-info-circle"></i> About</a></li>
            <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}"><i class="fas fa-envelope"></i> Contact</a></li>
        </ul>
        <div class="mobile-auth">
             @auth('candidate')
                <a href="{{ route('candidateProfile') }}" class="btn-register full-width">
                    <i class="fas fa-user"></i> My Dashboard
                </a>
            @elseauth('employer')
                <a href="{{ route('dashboard.recruiter') }}" class="btn-register full-width">
                    <i class="fas fa-chart-line"></i> Dashboard
                </a>
            @else
                <a href="{{route('sign_in')}}" class="btn-login full-width mb-2">Login</a>
                <a href="{{route('sign_up')}}" class="btn-register full-width">Get Started</a>
            @endauth
        </div>
    </div>
    <div class="menu-overlay" id="menuOverlay"></div>
</nav>

<style>
    .modern-navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1000;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 1rem 0;
        background: transparent;
    }

    .modern-navbar.scrolled {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        padding: 0.6rem 0;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.08);
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .navbar-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
    }

    .navbar-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
    }

    .logo-icon {
        width: 42px;
        height: 42px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
    }

    .logo-icon svg {
        width: 22px;
        height: 22px;
        color: white;
    }

    /* Logo text - WHITE on dark hero, DARK when scrolled */
    .logo-text {
        font-family: 'Outfit', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: -0.5px;
        color: white;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .modern-navbar.scrolled .logo-text {
        color: var(--gray-900);
    }

    .text-primary {
        color: var(--primary-light) !important;
    }

    .modern-navbar.scrolled .text-primary {
        color: var(--primary) !important;
    }

    .navbar-links {
        display: flex;
        gap: 0.5rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    /* Nav links - WHITE on dark hero, GRAY when scrolled */
    .nav-item {
        text-decoration: none;
        color: rgba(255, 255, 255, 0.85);
        font-weight: 500;
        font-size: 0.9375rem;
        padding: 0.625rem 1rem;
        border-radius: 10px;
        transition: all 0.25s ease;
        position: relative;
    }

    .nav-item:hover {
        color: white;
        background: rgba(255, 255, 255, 0.1);
    }

    .nav-item.active {
        color: white;
        background: rgba(255, 255, 255, 0.15);
        font-weight: 600;
    }

    .modern-navbar.scrolled .nav-item {
        color: var(--gray-600);
    }

    .modern-navbar.scrolled .nav-item:hover {
        color: var(--primary);
        background: rgba(99, 102, 241, 0.08);
    }

    .modern-navbar.scrolled .nav-item.active {
        color: var(--primary);
        background: rgba(99, 102, 241, 0.1);
    }

    .navbar-actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }

    .btn-login {
        color: var(--gray-700);
        text-decoration: none;
        font-weight: 600;
        padding: 0.625rem 1.25rem;
        border-radius: 10px;
        transition: all 0.25s ease;
        font-size: 0.9375rem;
    }

    .btn-login:hover {
        color: var(--primary);
        background: rgba(99, 102, 241, 0.08);
    }

    .btn-register {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        color: white;
        padding: 0.625rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9375rem;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(99, 102, 241, 0.45);
    }

    .btn-register i {
        font-size: 0.75rem;
        transition: transform 0.3s ease;
    }

    .btn-register:hover i {
        transform: translateX(3px);
    }

    .btn-dashboard {
        background: var(--dark);
        color: white;
        padding: 0.625rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9375rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        box-shadow: 0 4px 15px rgba(15, 23, 42, 0.25);
    }

    .btn-dashboard:hover {
        background: var(--gray-800);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.35);
    }

    /* User Dropdown */
    .user-dropdown {
        position: relative;
    }

    .btn-profile {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        background: white;
        padding: 0.4rem 1rem 0.4rem 0.4rem;
        border-radius: 50px;
        border: 1px solid var(--gray-200);
        color: var(--dark);
        font-weight: 600;
        font-size: 0.9375rem;
        cursor: pointer;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
        transition: all 0.25s ease;
    }

    .btn-profile:hover {
        border-color: var(--primary-light);
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.15);
    }

    .profile-avatar {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 0.8125rem;
    }

    .btn-profile i {
        font-size: 0.625rem;
        color: var(--gray-400);
        transition: transform 0.3s ease;
    }

    .user-dropdown:hover .btn-profile i {
        transform: rotate(180deg);
    }

    .dropdown-menu {
        position: absolute;
        top: calc(100% + 0.5rem);
        right: 0;
        min-width: 220px;
        background: white;
        border-radius: 16px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
        border: 1px solid var(--gray-100);
        padding: 0.5rem;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.25s ease;
        z-index: 1001;
    }

    .user-dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem 1rem;
        color: var(--gray-700);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.875rem;
        border-radius: 10px;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background: var(--gray-50);
        color: var(--primary);
    }

    .dropdown-item i {
        width: 18px;
        color: var(--gray-400);
    }

    .dropdown-item:hover i {
        color: var(--primary);
    }

    .dropdown-item.text-danger {
        color: var(--danger);
    }

    .dropdown-item.text-danger:hover {
        background: rgba(239, 68, 68, 0.08);
    }

    .dropdown-divider {
        margin: 0.5rem 0;
        border: none;
        border-top: 1px solid var(--gray-100);
    }

    /* Mobile Menu styles */
    .menu-toggle {
        display: none;
        flex-direction: column;
        gap: 5px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 8px;
        margin: -8px;
        border-radius: 10px;
        transition: background 0.2s ease;
    }

    .menu-toggle:hover {
        background: rgba(99, 102, 241, 0.08);
    }

    .bar {
        width: 24px;
        height: 2.5px;
        background: var(--dark);
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .menu-toggle.active .bar:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .menu-toggle.active .bar:nth-child(2) {
        opacity: 0;
    }

    .menu-toggle.active .bar:nth-child(3) {
        transform: rotate(-45deg) translate(5px, -5px);
    }

    .mobile-side-menu {
        position: fixed;
        right: -100%;
        top: 0;
        width: 320px;
        height: 100vh;
        background: white;
        z-index: 2000;
        padding: 2rem;
        transition: right 0.4s cubic-bezier(0.77, 0, 0.175, 1);
        box-shadow: -10px 0 40px rgba(0,0,0,0.15);
        overflow-y: auto;
    }

    .mobile-side-menu.active {
        right: 0;
    }

    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--gray-100);
    }

    .close-menu {
        font-size: 2rem;
        background: var(--gray-100);
        border: none;
        cursor: pointer;
        line-height: 1;
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-600);
        transition: all 0.2s ease;
    }

    .close-menu:hover {
        background: var(--gray-200);
        color: var(--dark);
    }

    .mobile-nav-links {
        list-style: none;
        padding: 0;
        margin-bottom: 2rem;
    }

    .mobile-nav-links li {
        margin-bottom: 0.25rem;
    }

    .mobile-nav-links a {
        display: flex;
        align-items: center;
        gap: 0.875rem;
        font-size: 1rem;
        font-weight: 600;
        text-decoration: none;
        color: var(--gray-700);
        font-family: 'Outfit', sans-serif;
        padding: 0.875rem 1rem;
        border-radius: 12px;
        transition: all 0.2s ease;
    }

    .mobile-nav-links a:hover,
    .mobile-nav-links a.active {
        background: rgba(99, 102, 241, 0.08);
        color: var(--primary);
    }

    .mobile-nav-links a i {
        width: 20px;
        font-size: 0.875rem;
        color: var(--gray-400);
    }

    .mobile-nav-links a:hover i,
    .mobile-nav-links a.active i {
        color: var(--primary);
    }

    .mobile-auth {
        padding-top: 1.5rem;
        border-top: 1px solid var(--gray-100);
    }

    .mobile-auth .btn-login,
    .mobile-auth .btn-register {
        display: flex;
        justify-content: center;
        width: 100%;
        text-align: center;
    }

    .mobile-auth .btn-login.full-width.mb-2 {
        margin-bottom: 0.75rem;
        border: 1px solid var(--gray-200);
        background: white;
    }

    .menu-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.5);
        backdrop-filter: blur(4px);
        z-index: 1500;
        opacity: 0;
        visibility: hidden;
        transition: all 0.35s ease;
    }

    .menu-overlay.active {
        opacity: 1;
        visibility: visible;
    }

    @media (max-width: 1024px) {
        .desktop-menu, .navbar-actions {
            display: none;
        }
        .menu-toggle {
            display: flex;
        }
    }

    @media (max-width: 480px) {
        .mobile-side-menu {
            width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('mainNavbar');
        const menuToggle = document.getElementById('menuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const closeMenu = document.getElementById('closeMenu');
        const menuOverlay = document.getElementById('menuOverlay');

        // Scroll Effect
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Check initial scroll position
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        }

        // Mobile Menu Toggle
        const toggleMenu = () => {
            menuToggle.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            menuOverlay.classList.toggle('active');
            document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
        };

        menuToggle?.addEventListener('click', toggleMenu);
        closeMenu?.addEventListener('click', toggleMenu);
        menuOverlay?.addEventListener('click', toggleMenu);

        // Close mobile menu on link click
        const mobileLinks = mobileMenu?.querySelectorAll('a');
        mobileLinks?.forEach(link => {
            link.addEventListener('click', () => {
                if (mobileMenu.classList.contains('active')) {
                    toggleMenu();
                }
            });
        });
    });
</script>