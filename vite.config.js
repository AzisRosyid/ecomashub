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
                'resources/js/user.js',
                'resources/js/eco-chat.js',
                'resources/js/admin-dashboard.js',
                'resources/js/user-dashboard.js',
                'resources/js/chart.umd.js',
                'resources/js/script.js',
                'resources/js/firebase.js'
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
