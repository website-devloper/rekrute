@extends('template')

@section('content')
    <!-- Premium Contact Hero -->
    <section class="contact-hero">
        <div class="hero-bg-effects">
            <div class="hero-gradient-1"></div>
            <div class="hero-gradient-2"></div>
            <div class="grid-pattern"></div>
        </div>
        
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <span class="hero-badge">
                    <i class="fas fa-headset"></i>
                    We're Here to Help
                </span>
                <h1 class="hero-title">Get in Touch</h1>
                <p class="hero-subtitle">
                    Have a question or just want to say hi? We'd love to hear from you.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="contact-info-section">
        <div class="container">
            <div class="contact-cards-grid" data-aos="fade-up" data-aos-delay="100">
                <div class="contact-info-card">
                    <div class="card-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                    <p>We'll respond within 24 hours</p>
                    <a href="mailto:support@rekrute.com" class="contact-link">support@rekrute.com</a>
                </div>
                
                <div class="contact-info-card">
                    <div class="card-icon purple">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p>Mon-Fri from 9am to 6pm</p>
                    <a href="tel:+15551234567" class="contact-link">+1 (555) 123-4567</a>
                </div>
                
                <div class="contact-info-card">
                    <div class="card-icon green">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>Visit Us</h3>
                    <p>Come say hello at our HQ</p>
                    <span class="contact-link">123 Innovation Drive, Tech City</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="contact-layout">
                <!-- Form Side -->
                <div class="form-wrapper" data-aos="fade-right">
                    <div class="form-card">
                        <div class="form-header">
                            <h2>Send us a Message</h2>
                            <p>Fill out the form below and we'll get back to you as soon as possible.</p>
                        </div>
                        
                        <form class="premium-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <div class="input-wrapper">
                                        <i class="fas fa-user"></i>
                                        <input type="text" id="firstName" placeholder="John" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <div class="input-wrapper">
                                        <i class="fas fa-user"></i>
                                        <input type="text" id="lastName" placeholder="Doe" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" id="email" placeholder="john@example.com" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-tag"></i>
                                    <select id="subject">
                                        <option value="">Select a topic</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="support">Technical Support</option>
                                        <option value="billing">Billing Question</option>
                                        <option value="partnership">Partnership</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea id="message" rows="5" placeholder="How can we help you?" required></textarea>
                            </div>

                            <button type="submit" class="btn-submit">
                                <span>Send Message</span>
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Info Side -->
                <div class="info-wrapper" data-aos="fade-left">
                    <!-- FAQ Section -->
                    <div class="faq-card">
                        <h3><i class="fas fa-question-circle"></i> Frequently Asked Questions</h3>
                        
                        <div class="faq-list">
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How do I create an account?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>Click on "Get Started" in the navigation bar, fill in your details, and verify your email to create your free account.</p>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>Is Rekrute free to use?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>Yes! Job seekers can use Rekrute completely free. Employers have various pricing plans for posting jobs.</p>
                                </div>
                            </div>
                            
                            <div class="faq-item">
                                <button class="faq-question">
                                    <span>How can I post a job?</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                                <div class="faq-answer">
                                    <p>Sign up as an employer, verify your company, and you can start posting jobs from your dashboard.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="social-card">
                        <h3>Connect With Us</h3>
                        <p>Follow us on social media for the latest updates and job opportunities.</p>
                        <div class="social-grid">
                            <a href="#" class="social-btn facebook">
                                <i class="fab fa-facebook-f"></i>
                                <span>Facebook</span>
                            </a>
                            <a href="#" class="social-btn twitter">
                                <i class="fab fa-twitter"></i>
                                <span>Twitter</span>
                            </a>
                            <a href="#" class="social-btn linkedin">
                                <i class="fab fa-linkedin-in"></i>
                                <span>LinkedIn</span>
                            </a>
                            <a href="#" class="social-btn instagram">
                                <i class="fab fa-instagram"></i>
                                <span>Instagram</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section" data-aos="fade-up">
        <div class="container">
            <div class="map-wrapper">
                <div class="map-placeholder">
                    <i class="fas fa-map-marked-alt"></i>
                    <p>Interactive map would appear here</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Hero Section */
        .contact-hero {
            background: var(--gray-900);
            padding: 10rem 0 8rem;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .hero-bg-effects {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .hero-gradient-1 {
            position: absolute;
            top: -50%;
            right: -20%;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.2) 0%, transparent 60%);
        }

        .hero-gradient-2 {
            position: absolute;
            bottom: -30%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.15) 0%, transparent 60%);
        }

        .grid-pattern {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(99, 102, 241, 0.15);
            color: var(--primary-light);
            padding: 0.625rem 1.25rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(99, 102, 241, 0.2);
        }

        .hero-title {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 800;
            color: white;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--gray-400);
            max-width: 500px;
            margin: 0 auto;
        }

        /* Contact Info Cards */
        .contact-info-section {
            margin-top: -4rem;
            position: relative;
            z-index: 10;
            padding-bottom: 4rem;
        }

        .contact-cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
        }

        .contact-info-card {
            background: white;
            border-radius: 1.25rem;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 20px 50px -10px rgba(0, 0, 0, 0.12);
            border: 1px solid var(--gray-100);
            transition: all 0.3s ease;
        }

        .contact-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 60px -10px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.25rem;
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        }

        .card-icon.purple {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
        }

        .card-icon.green {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
        }

        .card-icon i {
            color: white;
            font-size: 1.5rem;
        }

        .contact-info-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.375rem;
        }

        .contact-info-card p {
            font-size: 0.9375rem;
            color: var(--gray-500);
            margin-bottom: 0.75rem;
        }

        .contact-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: color 0.2s ease;
        }

        .contact-link:hover {
            color: var(--primary-dark);
        }

        /* Contact Form Section */
        .contact-form-section {
            padding: 4rem 0;
            background: var(--gray-50);
        }

        .contact-layout {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 2rem;
            align-items: start;
        }

        .form-card {
            background: white;
            border-radius: 1.5rem;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--gray-100);
        }

        .form-header {
            margin-bottom: 2rem;
        }

        .form-header h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: var(--gray-500);
            font-size: 1rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-group label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .form-group .input-wrapper {
            position: relative;
        }

        .form-group .input-wrapper i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            font-size: 0.875rem;
            transition: color 0.2s ease;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 2.75rem;
            border: 2px solid var(--gray-200);
            border-radius: 0.75rem;
            font-size: 1rem;
            color: var(--gray-900);
            transition: all 0.2s ease;
            background: white;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .form-group input:focus + i,
        .form-group select:focus + i {
            color: var(--primary);
        }

        .form-group textarea {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid var(--gray-200);
            border-radius: 0.75rem;
            font-size: 1rem;
            color: var(--gray-900);
            resize: vertical;
            min-height: 120px;
            font-family: inherit;
            transition: all 0.2s ease;
        }

        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .btn-submit {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.35);
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.45);
        }

        .btn-submit i {
            transition: transform 0.3s ease;
        }

        .btn-submit:hover i {
            transform: translateX(4px);
        }

        /* FAQ Card */
        .faq-card {
            background: white;
            border-radius: 1.25rem;
            padding: 1.75rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--gray-100);
            margin-bottom: 1.5rem;
        }

        .faq-card h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1.25rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .faq-card h3 i {
            color: var(--primary);
        }

        .faq-item {
            border-bottom: 1px solid var(--gray-100);
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-question {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: none;
            border: none;
            padding: 1rem 0;
            font-size: 0.9375rem;
            font-weight: 600;
            color: var(--gray-700);
            cursor: pointer;
            text-align: left;
            transition: color 0.2s ease;
        }

        .faq-question:hover {
            color: var(--primary);
        }

        .faq-question i {
            font-size: 0.75rem;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }

        .faq-item.active .faq-answer {
            max-height: 200px;
        }

        .faq-answer p {
            padding-bottom: 1rem;
            color: var(--gray-500);
            font-size: 0.9375rem;
            line-height: 1.6;
        }

        /* Social Card */
        .social-card {
            background: white;
            border-radius: 1.25rem;
            padding: 1.75rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
            border: 1px solid var(--gray-100);
        }

        .social-card h3 {
            font-size: 1.125rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .social-card p {
            color: var(--gray-500);
            font-size: 0.9375rem;
            margin-bottom: 1.25rem;
        }

        .social-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        .social-btn {
            display: flex;
            align-items: center;
            gap: 0.625rem;
            padding: 0.75rem 1rem;
            border-radius: 0.625rem;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
        }

        .social-btn.facebook {
            background: rgba(59, 89, 152, 0.1);
            color: #3b5998;
        }

        .social-btn.twitter {
            background: rgba(29, 161, 242, 0.1);
            color: #1da1f2;
        }

        .social-btn.linkedin {
            background: rgba(0, 119, 181, 0.1);
            color: #0077b5;
        }

        .social-btn.instagram {
            background: rgba(225, 48, 108, 0.1);
            color: #e1306c;
        }

        .social-btn:hover {
            transform: translateY(-2px);
        }

        .social-btn.facebook:hover {
            background: #3b5998;
            color: white;
        }

        .social-btn.twitter:hover {
            background: #1da1f2;
            color: white;
        }

        .social-btn.linkedin:hover {
            background: #0077b5;
            color: white;
        }

        .social-btn.instagram:hover {
            background: #e1306c;
            color: white;
        }

        /* Map Section */
        .map-section {
            padding: 0 0 4rem;
            background: var(--gray-50);
        }

        .map-wrapper {
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
        }

        .map-placeholder {
            height: 350px;
            background: linear-gradient(135deg, var(--gray-200), var(--gray-100));
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .map-placeholder i {
            font-size: 3rem;
            color: var(--gray-400);
        }

        .map-placeholder p {
            color: var(--gray-500);
            font-size: 1rem;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .contact-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .contact-hero {
                padding: 8rem 0 6rem;
            }

            .contact-cards-grid {
                grid-template-columns: 1fr;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .social-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                
                question.addEventListener('click', () => {
                    const isActive = item.classList.contains('active');
                    
                    // Close all items
                    faqItems.forEach(i => i.classList.remove('active'));
                    
                    // Open clicked item if it wasn't active
                    if (!isActive) {
                        item.classList.add('active');
                    }
                });
            });
        });
    </script>
@endsection
