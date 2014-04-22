var gulp    = require('gulp');
var watch   = require('gulp-watch');
var bower   = require('gulp-bower');
var sass    = require('gulp-sass');
var coffee  = require('gulp-coffee');

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

gulp.task('sass', function() {
  gulp.src('./assets/src/css/*.scss')
      .pipe(sass())
      .pipe(gulp.dest('./assets/dist/css'));
});

gulp.task('coffee', function() {
  gulp.src('./assets/src/jsc/*.coffee')
      .pipe(coffee({ bare: true }))
      .pipe(gulp.dest('./assets/dist/jsc'));
});
