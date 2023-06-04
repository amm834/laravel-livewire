import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/pages.css', 'resources/js/pages.js'],
            refresh: true,
        }),
    ],
});
