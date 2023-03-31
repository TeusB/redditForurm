// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'


export default defineConfig({
    plugins: [
        vue(),
        Unfonts({
            custom: {
                families: [
                    {
                        name: "Agrandir",
                        src: "./src/assets/fonts/*.otf",
                    },
                ],
            },
        }),
        laravel(["resources/css/app.css", "resources/js/app.js"]),
    ],
});