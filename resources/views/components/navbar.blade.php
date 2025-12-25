<nav class="clean-navbar" id="mainNavbar">
    <div class="navbar-container">
        <!-- Logo -->
        <a href="/" class="navbar-logo">
            <div class="logo-icon">
                <!-- Use FontAwesome for simple icon -->
                <i class="fas fa-search-dollar"></i>
            </div>
            <span class="logo-text">Rekrute</span>
        </a>

        <!-- Desktop Navigation -->
        <ul class="nav-menu">
            <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('jobs') }}" class="nav-link {{ request()->routeIs('jobs') ? 'active' : '' }}">Find Jobs</a></li>
            <li><a href="{{ route('companies') }}" class="nav-link {{ request()->routeIs('companies') ? 'active' : '' }}">Companies</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a></li>
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
                        <span>{{ auth('candidate')->user()->first_name }}</span>
                        <i class="fas fa-chevron-down ml-1"></i>
                    </button>
                    <!-- Dropdown content managed by CSS or JS -->
                    <div class="dropdown-menu" id="navDropdown">
                        <a href="{{ route('candidate.dashboard') }}"><i class="fas fa-th-large"></i> Dashboard</a>
                        <a href="{{ route('candidate.profile') }}"><i class="fas fa-user"></i> Profile</a>
                        <hr>
                        <a href="{{ route('logout') }}" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </div>
            @elseauth('employer')
                <a href="{{ route('recruiter.dashboard') }}" class="btn-primary">
                    Dashboard
                </a>
            @else
                <a href="{{ route('sign_in') }}" class="nav-link">Login</a>
                <a href="{{ route('sign_up') }}" class="btn-primary">Register</a>
            @endauth
        </div>

        <!-- Mobile Toggle -->
        <button class="mobile-toggle" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-header">
            <span class="logo-text">Rekrute</span>
            <button class="close-btn" onclick="toggleMobileMenu()">&times;</button>
        </div>
        <div class="mobile-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('jobs') }}">Find Jobs</a>
            <a href="{{ route('companies') }}">Companies</a>
            <a href="{{ route('about') }}">About</a>
        </div>
        <div class="mobile-actions">
            @auth('candidate')
                 <a href="{{ route('candidate.dashboard') }}" class="btn-primary w-100">Dashboard</a>
            @elseauth('employer')
                 <a href="{{ route('recruiter.dashboard') }}" class="btn-primary w-100">Dashboard</a>
            @else
                 <a href="{{ route('sign_in') }}" class="btn-outline w-100 mb-2">Login</a>
                 <a href="{{ route('sign_up') }}" class="btn-primary w-100">Register</a>
            @endauth
        </div>
    </div>
</nav>

<style>
    .clean-navbar {
        position: sticky; top: 0; z-index: 1000;
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border-bottom: 1px solid var(--gray-200);
        padding: 0.75rem 0;
    }

    .navbar-container {
        max-width: 1200px; margin: 0 auto; padding: 0 1.5rem;
        display: flex; justify-content: space-between; align-items: center;
    }

    .navbar-logo {
        display: flex; align-items: center; gap: 0.75rem; text-decoration: none;
    }
    .logo-icon {
        width: 36px; height: 36px; background: var(--primary); border-radius: 8px;
        display: flex; align-items: center; justify-content: center; color: white;
    }
    .logo-text { font-size: 1.25rem; font-weight: 700; color: var(--gray-900); }

    .nav-menu {
        display: flex; gap: 2rem; list-style: none; margin: 0; padding: 0;
    }
    .nav-menu a {
        text-decoration: none; color: var(--gray-600); font-weight: 500; font-size: 0.9375rem;
        transition: color 0.2s;
    }
    .nav-menu a:hover, .nav-menu a.active { color: var(--primary); }

    .nav-actions { display: flex; align-items: center; gap: 1rem; }
    
    .btn-primary {
        background: var(--primary); color: white; padding: 0.5rem 1.25rem;
        border-radius: 6px; font-weight: 500; font-size: 0.9375rem; transition: background 0.2s;
        border: none; cursor: pointer; text-decoration: none; display: inline-block;
    }
    .btn-primary:hover { background: var(--primary-dark); }

    .btn-outline {
        border: 1px solid var(--gray-300); color: var(--gray-700); padding: 0.5rem 1.25rem;
        border-radius: 6px; font-weight: 500; text-decoration: none; transition: all 0.2s; text-align: center;
    }
    .btn-outline:hover { border-color: var(--gray-400); background: var(--gray-50); }

    .user-dropdown { position: relative; }
    .btn-profile {
        background: none; border: none; display: flex; align-items: center; gap: 0.5rem;
        cursor: pointer; padding: 0.25rem;
    }
    .avatar-sm {
        width: 32px; height: 32px; border-radius: 50%; background: var(--primary);
        color: white; display: flex; align-items: center; justify-content: center; overflow: hidden; font-size: 0.875rem;
    }
    .dropdown-menu {
        position: absolute; right: 0; top: 120%; width: 200px; background: white;
        border: 1px solid var(--gray-200); border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        padding: 0.5rem; display: none; flex-direction: column;
    }
    .dropdown-menu.show { display: flex; }
    .dropdown-menu a {
        padding: 0.5rem 0.75rem; text-decoration: none; color: var(--gray-700);
        display: flex; align-items: center; gap: 0.5rem; border-radius: 4px; font-size: 0.875rem;
    }
    .dropdown-menu a:hover { background: var(--gray-50); color: var(--primary); }
    .dropdown-menu hr { margin: 0.5rem 0; border: 0; border-top: 1px solid var(--gray-100); }

    .mobile-toggle { display: none; background: none; border: none; font-size: 1.5rem; color: var(--gray-700); cursor: pointer; }
    .mobile-menu {
        position: fixed; inset: 0; background: white; z-index: 1100;
        display: none; flex-direction: column; padding: 1.5rem;
    }
    .mobile-menu.show { display: flex; }
    .mobile-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
    .close-btn { background: none; border: none; font-size: 2rem; }
    .mobile-links { display: flex; flex-direction: column; gap: 1rem; margin-bottom: 2rem; }
    .mobile-links a { font-size: 1.25rem; color: var(--gray-800); text-decoration: none; font-weight: 500; }

    @media (max-width: 768px) {
        .nav-menu { display: none; }
        .nav-actions { display: none; }
        .mobile-toggle { display: block; }
    }
</style>

<script>
    function toggleDropdown() {
        document.getElementById('navDropdown').classList.toggle('show');
    }
    function toggleMobileMenu() {
        document.getElementById('mobileMenu').classList.toggle('show');
    }
    
    // Close dropdown on outside click
    window.onclick = function(event) {
        if (!event.target.closest('.user-dropdown')) {
            var dropdowns = document.getElementsByClassName("dropdown-menu");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>