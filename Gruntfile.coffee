module.exports = (grunt) ->

  grunt.initConfig
    pkg: grunt.file.readJSON('package.json')

    globalConfig:
      root: ''
      css:  'assets/css'

    sass:
      options:
        sourcemap: true
        precision: 7
        noCache: true
      build:
        files:
          'assets/css/style.css': 'assets/css/style.scss'

    autoprefixer:
      options:
        browsers: ['last 2 version', 'ie 9', '> 1%']
      build:
        files:
          'assets/css/style.css': 'assets/css/style.css'

    watch:
      options:
        livereload: true
      css:
        files: ['**/*.scss']
        tasks: 'css'

  # !Load Tasks
  require("load-grunt-tasks") grunt

  grunt.registerTask 'css', [
    'sass'
    'autoprefixer'
  ]

  grunt.registerTask 'default', [
    'css'
    'watch'
  ]