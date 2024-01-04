import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/plugins/addressApi.js',
                'resources/js/patientSchedule/index.js',
            ],
            refresh: true,
        }),
    ],
});
