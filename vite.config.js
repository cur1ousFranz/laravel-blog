import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js', 'resources/css/code-snippet.css', 'resources/css/app.css'],
            refresh: true,
        }),
    ],
});
