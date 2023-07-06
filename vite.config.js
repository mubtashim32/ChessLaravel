import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/home.css',
                'resources/js/app.js',
                'resources/js/liveGame.js',
                'resources/js/reviewGame.js',
                'resources/js/editProfile.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
            port: 8080,
        },
    },
});
