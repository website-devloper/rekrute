<nav class="clean-navbar" id="mainNavbar">
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
                    <div class="dropdown-menu-premium" id="navDropdown">
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
                <a href="{{ route('recruiter.dashboard') }}" class="btn-nav-primary">
                    Employer Dashboard
                </a>
            @else
                <a href="{{ route('sign_in') }}" class="btn-nav-login">Sign In</a>
                <a href="{{ route('sign_up') }}" class="btn-nav-primary">Join Now</a>
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
                     <a href="{{ route('candidate.dashboard') }}" class="btn-nav-primary w-100">Go to Dashboard</a>
                @else
                     <a href="{{ route('sign_in') }}" class="btn-nav-login w-100 mb-3">Sign In</a>
                     <a href="{{ route('sign_up') }}" class="btn-nav-primary w-100">Create Account</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    .clean-navbar {
        position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
        background: transparent;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 1.25rem 0;
    }

    .clean-navbar.scrolled {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(20px);
        padding: 0.75rem 0;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    .navbar-container {
        max-width: 1280px; margin: 0 auto; padding: 0 2rem;
        display: flex; justify-content: space-between; align-items: center;
    }

    .navbar-logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; }
    .logo-icon {
        width: 40px; height: 40px; background: #3b82f6; border-radius: 12px;
        display: flex; align-items: center; justify-content: center; color: white;
        font-size: 1.25rem; box-shadow: 0 8px 16px -4px rgba(59, 130, 246, 0.4);
    }
    .logo-text { font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 800; color: #0f172a; letter-spacing: -0.02em; }
    .logo-text .dot { color: #3b82f6; }

    .nav-menu { display: flex; gap: 2.5rem; list-style: none; margin: 0; padding: 0; }
    .nav-menu a {
        text-decoration: none; color: #475569; font-weight: 600; font-size: 0.95rem;
        transition: all 0.3s; position: relative;
    }
    .nav-menu a::after {
        content: ''; position: absolute; bottom: -4px; left: 0; width: 0; height: 2px;
        background: #3b82f6; transition: width 0.3s; border-radius: 2px;
    }
    .nav-menu a:hover::after, .nav-menu a.active::after { width: 100%; }
    .nav-menu a:hover, .nav-menu a.active { color: #0f172a; }

    .nav-actions { display: flex; align-items: center; gap: 1.5rem; }
    
    .btn-nav-primary {
        background: #3b82f6; color: white; padding: 0.75rem 1.5rem;
        border-radius: 12px; font-weight: 700; font-size: 0.9rem; transition: all 0.3s;
        border: none; cursor: pointer; text-decoration: none;
        box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.3);
    }
    .btn-nav-primary:hover { background: #2563eb; transform: translateY(-2px); box-shadow: 0 12px 24px -5px rgba(59, 130, 246, 0.4); }

    .btn-nav-login {
        color: #475569; font-weight: 700; font-size: 0.9rem; text-decoration: none;
        transition: color 0.3s;
    }
    .btn-nav-login:hover { color: #3b82f6; }

    .user-dropdown { position: relative; }
    .btn-profile {
        background: white; border: 1px solid #f1f5f9; display: flex; align-items: center; gap: 0.75rem;
        cursor: pointer; padding: 0.5rem 1rem 0.5rem 0.5rem; border-radius: 50px; transition: all 0.3s;
    }
    .btn-profile:hover { border-color: #3b82f6; background: #f8fafc; }
    .btn-profile i { font-size: 0.75rem; color: #94a3b8; }
    .user-firstname { font-weight: 700; color: #1e293b; font-size: 0.9rem; }
    
    .avatar-sm {
        width: 32px; height: 32px; border-radius: 50%; background: #3b82f6;
        color: white; display: flex; align-items: center; justify-content: center; overflow: hidden; font-weight: 700;
    }

    .dropdown-menu-premium {
        position: absolute; right: 0; top: calc(100% + 1rem); width: 240px; background: white;
        border-radius: 1.25rem; box-shadow: 0 20px 40px -10px rgba(0,0,0,0.1);
        padding: 0.75rem; display: none; flex-direction: column; border: 1px solid #f1f5f9;
        transform: translateY(10px); transition: all 0.3s;
    }
    .dropdown-menu-premium.show { display: flex; transform: translateY(0); }
    .dropdown-header { padding: 0.75rem 1rem; border-bottom: 1px solid #f1f5f9; margin-bottom: 0.5rem; }
    .user-full-name { font-weight: 800; color: #0f172a; margin: 0; font-size: 0.95rem; }
    .user-role { font-size: 0.75rem; color: #94a3b8; margin: 0; font-weight: 600; }

    .dropdown-menu-premium a {
        padding: 0.75rem 1rem; text-decoration: none; color: #475569;
        display: flex; align-items: center; gap: 0.75rem; border-radius: 0.75rem; font-size: 0.9rem;
        font-weight: 600; transition: all 0.2s;
    }
    .dropdown-menu-premium a:hover { background: #f8fafc; color: #3b82f6; }
    .dropdown-divider { height: 1px; background: #f1f5f9; margin: 0.5rem 0; }
    .logout-link:hover { color: #ef4444 !important; background: #fef2f2 !important; }

    .mobile-toggle { 
        display: none; background: #f8fafc; border: 1px solid #f1f5f9; 
        padding: 10px; border-radius: 10px; cursor: pointer; flex-direction: column; gap: 5px;
    }
    .mobile-toggle .bar { width: 20px; height: 2px; background: #1e293b; border-radius: 2px; }

    .mobile-menu-overlay {
        position: fixed; inset: 0; background: rgba(15, 23, 42, 0.9); backdrop-filter: blur(8px);
        z-index: 1100; display: none; padding: 1.5rem;
    }
    .mobile-menu-overlay.show { display: block; }
    .mobile-menu-inner { background: white; border-radius: 2rem; padding: 2.5rem; height: 100%; display: flex; flex-direction: column; }
    .mobile-menu-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem; }
    .close-mobile { background: none; border: none; font-size: 2.5rem; color: #1e293b; line-height: 1; }
    .mobile-links { display: flex; flex-direction: column; gap: 1.5rem; flex: 1; }
    .mobile-link { font-size: 1.5rem; font-weight: 800; color: #0f172a; text-decoration: none; letter-spacing: -0.02em; }
    
    @media (max-width: 1024px) {
        .nav-menu { display: none; }
        .nav-actions { display: none; }
        .mobile-toggle { display: flex; }
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
            var dropdowns = document.getElementsByClassName("dropdown-menu-premium");
            for (var i = 0; i < dropdowns.length; i++) {
                if (dropdowns[i].classList.contains('show')) {
                    dropdowns[i].classList.remove('show');
                }
            }
        }
    }
</script>