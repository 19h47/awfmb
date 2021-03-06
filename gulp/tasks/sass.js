// SASS

var gulp = require( 'gulp' );
var sass = require( 'gulp-sass' );
var nano = require( 'gulp-cssnano' );
var autoprefixer = require( 'gulp-autoprefixer' ) ;
var sourcemaps = require( 'gulp-sourcemaps');
var csso = require( 'gulp-csso' );
var mmq = require( 'gulp-merge-media-queries' );
var concat  = require( 'gulp-concat' );
var plumber = require( 'gulp-plumber' );
var rename = require( 'gulp-rename' );

var config = require('../config').sass;
var minify = require('../config').minify;

gulp.task('sass', function() {

    config.sources.forEach(function(source) {
        gulp.src( source.src )
            .pipe( plumber({
                errorHandler: function ( error ) {
                    console.log( error.message );
                    this.emit( 'end' );
                }
            }))
            .pipe( sourcemaps.init({
                    loadMaps: true,
                    // includeContent: false, 
                    // sourceRoot: '../'
                }))
            .pipe( sass({
                includePaths: source.deps,
                outputStyle: 'expanded',
            }).on('error', sass.logError))
            // .pipe( concat( config.vendors ))
            .pipe( autoprefixer({ 
                    browsers: minify.supported, 
                    add: true 
                }) )
            .pipe( mmq() )
            .pipe( csso() )
            // .pipe( sourcemaps.write( 'maps' ))
            .pipe(rename(source.file))
            .pipe( gulp.dest( config.dest ));

    });

});