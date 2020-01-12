const gulp = require('gulp'),
      sass = require('gulp-sass'),
      ejs = require('gulp-ejs'),
      moveToDirectoryIndex = require('gulp-move-to-directory-indexes'),
      imagemin = require('gulp-imagemin'),
      connect = require('gulp-connect'),
      runSequence = require('run-sequence'),
      sitemap = require('gulp-sitemap')

gulp.task('sass', function () {
  return gulp.src('src/styles/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('build/styles'))
})

gulp.task('scripts', function() {  
  return gulp.src('src/js/**/*.js')
    .pipe(gulp.dest('build/scripts'))
})

gulp.task('ejs',function(){  
  return gulp.src([ 'src/views/**/*.ejs',
                    '!src/views/partials/**/*.ejs'])
    .pipe(ejs({},{}, {ext:'.html'}))
    .pipe(moveToDirectoryIndex())
    .pipe(gulp.dest('build/'))
})

gulp.task('images',function(){  
  return gulp.src('src/images/**/*.*')
    .pipe(gulp.dest('build/images/'))
})

gulp.task('images-minified',function(){  
  return gulp.src('src/images/**/*.*')
    .pipe(imagemin())
    .pipe(gulp.dest('build/images/'))
})

gulp.task('webfonts', function () {
  return gulp.src('src/webfonts/*')
    .pipe(gulp.dest('build/styles/webfonts'))
})

gulp.task('serve', function() {
  connect.server({
    root: 'build',
    livereload: true
  })
})

gulp.task('livereload', function () {
  gulp.src('build/*.html')
    .pipe(gulp.dest('build/'))
    .pipe(connect.reload());
})

gulp.task('sitemap', function () {
  gulp.src('build/**/*.html', {
          read: false
      })
      .pipe(sitemap({
          siteUrl: 'https://munindata.com'
      }))
      .pipe(gulp.dest('./build'))
})

gulp.task('watch', function() {  
    gulp.watch('src/styles/**/*.scss', ['sass'])
    gulp.watch('src/js/**/*.js', ['scripts'])
    gulp.watch('src/views/**/*.ejs', ['ejs'])
    gulp.watch('src/images/**/*.*', ['images'])
    gulp.watch('src/webfonts/**/*.*', ['webfonts'])
    gulp.watch('src/videos/**/*.*', ['videos'])
    gulp.watch(['build/**'], ['livereload']);
})

gulp.task('build', ['sass', 'scripts', 'ejs', 'images', 'webfonts'])

gulp.task('deploy', ['ejs', 'sass', 'scripts', 'images-minified', 'webfonts'], function (cb) {
  runSequence(['sitemap'], cb);
})

gulp.task('default', ['build', 'serve', 'watch'])