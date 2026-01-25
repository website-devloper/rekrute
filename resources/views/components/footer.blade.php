<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="/" class="footer-logo">
                    <div class="logo-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <span class="logo-text">Rekrify</span>
                </a>
                <p class="brand-description">Empowering professionals to find their true calling and helping companies build exceptional teams through AI-driven recruitment.</p>
                <div class="social-links">
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="GitHub"><i class="fab fa-github"></i></a>
                </div>
            </div>

            <!-- Links Columns -->
            <div class="footer-links-grid">
                <div class="footer-col">
                    <h5>For Candidates</h5>
                    <ul>
                        <li><a href="{{ route('jobs') }}">Browse Jobs</a></li>
                        <li><a href="#">Career Path</a></li>
                        <li><a href="#">Skill Assessment</a></li>
                        <li><a href="#">Success Stories</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h5>For Employers</h5>
                    <ul>
                        <li><a href="{{ route('recruiter.post_job') }}">Post a Job</a></li>
                        <li><a href="#">Talent Pool</a></li>
                        <li><a href="#">API Access</a></li>
                        <li><a href="#">Hiring Guide</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h5>Company</h5>
                    <ul>
                        <li><a href="{{ route('about') }}">Our Story</a></li>
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        <li><a href="#">Privacy Hub</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Rekrify Global Inc. Made with <i class="fas fa-heart"></i> for the future of work.</p>
        </div>
    </div>
</footer>

<style>
    .footer {
        background: var(--gray-900);
        color: var(--gray-400);
        padding: 4rem 0 2rem;
        margin-top: auto;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 1.5fr 2fr;
        gap: 4rem;
        margin-bottom: 3rem;
    }

    /* Brand Column */
    .footer-brand {
        max-width: 400px;
    }

    .footer-logo {
        display: flex;
        align-items: center;
        gap: 0.625rem;
        text-decoration: none;
        margin-bottom: 1.5rem;
    }

    .footer-logo .logo-icon {
        width: 36px;
        height: 36px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
    }

    .footer-logo .logo-text {
        font-family: 'Outfit', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        color: white;
    }

    .brand-description {
        font-size: 0.9375rem;
        line-height: 1.7;
        margin-bottom: 2rem;
        color: var(--gray-500);
    }

    .social-links {
        display: flex;
        gap: 0.75rem;
    }

    .social-links a {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-400);
        transition: all 0.3s;
        text-decoration: none;
    }

    .social-links a:hover {
        background: var(--primary);
        color: white;
        border-color: var(--primary);
        transform: translateY(-2px);
    }

    /* Links Grid */
    .footer-links-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
    }

    .footer-col h5 {
        color: white;
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 1.25rem;
        font-family: 'Outfit', sans-serif;
    }

    .footer-col ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 0.875rem;
    }

    .footer-col ul li a {
        color: var(--gray-500);
        text-decoration: none;
        font-size: 0.9375rem;
        font-weight: 500;
        transition: all 0.2s;
        display: inline-block;
    }

    .footer-col ul li a:hover {
        color: white;
        padding-left: 5px;
    }

    /* Footer Bottom */
    .footer-bottom {
        padding-top: 2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        text-align: center;
        font-size: 0.875rem;
        color: var(--gray-500);
    }

    .footer-bottom i.fa-heart {
        color: var(--danger);
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .footer-grid {
            grid-template-columns: 1fr;
            gap: 3rem;
        }

        .footer-brand {
            max-width: 100%;
        }

        .footer-links-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 640px) {
        .footer-links-grid {
            grid-template-columns: 1fr;
        }

        .footer {
            padding: 3rem 0 1.5rem;
        }
    }
</style>
