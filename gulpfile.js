require('es6-promise').polyfill();

var gulp          = require('gulp'),
    sass          = require('gulp-sass'),
    postcss       = require('gulp-postcss'),
    autoprefixer  = require('autoprefixer'),
    cssnano       = require('cssnano'),
    plumber       = require('gulp-plumber'),
    gutil         = require('gulp-util'),
    notify        = require('gulp-notify'),
    rename        = require('gulp-rename'),
    concat        = require('gulp-concat'),
    jshint        = require('gulp-jshint'),
    stylish       = require('jshint-stylish');
    uglify        = require('gulp-uglify'),
    imagemin      = require('gulp-imagemin'),
    gulpCopy      = require('gulp-copy'),
    merge         = require('gulp-merge'),
    mmq           = require('gulp-merge-media-queries'),
    browserSync   = require('browser-sync').create(),
    reload        = browserSync.reload;

// Sass
gulp.task('sass', function() {
  return gulp.src('./assets/src/sass/main.scss')
  .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
  .pipe(sass({
    includePaths: [
      './node_modules/bootstrap/scss/',
    ],
  }))
  .pipe(mmq())
  .pipe(postcss([
    autoprefixer({
      browsers: ['last 2 versions']
    }),
    cssnano()
  ]))
  .pipe(gulp.dest('./assets/css/'))
  .pipe(browserSync.reload({
        stream:true
    }));
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
  .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
  .pipe(imagemin({ optimizationLevel: 7, progressive: true }))
  .pipe(gulp.dest('./assets/dist/img'));
});

// Copy
gulp.task('copy', function() {
  var modernizr = gulp.src('./assets/src/js/plugins/modernizr-3.0.0.min.js')
    .pipe(gulp.dest('./assets/dist/vendor'));
  var fontawesome = gulp.src('./node_modules/@fortawesome/fontawesome-pro/**/*')
    .pipe(gulp.dest('./assets/dist/vendor/fontawesome-pro'));
  var swiper = gulp.src('./node_modules/swiper/dist/**/*')
    .pipe(gulp.dest('./assets/dist/vendor/swiper'));
  var bootstrap = gulp.src('./node_modules/bootstrap/dist/**/*')
    .pipe(gulp.dest('./assets/dist/vendor/bootstrap'));
  var scrollmagic = gulp.src('./node_modules/scrollmagic/scrollmagic/minified/**/*')
    .pipe(gulp.dest('./assets/dist/vendor/scrollmagic'));
  return merge(modernizr, fontawesome, swiper, bootstrap, scrollmagic);
});


// Watch
gulp.task('watch', function() {
  browserSync.init({
    files: ['./**/*.php', './assets/src/js/**/*.js'],
    proxy: 'http://local.gulptest.com/',
    tunnel: 'mylocaltest',
  });
  gulp.watch('./assets/src/sass/**/*.scss', ['sass']);
  // gulp.watch(['./assets/src/js/**/*.js'], ['js', 'js-main', reload]);
  gulp.watch('./assets/src/img/*', ['images', reload]);
});

gulp.task('default', ['sass', 'js', 'js-main', 'images', 'copy', 'watch']);