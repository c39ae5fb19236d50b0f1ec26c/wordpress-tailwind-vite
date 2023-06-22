module.exports = {
    plugins: [
      require('tailwindcss'),
      require('autoprefixer'),
      process.env.NODE_ENV === 'production' && require('cssnano')({
        preset: 'default',
      }),
      process.env.NODE_ENV === 'production' && require('@fullhuman/postcss-purgecss')({
        content: [
          './**/*.php',
        ],
        defaultExtractor: (content) => content.match(/[\w-/:]+(?<!:)/g) || [],
      }),
    ],
  };
  