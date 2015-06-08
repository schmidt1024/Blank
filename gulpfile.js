//=======================================================================
// VARIABLES
//=======================================================================

var gulp       		= require('gulp');
var uglify     		= require('gulp-uglify');
var minifyCSS  		= require('gulp-minify-css');
var concat     		= require('gulp-concat');
var less       		= require('gulp-less');
var sass       		= require('gulp-sass');
var autoprefix 		= require('gulp-autoprefixer');
var convertEncoding = require('gulp-convert-encoding');
var notify     		= require('gulp-notify');



//=======================================================================
// WATCH
//=======================================================================

gulp.task('watch', function(){

	// TEMPLATE
	gulp.watch('js/**/*.js',['template-js']);
	gulp.watch('css/**/*.less',['template-less']);
	gulp.watch('css/**/*.scss',['template-sass']);
	gulp.watch('css/**/*.css', ['template-css']);

});



//=======================================================================
// TEMPLATE
//=======================================================================

// JAVASCRIPT

gulp.task('template-js', function () {
	return gulp.src([
		'js/script.js'
		])
		.pipe(uglify())
		.pipe(concat('app.js'))
		.pipe(convertEncoding({to: 'utf8'}))
		.pipe(gulp.dest('build'))
		.pipe(notify({message:'template -> app.js'}));
});



// LESS

gulp.task('template-less', function () {
	gulp.src('css/template.less')
		.pipe(less())
		.pipe(autoprefix('last 10 versions', 'ie 9', 'ie 8'))
		.pipe(gulp.dest('css'))
		.pipe(notify({message:'template -> less -> css'}));
});



// SASS

gulp.task('template-sass', function () {
	gulp.src('css/template.scss')
		.pipe(sass())
		.pipe(autoprefix('last 10 versions', 'ie 9', 'ie 8'))
		.pipe(gulp.dest('css'))
		.pipe(notify({message:'template -> sass -> css'}));
});



// CSS

gulp.task('template-css', function () {
	gulp.src([
		'css/normalize.css',
		'css/template.css'
		])
		.pipe(minifyCSS())
		.pipe(concat('style.css'))
		.pipe(gulp.dest('build'))
		.pipe(notify({message:'template -> style.css'}));
});
