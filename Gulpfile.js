var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssnano = require('gulp-cssnano'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    concat = require('gulp-concat'),
    rev = require('gulp-rev'),
    del = require('del');

var config = require('./gulp-config.json');

gulp.task('vendorscripts', function(){
    return gulp.src(config.paths.vendorjs)
        .pipe(concat('vendor.js'))
        .pipe(gulp.dest('./assets/js/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js/'));
});

gulp.task('scripts', function() {
    return gulp.src('src/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(concat('main.js'))
        .pipe(gulp.dest('./assets/js/'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js/'));
});

gulp.task('styles', function() {
    return gulp.src('src/sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./assets/css/'))
        .pipe(rev())
        .pipe(rename({ suffix: '.min' }))
        .pipe(cssnano())
        .pipe(gulp.dest('./assets/css/'))
        .pipe(rev.manifest())
        .pipe(gulp.dest('./assets/'));
});

gulp.task('fonts', function() {
    return gulp.src('src/fonts/**/*.ttf')
        .pipe(gulp.dest('./assets/fonts/'));
});

gulp.task('watch', function() {
    gulp.watch('src/sass/**/*.scss', ['styles']);
    gulp.watch('src/js/**/*.js', ['scripts']);
});

// Clean
gulp.task('clean', function() {
    return del(['./assets/css', './assets/js']);
});


// Default task
gulp.task('default', ['clean'], function() {
    gulp.start('styles', 'scripts', 'vendorscripts');
});