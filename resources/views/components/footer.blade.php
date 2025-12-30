<footer class="premium-footer">
    <div class="footer-wave">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C57.05,115.85,131.59,123.44,204.47,105.56,252.07,93.84,293.75,72.48,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand-col">
                <a href="/" class="footer-logo">
                    <div class="logo-icon-sm"><i class="fas fa-rocket"></i></div>
                    <span class="logo-text">Rekrute<span class="dot">.</span></span>
                </a>
                <p class="brand-description">Empowering professionals to find their true calling and helping companies build exceptional teams through AI-driven recruitment.</p>
                <div class="social-pills">
                    <a href="#" class="social-pill"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-pill"><i class="fab fa-x-twitter"></i></a>
                    <a href="#" class="social-pill"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-pill"><i class="fab fa-github"></i></a>
                </div>
            </div>

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

        <div class="footer-bottom-bar">
            <div class="copyright">
                &copy; {{ date('Y') }} Rekrute Global Inc. Made with <i class="fas fa-heart text-danger"></i> for the future of work.
            </div>
            <div class="footer-badges">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Stripe_Logo%2C_revised_2016.svg" alt="Stripe" class="footer-badge-img">
                <span class="secure-tag"><i class="fas fa-lock"></i> SSL Secured</span>
            </div>
        </div>
    </div>
</footer>

<style>
    .premium-footer {
        background: #0f172a; color: #94a3b8; padding: 6rem 0 3rem; 
        position: relative; margin-top: auto; overflow: hidden;
    }
    
    .footer-wave {
        position: absolute; top: 0; left: 0; width: 100%; overflow: hidden; line-height: 0;
    }
    .footer-wave svg { position: relative; display: block; width: calc(100% + 1.3px); height: 50px; }
    .footer-wave .shape-fill { fill: #ffffff; }

    .footer-grid { display: flex; justify-content: space-between; gap: 5rem; margin-bottom: 5rem; }
    .footer-brand-col { flex: 1.2; max-width: 400px; }
    
    .footer-logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; margin-bottom: 2rem; }
    .logo-icon-sm { 
        width: 32px; height: 32px; background: #3b82f6; border-radius: 8px; 
        display: flex; align-items: center; justify-content: center; color: white; font-size: 0.9rem;
    }
    .footer-logo .logo-text { font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 800; color: white; }
    .footer-logo .dot { color: #3b82f6; }

    .brand-description { font-size: 1rem; line-height: 1.7; margin-bottom: 2.5rem; color: #64748b; }
    
    .social-pills { display: flex; gap: 1rem; }
    .social-pill {
        width: 40px; height: 40px; border-radius: 12px; background: rgba(255,255,255,0.03);
        border: 1px solid rgba(255,255,255,0.05); display: flex; align-items: center; justify-content: center;
        color: #94a3b8; transition: all 0.3s;
    }
    .social-pill:hover { background: #3b82f6; color: white; transform: translateY(-3px); border-color: #3b82f6; }

    .footer-links-grid { flex: 2; display: grid; grid-template-columns: repeat(3, 1fr); gap: 3rem; }
    .footer-col h5 { color: white; font-size: 1.1rem; font-weight: 700; margin-bottom: 1.5rem; font-family: 'Outfit', sans-serif; }
    .footer-col ul { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 1rem; }
    .footer-col ul li a { color: #64748b; text-decoration: none; font-size: 0.95rem; font-weight: 600; transition: all 0.2s; }
    .footer-col ul li a:hover { color: white; padding-left: 5px; }

    .footer-bottom-bar {
        padding-top: 3rem; border-top: 1px solid rgba(255,255,255,0.05);
        display: flex; justify-content: space-between; align-items: center; font-size: 0.9rem;
    }
    .text-danger { color: #ef4444; }
    .footer-badges { display: flex; align-items: center; gap: 2rem; }
    .footer-badge-img { height: 20px; filter: grayscale(1) brightness(2); opacity: 0.5; }
    .secure-tag { color: #475569; font-weight: 700; display: flex; align-items: center; gap: 0.5rem; }

    @media (max-width: 1024px) {
        .footer-grid { flex-direction: column; gap: 4rem; }
        .footer-brand-col { max-width: 100%; }
        .footer-links-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px) {
        .footer-links-grid { grid-template-columns: 1fr; }
        .footer-bottom-bar { flex-direction: column; gap: 2rem; text-align: center; }
    }
</style>