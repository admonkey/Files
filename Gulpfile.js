var gulp = require('gulp');
var phpunit = require('gulp-phpunit');
var run = require('gulp-run');
var notify = require('gulp-notify');

gulp.task('test', function() {

    // clear console screen between tests
    // http://stackoverflow.com/a/9452971/4233593
    console.log('\033[2J');

    gulp.src('phpunit.xml')
        .pipe(phpunit('', { notify: true }))
        .on('error', notify.onError({
            title: 'Red!',
            message: 'Your tests failed...'
        }))
        .pipe(notify(
            {
                title: 'Green!',
                message: 'Your tests succeeded!'
            }
        ));
});

gulp.task('watch', function() {
    gulp.watch(['tests/**/*.php'], ['test']);
});

gulp.task('default', ['test', 'watch']);