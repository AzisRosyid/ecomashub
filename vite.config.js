import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/home.js',
                'resources/js/login.js',
                'resources/js/admin.js',
                'resources/js/anggota.js',
                'resources/js/dashboard.js',
                'resources/js/tambah-kegiatan.js'
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
