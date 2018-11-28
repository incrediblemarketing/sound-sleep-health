require('es6-promise').polyfill();

var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    rtlcss        = require('gulp-rtlcss'),
    autoprefixer  = require('gulp-autoprefixer'),
    plumber       = require('gulp-plumber'),
    gutil         = require('gulp-util'),
    rename        = require('gulp-rename'),
    concat        = require('gulp-concat'),
    jshint        = require('gulp-jshint'),
    stylish       = require('jshint-stylish');
    uglify        = require('gulp-uglify'),
    imagemin      = require('gulp-imagemin'),
    gulpCopy      = require('gulp-copy'),
    mmq           = require('gulp-merge-media-queries'),
    browserSync   = require('browser-sync').create(),
    reload        = browserSync.reload;

var onError = function( err ) {
  console.log('An error occurred:', gutil.colors.magenta(err.message));
  gutil.beep();
  this.emit('end');
};

// Sass
gulp.task('sass', function() {
  return gulp.src('./assets/src/sass/main.scss')
  .pipe(plumber({ errorHandler: onError }))
  .pipe(sass())

  .pipe(autoprefixer())
  .pipe(mmq())
  .pipe(gulp.dest('./assets/dist/css/'))

  .pipe(rtlcss())                     // Convert to RTL
  .pipe(rename({ basename: 'rtl' }))  // Rename to rtl.css
  .pipe(gulp.dest('./'));             // Output RTL stylesheets (rtl.css)
});

// JavaScript Plugins
gulp.task('js', function() {
  return gulp.src(['./assets/src/js/plugins/*.js', '!./assets/src/js/plugins/modernizr-3.0.0.min.js'])
  .pipe(jshint())
  .pipe(jshint.reporter(stylish))
  .pipe(concat('plugins.js'))
  .pipe(gulp.dest('./assets/dist/js'))
  .pipe(rename({suffix: '.min'}))
  .pipe(uglify())
  .pipe(gulp.dest('./assets/dist/js'));
});

// JavaScript Main
gulp.task('js-main', function() {
  return gulp.src(['./assets/src/js/main.js'])
  .pipe(jshint())
  .pipe(jshint.reporter(stylish))
  .pipe(concat('main.js'))
  .pipe(gulp.dest('./assets/dist/js'))
  .pipe(rename({suffix: '.min'}))
  .pipe(uglify())
  .pipe(gulp.dest('./assets/dist/js'));
});

// Images
gulp.task('images', function() {
  return gulp.src('./assets/src/img/*')
  .pipe(plumber({ errorHandler: onError }))
  .pipe(imagemin({ optimizationLevel: 7, progressive: true }))
  .pipe(gulp.dest('./assets/dist/img'));
});

// Copy
gulp.task('copy', function() {
  return gulp.src('./assets/src/js/plugins/modernizr-3.0.0.min.js')
  .pipe(gulp.dest('./assets/dist/js/vendor'));

});


// Watch
gulp.task('watch', function() {
  browserSync.init({
    files: ['./**/*.php'],
    proxy: 'http://local.gulptest.com/',
    tunnel: 'mylocaltest',
  });
  gulp.watch('./assets/src/sass/**/*.scss', ['sass', reload]);
  gulp.watch(['./assets/src/js/**/*.js'], ['js', 'js-main', reload]);
  gulp.watch('./assets/src/img/*', ['images', reload]);
});

gulp.task('default', ['sass', 'js', 'js-main', 'images', 'copy', 'watch']);