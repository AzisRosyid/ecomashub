import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/home.js',
                'resources/js/auth.js',
                'resources/js/admin.js',
                'resources/js/dashboard.js',
                'resources/js/chart.js',
                'resources/js/chart.umd.js',
                'resources/js/calendar.js',
                'resources/js/script.js',
            ],
            refresh: true,
        }),
    ],
    // resolve: {
    //     alias: [{
    //         find: '../font',
    //         replacement: path.resolve(__dirname, 'resources/fonts'),
    //     }],
    // },
});
