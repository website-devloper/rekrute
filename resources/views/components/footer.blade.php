<footer class="clean-footer">
    <div class="footer-container">
        <div class="footer-top">
            <div class="footer-brand">
                <div class="logo-area">
                    <div class="logo-icon"><i class="fas fa-search-dollar"></i></div>
                    <span class="logo-text">Rekrute</span>
                </div>
                <p>Connecting talent with opportunity. Your future starts here.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <div class="footer-links">
                <div class="link-column">
                    <h4>Candidates</h4>
                    <ul>
                        <li><a href="{{ route('jobs') }}">Browse Jobs</a></li>
                        <li><a href="#">Companies</a></li>
                        <li><a href="#">Salaries</a></li>
                        <li><a href="#">Career Advice</a></li>
                    </ul>
                </div>
                <div class="link-column">
                    <h4>Employers</h4>
                    <ul>
                        <li><a href="{{ route('recruiter.post_job') }}">Post a Job</a></li>
                        <li><a href="#">Browse Candidates</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Recruiting Solutions</a></li>
                    </ul>
                </div>
                <div class="link-column">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Rekrute. All rights reserved.</p>
            <div class="bottom-links">
                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Security</a>
            </div>
        </div>
    </div>
</footer>

<style>
    .clean-footer {
        background: var(--gray-50); border-top: 1px solid var(--gray-200);
        padding: 4rem 0 2rem; color: var(--gray-600);
        margin-top: auto; /* Push to bottom if flex container */
    }
    
    .footer-container {
        max-width: 1200px; margin: 0 auto; padding: 0 1.5rem;
    }

    .footer-top {
        display: flex; justify-content: space-between; gap: 4rem; flex-wrap: wrap; margin-bottom: 4rem;
    }

    .footer-brand { max-width: 300px; }
    .logo-area { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem; }
    .logo-icon {
        width: 32px; height: 32px; background: var(--primary); border-radius: 6px;
        display: flex; align-items: center; justify-content: center; color: white;
    }
    .logo-text { font-size: 1.25rem; font-weight: 700; color: var(--gray-900); }
    .footer-brand p { font-size: 0.9375rem; margin-bottom: 1.5rem; line-height: 1.6; }

    .social-links { display: flex; gap: 1rem; }
    .social-links a {
        width: 36px; height: 36px; border-radius: 50%; background: white; border: 1px solid var(--gray-200);
        display: flex; align-items: center; justify-content: center; color: var(--gray-500); text-decoration: none;
        transition: all 0.2s;
    }
    .social-links a:hover { background: var(--primary); color: white; border-color: var(--primary); }

    .footer-links { display: flex; gap: 4rem; flex: 1; justify-content: flex-end; flex-wrap: wrap; }
    .link-column h4 { font-size: 1rem; color: var(--gray-900); font-weight: 600; margin-bottom: 1.25rem; }
    .link-column ul { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; }
    .link-column ul li a {
        color: var(--gray-500); text-decoration: none; font-size: 0.9375rem; transition: color 0.2s;
    }
    .link-column ul li a:hover { color: var(--primary); }

    .footer-bottom {
        padding-top: 2rem; border-top: 1px solid var(--gray-200);
        display: flex; justify-content: space-between; align-items: center; font-size: 0.875rem;
    }
    .bottom-links { display: flex; gap: 1.5rem; }
    .bottom-links a { color: var(--gray-500); text-decoration: none; }
    .bottom-links a:hover { color: var(--gray-900); }

    @media (max-width: 768px) {
        .footer-top { flex-direction: column; gap: 2rem; }
        .footer-links { justify-content: flex-start; gap: 2rem; }
        .footer-bottom { flex-direction: column; gap: 1rem; text-align: center; }
    }
</style>