import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import laravel from 'laravel-vite-plugin'
import path from 'path'

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/js/app.js',
              'resources/css/usuario-detalle.css',
              'resources/js/usuario-detalle.js',




      ],  // entrada del frontend
      refresh: true
    }),
    vue()
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources')
    }
  }
})
