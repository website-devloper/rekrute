@extends('template')

@section('content')
    <section class="contact-hero" style="background: var(--gray-900); padding: 5rem 0; position: relative; overflow: hidden;">
        <!-- Background Glow -->
        <div style="position: absolute; top: -50%; right: -20%; width: 800px; height: 800px; background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, rgba(0,0,0,0) 70%); border-radius: 50%;"></div>
        
        <div class="container" style="position: relative; z-index: 1; text-align: center;">
            <h1 style="color: white; font-size: 3.5rem; font-weight: 800; margin-bottom: 1.5rem;">Get in Touch</h1>
            <p style="color: var(--gray-400); font-size: 1.25rem; max-width: 600px; margin: 0 auto;">
                Have a question or just want to say hi? We'd love to hear from you.
            </p>
        </div>
    </section>

    <section class="contact-form-section" style="padding: 5rem 0; background: var(--gray-50); margin-top: -3rem;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div style="background: white; border-radius: 1.5rem; padding: 3rem; box-shadow: var(--shadow-xl);">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label style="display: block; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">First Name</label>
                                    <input type="text" class="form-control" style="width: 100%; padding: 0.75rem; border-radius: 0.5rem; border: 1px solid var(--gray-300);" placeholder="John">
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label style="display: block; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">Last Name</label>
                                    <input type="text" class="form-control" style="width: 100%; padding: 0.75rem; border-radius: 0.5rem; border: 1px solid var(--gray-300);" placeholder="Doe">
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <label style="display: block; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">Email Address</label>
                                <input type="email" class="form-control" style="width: 100%; padding: 0.75rem; border-radius: 0.5rem; border: 1px solid var(--gray-300);" placeholder="john@example.com">
                            </div>

                            <div class="mb-4">
                                <label style="display: block; font-weight: 600; color: var(--gray-700); margin-bottom: 0.5rem;">Message</label>
                                <textarea class="form-control" rows="5" style="width: 100%; padding: 0.75rem; border-radius: 0.5rem; border: 1px solid var(--gray-300);" placeholder="How can we help you?"></textarea>
                            </div>

                            <button type="submit" class="newsletter-btn" style="width: 100%; justify-content: center;">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5 text-center">
                <div class="col-md-4">
                    <div style="padding: 1.5rem;">
                        <h4 style="font-weight: 700; margin-bottom: 0.5rem;">Email Us</h4>
                        <p style="color: var(--primary-600);">support@rekrute.com</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="padding: 1.5rem;">
                        <h4 style="font-weight: 700; margin-bottom: 0.5rem;">Call Us</h4>
                        <p style="color: var(--primary-600);">+1 (555) 123-4567</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div style="padding: 1.5rem;">
                        <h4 style="font-weight: 700; margin-bottom: 0.5rem;">Visit Us</h4>
                        <p style="color: var(--primary-600);">123 Innovation Dr, Tech City</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
