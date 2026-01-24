<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekrify - Modern Job Portal</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Modern Design System -->
    @vite(['resources/css/app-modern.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Page Loader -->
    <div class="page-loader" id="pageLoader">
        <div class="loader-spinner"></div>
    </div>

    <x-navbar />
    
    <div class="container" style="margin-top: 2rem;">
        @if(session('success'))
            <div class="card" style="border-left: 4px solid var(--success); padding: 1rem; margin-bottom: 2rem;">
                <div class="flex items-center gap-2 text-success">
                    <i class="fas fa-check-circle"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="card" style="border-left: 4px solid var(--danger); padding: 1rem; margin-bottom: 2rem;">
                <div class="flex items-center gap-2 text-danger">
                    <i class="fas fa-exclamation-circle"></i>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @if($errors->any())
            <div class="card" style="border-left: 4px solid var(--danger); padding: 1rem; margin-bottom: 2rem;">
                <div class="flex flex-col gap-2 text-danger">
                    @foreach($errors->all() as $error)
                        <div class="flex items-center gap-2">
                            <i class="fas fa-times-circle"></i>
                            <span>{{ $error }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <main id="main-content">
        @yield('content')
    </main>

    <x-footer />

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Hide Loader
            const loader = document.getElementById('pageLoader');
            if (loader) {
                setTimeout(() => loader.classList.add('hidden'), 300);
            }
            // Init Animations
            AOS.init({ duration: 600, once: true, offset: 30 });
        });
    </script>
</body>
</html>