import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            external: [
                'tinymce',
                'tinymce/themes/silver',
                'tinymce/icons/default',
                'tinymce/plugins/advlist',
                'tinymce/plugins/autolink',
                'tinymce/plugins/lists',
                'tinymce/plugins/link',
                'tinymce/plugins/image',
                'tinymce/plugins/charmap',
                'tinymce/plugins/print',
                'tinymce/plugins/preview',
                'tinymce/plugins/hr',
                'tinymce/plugins/anchor',
                'tinymce/plugins/pagebreak',
                'tinymce/plugins/paste',
                'tinymce/plugins/searchreplace',
                'tinymce/plugins/code',
                'tinymce/plugins/fullscreen',
                'tinymce/plugins/insertdatetime',
                'tinymce/plugins/media',
                'tinymce/plugins/table',
                'tinymce/plugins/code'
            ]
        }
    },
    resolve: {
        alias: {
            '@': '/resources',
        },
    },
});
