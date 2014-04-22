var gulp    = require('gulp'),
    watch   = require('gulp-watch'),
    bower   = require('gulp-bower'),
    include = require('gulp-include'),
    sass    = require('gulp-sass'),
    coffee  = require('gulp-coffee');

gulp.task('default', function() {
  gulp.src('./assets/src/css/*.scss')
      .pipe(watch(function(files) {
        return files.pipe(sass())
          .pipe(gulp.dest('./assets/dist/css'));
      }));

  gulp.src('./assets/src/jsc/*.coffee')
      .pipe(watch(function(files) {
        return files.pipe(coffee({ bare: true }))
          .pipe(gulp.dest('./assets/dist/jsc'));
      }));
});

gulp.task('bower', function() {
  bower()
});

gulp.task('all', function() {
  gulp.src('./assets/src/css/*.scss')
      .pipe(sass())
      .pipe(gulp.dest('./assets/dist/css'));

  gulp.src('./assets/src/jsc/*.coffee')
      .pipe(include())
      .pipe(coffee({ bare: true }))
      .pipe(gulp.dest('./assets/dist/jsc'));
});

gulp.task('sass', function() {
  gulp.src('./assets/src/css/*.scss')
      .pipe(sass())
      .pipe(gulp.dest('./assets/dist/css'));
});

gulp.task('coffee', function() {
  gulp.src('./assets/src/jsc/*.coffee')
      .pipe(include())
      .pipe(coffee({ bare: true }))
      .pipe(gulp.dest('./assets/dist/jsc'));
});
