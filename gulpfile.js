// Require packages
var gulp = require('gulp');
    babelMinify = require('gulp-babel-minify');
    minifyCSS = require('gulp-minify-css'),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync'),
    runSequence = require('run-sequence'),
    pump = require('pump'),
    rename = require('gulp-rename'),
    sassGlob = require('gulp-sass-glob');


var paths = {
    templates: './*.php',
    css: '*.css',
    js: './library/src/js/functions.js',
    scss: './library/src/scss/**/*.scss'
};

// Start browserSync server stuffs
gulp.task('browserSync', function() {
    browserSync.init({
       proxy: 'http://local.annacantrell:8888/'
    })
});

// Do Template things
gulp.task('templates', function() {
    return gulp.src(paths.templates)
    .pipe(browserSync.reload({
        stream:true
    }));
});


// Do SCSS things
gulp.task('styles', function(){
    return gulp.src(paths.scss)
    .pipe(sassGlob())
    .pipe(sass())
    .pipe(minifyCSS())
    .pipe(gulp.dest('./'))
    .pipe(browserSync.reload({
        stream:true
    }));
});

// Do JS things
gulp.task('js', function() {
	return gulp.src(paths.js)
		.pipe(babelMinify())
		.pipe(rename({ suffix: '.min' }))
		.pipe(gulp.dest('./library/js'))
		.pipe(browserSync.reload({
        stream:true
    }));
});

//Watch things
gulp.task('watch', ['browserSync'], function() {
    gulp.watch(paths.templates, ['templates']);
    gulp.watch(paths.scss, ['styles']);
    gulp.watch(paths.js, ['js']);
});

// Starts gulp
gulp.task('default', function (callback) {
    runSequence(['styles', 'templates', 'js', 'browserSync', 'watch'], callback);
});
