<nav class="navbar" id="mainNavbar">
    <div class="navbar-container">
        <!-- Logo -->
        <a href="/" class="navbar-logo">
            <div class="logo-icon">
                <i class="fas fa-rocket"></i>
            </div>
            <span class="logo-text">Rekrify<span class="dot">.</span></span>
        </a>

        <!-- Desktop Navigation -->
        <ul class="nav-menu">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('jobs') }}" class="nav-link {{ request()->routeIs('jobs') ? 'active' : '' }}">Jobs</a></li>
            <li><a href="{{ route('companies') }}" class="nav-link {{ request()->routeIs('companies') ? 'active' : '' }}">Companies</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Platform</a></li>
            <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>

        <!-- Action Buttons -->
        <div class="nav-actions">
            @auth('candidate')
                <div class="user-dropdown">
                    <button class="btn-profile" onclick="toggleDropdown()">
                        <div class="avatar-sm">
                            @if(auth('candidate')->user()->img_url)
                                <img src="{{ asset('storage/' . auth('candidate')->user()->img_url) }}" alt="">
                            @else
                                {{ substr(auth('candidate')->user()->first_name, 0, 1) }}
                            @endif
                        </div>
                        <span class="user-firstname">{{ auth('candidate')->user()->first_name }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="dropdown-menu" id="navDropdown">
                        <div class="dropdown-header">
                            <p class="user-full-name">{{ auth('candidate')->user()->first_name }} {{ auth('candidate')->user()->last_name }}</p>
                            <p class="user-role">Candidate Account</p>
                        </div>
                        <a href="{{ route('candidate.dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a>
                        <a href="{{ route('candidate.profile') }}"><i class="fas fa-user"></i> My Profile</a>
                        <a href="#"><i class="fas fa-bookmark"></i> Saved Jobs</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="logout-link"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                    </div>
                </div>
            @elseauth('employer')
                <a href="{{ route('recruiter.dashboard') }}" class="btn btn-primary">
                    Employer Dashboard
                </a>
            @else
                <a href="{{ route('sign_in') }}" class="btn-login">Sign In</a>
                <a href="{{ route('sign_up') }}" class="btn btn-primary">Join Now</a>
            @endauth
        </div>

        <!-- Mobile Toggle -->
        <button class="mobile-toggle" onclick="toggleMobileMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
        </button>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobileMenu">
        <div class="mobile-menu-inner">
            <div class="mobile-menu-header">
                <span class="logo-text">Rekrify<span class="dot">.</span></span>
                <button class="close-mobile" onclick="toggleMobileMenu()">&times;</button>
            </div>
            <div class="mobile-links">
                <a href="{{ route('home') }}" class="mobile-link">Home</a>
                <a href="{{ route('jobs') }}" class="mobile-link">Find Jobs</a>
                <a href="{{ route('companies') }}" class="mobile-link">Companies</a>
                <a href="{{ route('about') }}" class="mobile-link">About Us</a>
            </div>
            <div class="mobile-actions">
                @auth('candidate')
                     <a href="{{ route('candidate.dashboard') }}" class="btn btn-primary w-full">Go to Dashboard</a>
                @else
                     <a href="{{ route('sign_in') }}" class="btn btn-secondary w-full mb-4">Sign In</a>
                     <a href="{{ route('sign_up') }}" class="btn btn-primary w-full">Create Account</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        background: transparent;
        transition: all 0.3s ease;
        padding: 0.75rem 0;
    }

    .navbar.scrolled {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        border-bottom: 1px solid var(--gray-100);
    }

    .navbar-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Logo */
    .navbar-logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        text-decoration: none;
    }

    .logo-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.125rem;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    }

    .logo-text {
        font-family: 'Outfit', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--gray-900);
        letter-spacing: -0.02em;
    }

    .logo-text .dot {
        color: var(--primary);
    }

    /* Navigation Menu */
    .nav-menu {
        display: flex;
        gap: 2rem;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-link {
        text-decoration: none;
        color: var(--gray-600);
        font-weight: 500;
        font-size: 0.9375rem;
        padding: 0.5rem 0;
        position: relative;
        transition: color 0.2s ease;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--primary);
        border-radius: 2px;
        transition: all 0.2s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover,
    .nav-link.active {
        color: var(--gray-900);
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 100%;
    }

    /* Action Buttons */
    .nav-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .btn-login {
        color: var(--gray-600);
        font-weight: 600;
        font-size: 0.9375rem;
        text-decoration: none;
        padding: 0.5rem 1rem;
        transition: color 0.2s;
    }

    .btn-login:hover {
        color: var(--primary);
    }

    /* User Dropdown */
    .user-dropdown {
        position: relative;
    }

    .btn-profile {
        background: white;
        border: 1px solid var(--gray-200);
        display: flex;
        align-items: center;
        gap: 0.625rem;
        cursor: pointer;
        padding: 0.375rem 0.875rem 0.375rem 0.375rem;
        border-radius: var(--radius-full);
        transition: all 0.2s;
    }

    .btn-profile:hover {
        border-color: var(--primary);
        background: var(--gray-50);
    }

    .btn-profile i {
        font-size: 0.625rem;
        color: var(--gray-400);
    }

    .user-firstname {
        font-weight: 600;
        color: var(--gray-800);
        font-size: 0.875rem;
    }

    .avatar-sm {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .avatar-sm img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Dropdown Menu */
    .dropdown-menu {
        position: absolute;
        right: 0;
        top: calc(100% + 0.5rem);
        width: 220px;
        background: white;
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        padding: 0.5rem;
        display: none;
        flex-direction: column;
        border: 1px solid var(--gray-100);
    }

    .dropdown-menu.show {
        display: flex;
    }

    .dropdown-header {
        padding: 0.75rem 1rem;
        border-bottom: 1px solid var(--gray-100);
        margin-bottom: 0.375rem;
    }

    .user-full-name {
        font-weight: 700;
        color: var(--gray-900);
        margin: 0;
        font-size: 0.9375rem;
    }

    .user-role {
        font-size: 0.75rem;
        color: var(--gray-500);
        margin: 0;
    }

    .dropdown-menu a {
        padding: 0.625rem 1rem;
        text-decoration: none;
        color: var(--gray-600);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border-radius: var(--radius);
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.15s;
    }

    .dropdown-menu a:hover {
        background: var(--gray-50);
        color: var(--primary);
    }

    .dropdown-divider {
        height: 1px;
        background: var(--gray-100);
        margin: 0.375rem 0;
    }

    .logout-link:hover {
        color: var(--danger) !important;
        background: rgba(239, 68, 68, 0.05) !important;
    }

    /* Mobile Toggle */
    .mobile-toggle {
        display: none;
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        padding: 10px;
        border-radius: 10px;
        cursor: pointer;
        flex-direction: column;
        gap: 5px;
    }

    .mobile-toggle .bar {
        width: 20px;
        height: 2px;
        background: var(--gray-800);
        border-radius: 2px;
    }

    /* Mobile Menu Overlay */
    .mobile-menu-overlay {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.9);
        backdrop-filter: blur(8px);
        z-index: 1100;
        display: none;
        padding: 1rem;
    }

    .mobile-menu-overlay.show {
        display: block;
    }

    .mobile-menu-inner {
        background: white;
        border-radius: 1.5rem;
        padding: 2rem;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .mobile-menu-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .close-mobile {
        background: none;
        border: none;
        font-size: 2rem;
        color: var(--gray-800);
        cursor: pointer;
        line-height: 1;
    }

    .mobile-links {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        flex: 1;
    }

    .mobile-link {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--gray-900);
        text-decoration: none;
        padding: 0.75rem 0;
        border-bottom: 1px solid var(--gray-100);
    }

    .mobile-actions {
        margin-top: auto;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .w-full {
        width: 100%;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .nav-menu {
            display: none;
        }

        .nav-actions {
            display: none;
        }

        .mobile-toggle {
            display: flex;
        }
    }
</style>

<script>
    function toggleDropdown() {
        document.getElementById('navDropdown').classList.toggle('show');
    }

    function toggleMobileMenu() {
        document.getElementById('mobileMenu').classList.toggle('show');
        document.body.style.overflow = document.getElementById('mobileMenu').classList.contains('show') ? 'hidden' : '';
    }

    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('mainNavbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    window.onclick = function(event) {
        if (!event.target.closest('.user-dropdown')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            for (var i = 0; i < dropdowns.length; i++) {
                if (dropdowns[i].classList.contains('show')) {
                    dropdowns[i].classList.remove('show');
                }
            }
        }
    }
</script>