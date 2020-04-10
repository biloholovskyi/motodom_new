const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const sass = require('gulp-sass');
const webpack = require('webpack-stream');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');

const pathThemes = 'app/wp-content/themes/motodom/';

const webConfig = {
  output: {
    filename: 'index.js'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        exclude: '/node_modules/'
      },
      {
        test: /\.css$/i,
        use: ['style-loader', 'css-loader'],
      }
    ]
  }
};

gulp.task('default', function() {
  browserSync.init({
    proxy: "http://localhost:8888/motodom_new/app",
  });
    // gulp.watch(pathThemes + "sass/**/*.scss", function () {
    //     return gulp.src(pathThemes + "sass/**/*.scss")
    //       .pipe(sass())
    //       .pipe(autoprefixer({
    //         overrideBrowserslist: ['> 0.1%'],
    //         cascade: false
    //       }))
    //       .pipe(cleanCSS({
    //         level: 2
    //       }))
    //       .pipe(gulp.dest(pathThemes + "css"))
    //       .pipe(browserSync.stream());
    // });
    gulp.watch(pathThemes + "fix/js/**/*.js", function () {
      return gulp.src(pathThemes + "fix/js/index.js")
        .pipe(webpack(webConfig))
        .pipe(gulp.dest(pathThemes + "fix/buildjs"))
        .pipe(browserSync.stream());
    });
    gulp.watch(pathThemes + "**/*.php").on('change', browserSync.reload);
});