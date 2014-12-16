
var gulp    = require('gulp'),
  less      = require('gulp-less'),
  uglify    = require('gulp-uglify'),
  wrap      = require('gulp-wrap'),
  shell     = require('gulp-shell'),
  connect   = require('gulp-connect'),
  jade      = require('gulp-jade'),
  debug     = require('gulp-debug'),
  clean     = require('gulp-clean'),
  rename    = require('gulp-rename'),
  watch     = require('gulp-watch');

var LIVERELOAD_PORT = 35729;

var lr;
function startLivereload() {

  lr = require('tiny-lr')();
  lr.listen(LIVERELOAD_PORT);
}

// Notifies livereload of changes detected
// by `gulp.watch()`
function notifyLivereload(event) {

  // `gulp.watch()` events provide an absolute path
  // so we need to make it relative to the server root
  var fileName = require('path').relative(__dirname, event.path);

  lr.changed({
    body: {
      files: [fileName]
    }
  });
}

var paths = {
  js: 'public/assets/js/**/*.*',
  fonts: 'public/assets/fonts/**.*',
  images: 'public/assets/img/**/*.*',
  styles: ['public/assets/less/dashboard/dashboard.less', 'public/assets/lib/font-awesome/less/font-awesome.less', 'public/assets/lib/bootstrap/less/bootstrap.less'],
  views: 'app/views/**/*.php',
  bower_fonts: 'public/assets/lib/**/*.{ttf,woff,eof,svg}',
};


/**
 * assets
 */
gulp.task('assets', ['less', 'copy-fonts']);

gulp.task('less', function (){
  gulp.src(paths.styles)
    .pipe(less())
    .pipe(gulp.dest('public/assets/css'));
});

gulp.task('copy-fonts', function (){
  return gulp.src(paths.bower_fonts)
    .pipe(rename({
      dirname: 'fonts'
    }))
    .pipe(gulp.dest('public/assets'))
});

/**
 * Watch src
 */
gulp.task('watch', ['livereload'], function () {
  gulp.watch(['public/assets/less/**/*.less'], ['assets']);
});

gulp.task('livereload', ['build'], function() {

  startLivereload();
  gulp.watch([
    paths.js,
    'public/assets/css/**/*.*',
    paths.views
  ], notifyLivereload);

});

/**
 * Limpiar proyecto
 */

 gulp.task('clean', function () {
     return gulp.src(['public/assets'], {read: false})
         .pipe(clean());
 });


gulp.task('build', ['assets']);
gulp.task('default', ['build', 'livereload', 'watch']);
