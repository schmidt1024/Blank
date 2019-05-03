// VARIABLES
const { watch, series, src, dest } = require('gulp');
const uglify = require('gulp-uglify');
const cleanCSS = require('gulp-clean-css');
const concat = require('gulp-concat');
const less = require('gulp-less');
const sass = require('gulp-sass');

// FILES
function getFiles() {
    return src('node_modules/normalize.css/normalize.css')
        .pipe(dest('css/'));
}

// JAVASCRIPT
function uglifyJavascript() {
  return src([
    'js/script.js'
    ])
    .pipe(uglify())
    .pipe(concat('app.js'))
    .pipe(dest('build/'));
}

// LESS
function compileLess() {
  return src('css/template.less')
    .pipe(less())
    .pipe(dest('css/'));
}


// SASS
function compileSass() {
  return src('css/template.scss')
    .pipe(sass())
    .pipe(dest('css/'));
}

// CSS
function mergeCss() {
  return src([
    'css/normalize.css',
    'css/template.css'
    ])
    .pipe(cleanCSS())
    .pipe(concat('style.css'))
    .pipe(dest('build/'));
}

// WATCHER
function watchFiles() {
  watch('js/**/*.js', uglifyJavascript);
  watch('css/**/*.less', compileLess);
  watch('css/**/*.scss', compileSass);
  watch('css/**/*.css', mergeCss);
}

// DEFAULT
exports.default = series(
  getFiles, 
  uglifyJavascript, 
  compileLess, 
  compileSass, 
  mergeCss, 
  watchFiles
);
