import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/changeHours.js',
                'resources/js/createEmployee.js',
                'resources/js/createExamination.js',
                'resources/js/createVisit.js',
            ],
            refresh: true,
        }),
    ],
});
