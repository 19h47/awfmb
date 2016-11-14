// BROWSERIFY

var gulp = require('gulp');
var browserify = require('gulp-browserify');
var gutil = require('gulp-util');
var rename = require('gulp-rename');
var source = require('vinyl-source-stream');
var config = require('../config' ).browserify;


gulp.task('browserify', function() {
    var production = gutil.env.type === 'production';

    gulp.src('src/js/app.js', {read: false})
    // Browserify, and add source maps if this isn't a production build
        .pipe(browserify({
            debug: !production
        }))

        // Rename the destination file
        .pipe(rename(config.file))

        // Output to the build directory
        .pipe(gulp.dest(config.dest));
});