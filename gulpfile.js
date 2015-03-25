var browserSync = require('browser-sync'),
    reload      = browserSync.reload,
    gulp        = require('gulp'),
    less        = require('gulp-less'),
    minifyCss   = require('gulp-minify-css'),
    concat      = require('gulp-concat'),
    uglify      = require('gulp-uglify'),
    shell       = require('gulp-shell'),
    zip         = require('gulp-zip'),
    pkg         = require('./package.json');

// Browser Sync
gulp.task('browser-sync', function () {
	browserSync({
		open: false,
		proxy: 'localhost/wordpress'
	});
});

// Development styles
gulp.task('styles:development', function () {
	return gulp.src('./assets/less/styles.less')
		.pipe(less({ paths: './assets' }))
		.pipe(gulp.dest('./built/css'))
		.pipe(reload({ stream: true }));
});

// Production styles
gulp.task('styles:production', function () {
	return gulp.src('./assets/less/styles.less')
		.pipe(less({ paths: './assets' }))
		.pipe(minifyCss())
		.pipe(gulp.dest('./built/css'));
});

// Build app scripts
gulp.task('scripts:app', function() {
	return gulp.src([
			'bower_components/bootstrap/dist/js/bootstrap.min.js',
			'./assets/js/**/*.js'
		])
		.pipe(concat('bdpn.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('./built/js'))
		.pipe(reload({ stream: true }));
});

// Get optiontree from github repo
gulp.task('optiontree', shell.task([
	'rm -rf option-tree',
	'git clone https://github.com/valendesigns/option-tree.git'
]));

// Build Wordpress Theme
gulp.task('theme', [
	'styles:production',
	'scripts:app'
], function () {
	return gulp.src([
			'*.php',
			'style.css',
			'screenshot.jpg',
			'built/**/*',
			'includes/**/*',
			'templates/**/*'
		], { base: './' })
		.pipe(zip(pkg.name + '-' + pkg.version + '.zip'))
		.pipe(gulp.dest('./'));
});

// Default development task
gulp.task('default', [
	'styles:development',
	'scripts:app',
	'browser-sync'
], function () {
	gulp.watch('./**/*.php', reload);
	gulp.watch('./assets/less/**/*.less', ['styles:development']);
	gulp.watch('./assets/js/**/*.js', ['scripts:app']);
});
