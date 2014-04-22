var gulp  = require('gulp');
var bower = require('gulp-bower');
var sass  = require('gulp-sass');

gulp.task('default', function() {

});

gulp.task('bower', function() {
  bower()
});

gulp.task('sass', function() {
  gulp.src('./assets/css/*.scss')
      .pipe(sass())
      .pipe(gulp.dest('./assets/css'))
});
