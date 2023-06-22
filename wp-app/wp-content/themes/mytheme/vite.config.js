const { defineConfig } = require('vite')
const { resolve } = require('path')

module.exports = defineConfig({
  root: './',
  base: '',
  build: {
    emptyOutDir: true,
    outDir: 'dist',
    assetsDir: '',
    rollupOptions: {
      input: resolve(__dirname, './style.css'),
    },
    manifest: true,
  },
  server: {
    open: false,
    host: true
  }
})