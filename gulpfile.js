/*
|--------------------------------------------------------------------------
| Include dependencies
|--------------------------------------------------------------------------
*/

var autoprefixer = require('gulp-autoprefixer');
var gulp = require('gulp')
var include = require('gulp-include');
var livereload = require('gulp-livereload');
var notify = require('gulp-notify');
var rename = require('gulp-rename');
var sass = require('gulp-ruby-sass');
var uglify = require('gulp-uglify');
var plumber = require('gulp-plumber');


/*
|--------------------------------------------------------------------------
| Convert SASS to CSS
|--------------------------------------------------------------------------
*/

gulp.task('css', function () {
    return gulp.src('public/sass/all.scss')
               .pipe(plumber({errorHandler: notify.onError('<%= error.message %>')}))
               .pipe(sass({ style: 'compressed' }))
               .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
               .pipe(gulp.dest('public/css'))
               .pipe(livereload({ auto: false }))
               .pipe(notify({ message: 'Compiled CSS (<%=file.relative%>)' }));
});


/*
|--------------------------------------------------------------------------
| Minify JavaScript
|--------------------------------------------------------------------------
*/

gulp.task('js', function() {
    return gulp.src('public/js/all.js')
               .pipe(include())
               .pipe(uglify())
               .pipe(rename('all.min.js'))
               .pipe(gulp.dest('public/js'))
               .pipe(notify({ message: 'Minified JS (<%=file.relative%>)' }));
});

/*
|--------------------------------------------------------------------------
| Build respond.js
|--------------------------------------------------------------------------
*/

gulp.task('respond', function(){
    return gulp.src('public/vendor/bower_components/respond/dest/respond.min.js')
               .pipe(gulp.dest('public/vendor/respond/'))
               .pipe(notify({ message: 'Built respond.js from bower.' }));
});

/*
|--------------------------------------------------------------------------
| Setup watcher and LiveReload
|--------------------------------------------------------------------------
*/

gulp.task('default', function () {

    // Watch .scss files
    gulp.watch('public/sass/**/*.scss', ['css']);

    // Watch .js files
    gulp.watch('public/js/*.js', ['js']);

    // Create LiveReload server
    var server = livereload();
    livereload.listen();

    // Reload on view change
    gulp.watch(['app/views/**']).on('change', function (file) {
        server.changed(file.path);
    });
});