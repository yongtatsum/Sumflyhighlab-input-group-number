let mix = require('laravel-mix')

require('./nova.mix')

mix
  .setPublicPath('dist')
  .js('resources/js/field.js', 'js')
  .vue({ version: 3 })
  .webpackConfig({
    // stats: { children: true },
    externals: {
      vue: 'Vue',
      'laravel-nova': 'LaravelNova',
    },
    output: {
      uniqueName: 'sumflyhighlab/text-combine-number',
    },
  })
