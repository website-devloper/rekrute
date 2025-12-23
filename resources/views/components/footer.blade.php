<!-- Premium Modern Footer -->
<footer class="premium-footer">
    <!-- Decorative Elements -->
    <div class="footer-glow footer-glow-1"></div>
    <div class="footer-glow footer-glow-2"></div>
    
    <div class="footer-container">
        <!-- Top CTA Section -->
        <div class="footer-cta" data-aos="fade-up">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Find Your Dream Job?</h2>
                <p class="cta-text">Join thousands of professionals who have found their perfect career match.</p>
            </div>
            <div class="cta-buttons">
                <a href="{{ route('jobs') }}" class="btn-cta-primary">
                    <span>Browse Jobs</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="{{ route('sign_up') }}" class="btn-cta-secondary">
                    <i class="fas fa-user-plus"></i>
                    <span>Create Account</span>
                </a>
            </div>
        </div>

        <!-- Footer Main Content -->
        <div class="footer-main">
            <div class="footer-grid">
                <!-- Company Info -->
                <div class="footer-column footer-brand">
                    <div class="footer-logo">
                        <div class="logo-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                            </svg>
                        </div>
                        <span class="logo-text">REKR<span>UTE</span></span>
                    </div>
                    <p class="footer-description">
                        Your AI-powered recruitment partner. Connecting ambitious talent with world-class opportunities at leading companies globally.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" aria-label="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- For Job Seekers -->
                <div class="footer-column">
                    <h3 class="footer-heading">For Job Seekers</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('jobs') }}"><i class="fas fa-chevron-right"></i> Browse Jobs</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Job Categories</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Job Alerts</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Career Advice</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Resume Builder</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Salary Guide</a></li>
                    </ul>
                </div>

                <!-- For Employers -->
                <div class="footer-column">
                    <h3 class="footer-heading">For Employers</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('companies') }}"><i class="fas fa-chevron-right"></i> Browse Candidates</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Post a Job</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Pricing Plans</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Employer Resources</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Recruitment Solutions</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Company Profiles</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div class="footer-column">
                    <h3 class="footer-heading">Company</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i> Contact Us</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Careers</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Blog</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Press</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Partners</a></li>
                    </ul>
                </div>

                <!-- Contact & Newsletter -->
                <div class="footer-column footer-contact">
                    <h3 class="footer-heading">Get in Touch</h3>
                    <ul class="contact-info">
                        <li>
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <span class="contact-label">Email us</span>
                                <a href="mailto:support@rekrute.com">support@rekrute.com</a>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="contact-text">
                                <span class="contact-label">Call us</span>
                                <a href="tel:+15551234567">+1 (555) 123-4567</a>
                            </div>
                        </li>
                        <li>
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <span class="contact-label">Visit us</span>
                                <span>123 Innovation Drive, Tech City</span>
                            </div>
                        </li>
                    </ul>
                    
                    <!-- Mini Newsletter -->
                    <div class="mini-newsletter">
                        <p class="newsletter-label">Subscribe to job alerts</p>
                        <form class="newsletter-form-mini">
                            <input type="email" placeholder="Your email" class="newsletter-input-mini">
                            <button type="submit" class="newsletter-btn-mini" aria-label="Subscribe">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <p class="copyright">
                    © {{ date('Y') }} Rekrute. All rights reserved. Made with <span class="heart">❤</span> for job seekers.
                </p>
                <div class="footer-bottom-links">
                    <a href="#">Terms</a>
                    <span class="divider">•</span>
                    <a href="#">Privacy</a>
                    <span class="divider">•</span>
                    <a href="#">Cookies</a>
                    <span class="divider">•</span>
                    <a href="#">Sitemap</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .premium-footer {
        background: linear-gradient(180deg, var(--gray-900) 0%, #0c1322 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .footer-glow {
        position: absolute;
        border-radius: 50%;
        filter: blur(100px);
        opacity: 0.15;
        pointer-events: none;
    }

    .footer-glow-1 {
        width: 500px;
        height: 500px;
        background: var(--primary);
        top: -200px;
        left: -150px;
    }

    .footer-glow-2 {
        width: 400px;
        height: 400px;
        background: #ec4899;
        bottom: -100px;
        right: -100px;
    }

    .footer-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 2rem;
        position: relative;
        z-index: 1;
    }

    /* CTA Section */
    .footer-cta {
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 1.5rem;
        padding: 3rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 2rem;
        margin-top: -4rem;
        box-shadow: 0 20px 50px -10px rgba(99, 102, 241, 0.4);
        flex-wrap: wrap;
    }

    .cta-content {
        flex: 1;
        min-width: 300px;
    }

    .cta-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .cta-text {
        opacity: 0.9;
        font-size: 1rem;
    }

    .cta-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-cta-primary {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        background: white;
        color: var(--primary);
        padding: 0.875rem 1.75rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .btn-cta-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .btn-cta-primary i {
        transition: transform 0.3s ease;
    }

    .btn-cta-primary:hover i {
        transform: translateX(4px);
    }

    .btn-cta-secondary {
        display: inline-flex;
        align-items: center;
        gap: 0.625rem;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        color: white;
        padding: 0.875rem 1.75rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        border: 1px solid rgba(255, 255, 255, 0.25);
        transition: all 0.3s ease;
    }

    .btn-cta-secondary:hover {
        background: rgba(255, 255, 255, 0.25);
        transform: translateY(-2px);
    }

    /* Footer Main */
    .footer-main {
        padding: 5rem 0 3rem;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 1.5fr repeat(3, 1fr) 1.3fr;
        gap: 3rem;
    }

    .footer-brand {
        padding-right: 2rem;
    }

    .footer-logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .footer-logo .logo-icon {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .footer-logo .logo-icon svg {
        width: 22px;
        height: 22px;
        color: white;
    }

    .footer-logo .logo-text {
        font-family: 'Outfit', sans-serif;
        font-size: 1.5rem;
        font-weight: 800;
        color: white;
    }

    .footer-logo .logo-text span {
        color: var(--primary-light);
    }

    .footer-description {
        color: var(--gray-400);
        font-size: 0.95rem;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }

    .social-links {
        display: flex;
        gap: 0.625rem;
    }

    .social-link {
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-400);
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-3px);
    }

    .footer-heading {
        font-family: 'Outfit', sans-serif;
        font-size: 1.0625rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.75rem;
    }

    .footer-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 2px;
        background: var(--primary);
        border-radius: 2px;
    }

    .footer-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-links li {
        margin-bottom: 0.625rem;
    }

    .footer-links a {
        color: var(--gray-400);
        text-decoration: none;
        font-size: 0.9375rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.25s ease;
    }

    .footer-links a i {
        font-size: 0.625rem;
        opacity: 0;
        transform: translateX(-5px);
        transition: all 0.25s ease;
    }

    .footer-links a:hover {
        color: white;
        transform: translateX(5px);
    }

    .footer-links a:hover i {
        opacity: 1;
        transform: translateX(0);
        color: var(--primary-light);
    }

    /* Contact Info */
    .contact-info {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .contact-info li {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.25rem;
    }

    .contact-icon {
        width: 40px;
        height: 40px;
        background: rgba(99, 102, 241, 0.15);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-light);
        flex-shrink: 0;
    }

    .contact-text {
        display: flex;
        flex-direction: column;
    }

    .contact-label {
        font-size: 0.8125rem;
        color: var(--gray-500);
        margin-bottom: 0.125rem;
    }

    .contact-text a,
    .contact-text span {
        color: var(--gray-300);
        text-decoration: none;
        font-size: 0.9375rem;
        transition: color 0.25s ease;
    }

    .contact-text a:hover {
        color: var(--primary-light);
    }

    /* Mini Newsletter */
    .mini-newsletter {
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .newsletter-label {
        font-size: 0.875rem;
        color: var(--gray-400);
        margin-bottom: 0.75rem;
    }

    .newsletter-form-mini {
        display: flex;
        gap: 0.5rem;
    }

    .newsletter-input-mini {
        flex: 1;
        padding: 0.75rem 1rem;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        color: white;
        font-size: 0.875rem;
        outline: none;
        transition: all 0.25s ease;
    }

    .newsletter-input-mini::placeholder {
        color: var(--gray-500);
    }

    .newsletter-input-mini:focus {
        background: rgba(255, 255, 255, 0.1);
        border-color: var(--primary);
    }

    .newsletter-btn-mini {
        width: 44px;
        height: 44px;
        background: var(--primary);
        border: none;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        transition: all 0.25s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .newsletter-btn-mini:hover {
        background: var(--primary-dark);
        transform: scale(1.05);
    }

    /* Footer Bottom */
    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        padding: 1.5rem 0;
    }

    .footer-bottom-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .copyright {
        color: var(--gray-500);
        font-size: 0.875rem;
        margin: 0;
    }

    .heart {
        color: #f43f5e;
        animation: heartbeat 1.5s ease infinite;
    }

    @keyframes heartbeat {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.2); }
    }

    .footer-bottom-links {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .footer-bottom-links a {
        color: var(--gray-500);
        text-decoration: none;
        font-size: 0.875rem;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        transition: all 0.25s ease;
    }

    .footer-bottom-links a:hover {
        color: white;
        background: rgba(255, 255, 255, 0.08);
    }

    .footer-bottom-links .divider {
        color: var(--gray-600);
        font-size: 0.625rem;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .footer-grid {
            grid-template-columns: repeat(3, 1fr);
        }
        
        .footer-brand {
            grid-column: span 3;
            padding-right: 0;
            margin-bottom: 1rem;
        }
        
        .footer-contact {
            grid-column: span 3;
            margin-top: 1rem;
        }
    }

    @media (max-width: 768px) {
        .footer-cta {
            flex-direction: column;
            text-align: center;
            padding: 2rem;
            margin-top: -3rem;
        }

        .cta-buttons {
            justify-content: center;
        }

        .footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .footer-brand {
            grid-column: span 2;
        }

        .footer-contact {
            grid-column: span 2;
        }

        .footer-bottom-content {
            flex-direction: column;
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        .footer-grid {
            grid-template-columns: 1fr;
        }

        .footer-brand,
        .footer-contact {
            grid-column: span 1;
        }

        .cta-buttons {
            flex-direction: column;
            width: 100%;
        }

        .btn-cta-primary,
        .btn-cta-secondary {
            width: 100%;
            justify-content: center;
        }
    }
</style>