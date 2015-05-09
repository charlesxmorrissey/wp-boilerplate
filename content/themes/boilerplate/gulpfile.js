// Dependencies
var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();
var pkg = require('./package.json');
var path = require('path');
var browserSync = require('browser-sync');
var reload = browserSync.reload;
var banner = ['/**',
      ' * <%= pkg.name %> - <%= pkg.description %>',
      ' * @version v<%= pkg.version %>',
      ' * @link <%= pkg.homepage %>',
      ' * @author <%= pkg.author %>',
      ' */',
      ''].join('\n');

var devDomain = pkg['project-configs'].devDomain;
var projectPath = __dirname;
var paths = {
    project:      projectPath,

    sassDir:      path.join(projectPath, 'src/sass'),
    sassFiles:    path.join(projectPath, 'src/sass/**/*.scss'),

    jsDir:        path.join(projectPath, 'src/javascripts'),
    jsFiles:      path.join(projectPath, 'src/javascripts/src/**/*.js'),

    imgDir:       path.join(projectPath, 'src/images'),
    imgFiles:     path.join(projectPath, 'src/images/**/*'),

    iconDir:      path.join(projectPath, 'src/icons'),
    iconFiles:    path.join(projectPath, 'src/icons/*.svg'),

    mapDir:       path.join(projectPath, 'src/maps'),

    // Output paths
    styles:       path.join(projectPath, 'dist/styles'),
    js:           path.join(projectPath, 'dist/javascripts'),
    img:          path.join(projectPath, 'dist/images'),
    icons:        path.join(projectPath, 'dist/svg')
};


//
// Plumber
// -----------------
// Pipes errors to js console
//

var onError = function (err) {
  plugins.util.beep();
  this.emit('end');
  console.log(err);
};


//
// Styles task
// -----------------
// Grabs everything inside the styles & sprites directories, concatenates
// and compiles scss, builds sprites, and then outputs them to their
// respective target directories.
//

gulp.task('styles', function () {
  return gulp.src(paths.sassFiles)
    .pipe(plugins.sourcemaps.init())
    .pipe(plugins.sass({
      outputStyle: 'nested',
      precision: 10,
      onError: console.error.bind(console, 'Sass error:')
    }))
    .pipe(plugins.plumber({ errorHandler: onError }))
    .pipe(plugins.autoprefixer('last 4 versions'))
    .pipe(plugins.sourcemaps.write())
    .pipe(gulp.dest(paths.styles))
    .pipe(plugins.notify('Styles task complete.'));
});


//
// Javascript task
// ---------------
// Grabs everything inside the js directory, concatenates and minifies,
// and then outputs them to the target directory.
//

gulp.task('js', function () {
  return gulp.src(paths.jsFiles)
    .pipe(plugins.plumber({ errorHandler: onError }))
    .pipe(plugins.concat('main.min.js'))
    .pipe(gulp.dest(paths.js))
    .pipe(plugins.jshint())
    .pipe(plugins.jshint.reporter('jshint-stylish'))
    .pipe(plugins.jshint.reporter('fail'))
    .pipe(plugins.notify('JS task complete.'));
});


// Javascript vendor copy task
gulp.task('copy', [
  'copy:vendorjs'
]);

gulp.task('copy:vendorjs', function () {
  return gulp.src([paths.jsDir + '/vendors/*.js'])
        .pipe(gulp.dest(paths.js + '/vendors'));
});


//
// Image task
// ----------
// Grabs everything inside the img directory, optimizes each image,
// and then outputs them to the target directory.
//

gulp.task('img', function () {
  return gulp.src(paths.imgFiles)
    .pipe(plugins.cache(plugins.imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
    .pipe(gulp.dest(paths.img));
});

gulp.task('svgstore', function () {
  var svgs = gulp
      .src(paths.iconFiles)
      .pipe(plugins.svgmin())
      .pipe(plugins.cheerio({
        run: function ($) {
          $('[fill]').removeAttr('fill');
        },
        parserOptions: { xmlMode: true }
      }))
      .pipe(plugins.svgstore({ inlineSvg: true }))
      .pipe(gulp.dest(paths.icons));
});


//
// Clean task
// ------------
// This simply deletes all of the main assets folders.
//

gulp.task('clean', function (done) {
  require('del')([
      paths.styles,
      paths.js,
      paths.img,
      paths.icons
  ], done);
});


//
// Cache clearing task
// -------------------
// Destroy the cache so that image name changes take effect etc
//

gulp.task('cache', function () {
  plugins.cache.clearAll();
});


//
// Watch task
// ----------
// Watches the different directories for changes and then
// runs their relevant tasks and live-reloads.
//

gulp.task('watch', function () {
  browserSync({
    proxy: devDomain,
    notify: false
  });

  // watch for changes
  gulp.watch([
    '**.{js,css,html,php}'
  ]).on('change', reload);

  gulp.watch(paths.sassFiles, ['styles', reload]);
  gulp.watch(paths.jsFiles, ['js', reload]);
  gulp.watch(paths.imgFiles, ['img', reload]);
});


//
// Default task
// ------------
// Runs every task, and then watches files for changes.
//

gulp.task('default', ['clean'], function () {
  gulp.start('watch', 'styles', 'js', 'img', 'svgstore', 'copy');
});


//
// Build task
// -----------
// Runs all of the main tasks, without activating live-reload.
//

gulp.task('build', ['clean'], function () {
  // Run the styles task, but minify the output
  gulp.src(paths.sassFiles)
    .pipe(plugins.sass({
      outputStyle: 'nested',
      precision: 10,
      onError: console.error.bind(console, 'Sass error:')
    }))
    .pipe(plugins.autoprefixer('last 4 versions'))
    .pipe(plugins.minifyCss())
    .pipe(plugins.header(banner, { pkg : pkg } ))
    .pipe(gulp.dest(paths.styles));

  // Run the JS task, but strip out debugging code and uglify it
  gulp.src(paths.jsFiles)
    .pipe(plugins.concat('main.min.js'))
    .pipe(plugins.stripDebug())
    .pipe(plugins.uglify())
    .pipe(plugins.header(banner, { pkg : pkg } ))
    .pipe(gulp.dest(paths.js));

  // Run the image & copy task
  gulp.start(['img', 'svgstore', 'copy']);
});
