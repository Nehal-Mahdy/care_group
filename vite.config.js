import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                 "./node_modules/flowbite/**/*.js"
            ],
            refresh: true,
        }),
        
    ],
    server: {
        host: 'localhost',
        port: 5173,
        hmr: {
            protocol: 'ws',
            host: 'localhost',
        },
    }
});
