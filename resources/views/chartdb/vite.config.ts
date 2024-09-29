import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import path, { resolve } from 'path';

// https://vitejs.dev/config/
export default defineConfig({
    plugins: [react()],
    define: {
        'process.env': {},
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './src'),
        },
    },
    build: {
        rollupOptions: {
            output: {
                inlineDynamicImports: false,
                format: 'iife',
                manualChunks: () => {
                    return '';
                },
                entryFileNames: `assets/[name].js`,
                chunkFileNames: `assets/[name].js`,
            },
        },
        lib: {
            entry: resolve(__dirname, 'src/main.tsx'),
            name: 'chartdb',
            fileName: (format) => `chartdb.${format}.js`,
        },
        outDir: '../../../public',
    },
});
