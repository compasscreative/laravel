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
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var sass = require('gulp-ruby-sass');
var uglify = require('gulp-uglify');


/*
|--------------------------------------------------------------------------
| Convert SASS to CSS
|--------------------------------------------------------------------------
*/

gulp.task('css', function () {
    return gulp.src('public/sass/all.scss')
        .pipe(plumber())
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
        .pipe(plumber())
        .pipe(include())
        .pipe(uglify())
        .pipe(rename('all.min.js'))
        .pipe(gulp.dest('public/js'))
        .pipe(notify({ message: 'Minified JS (<%=file.relative%>)' }));
});


/*
|--------------------------------------------------------------------------
| Setup LiveReload and watcher
|--------------------------------------------------------------------------
*/

gulp.task('default', function () {

    // Create LiveReload server
    var server = livereload();
    livereload.listen();

    // Watch .scss files
    gulp.watch([
        'public/sass/*.scss',
        'public/sass/**/*.scss'
    ], function (file) {
        gulp.run('css');
    })

    // Watch .js files
    gulp.watch([
        'public/js/*.js'
    ], function (file) {
        gulp.run('js');
    })

    // Watch view files
    gulp.watch([
        'app/views/**'
    ], function (file) {
        server.changed(file.path);
    })
});