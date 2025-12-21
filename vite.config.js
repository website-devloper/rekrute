import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/find_job.css',
                'resources/css/home-modern.css',
                'resources/css/index.css',
                'resources/css/recruter.css',
                'resources/css/style-forgot.css',
                'resources/css/style-login.css',
                'resources/css/style-signup.css'
            ],
            refresh: true,
        }),
    ],
});
