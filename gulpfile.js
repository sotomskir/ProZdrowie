var gulp = require('gulp');
var phpspec = require('gulp-phpspec');
var phpunit = require('gulp-phpunit');
var run = require('gulp-run');
var notify = require('gulp-notify');

gulp.task('phpunitRun', function() {
    gulp.src(['tests/Unit/**/*Test.php', 'tests/Feature/**/*Test.php'])
        .pipe(phpunit('', { debug: false, notify: false }))
        .on('error', notify.onError({
            title: 'Dangit',
            message: 'Unit tests failed!',
            icon: __dirname + '/tests/icons/red.png'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'Unit tests have returned green!',
            icon: __dirname + '/tests/icons/green.png'
        }));
});

gulp.task('phpspecRun', function() {
    gulp.src('tests/spec/**/*.php')
    // .pipe(run('clear'))
        .pipe(phpspec('', {notify: true}))
        .on('error', notify.onError({
            title: 'Dangit',
            message: 'Unit tests failed!',
            icon: __dirname + '/tests/icons/red.png'
        }))
        .pipe(notify({
            title: 'Success',
            message: 'Unit tests have returned green!',
            icon: __dirname + '/tests/icons/green.png'
        }));
});

gulp.task('phpspecWatch', function() {
    gulp.watch(['tests/spec/**/*.php'], ['phpspec']);
});

gulp.task('phpunitWatch', function() {
    gulp.watch(['tests/Unit/**/*Test.php', 'tests/Feature/**/*Test.php'], ['phpunit']);
});

gulp.task('watch', function() {
    gulp.watch(['tests/spec/**/*.php'], ['phpspec']);
    gulp.watch(['tests/Unit/**/*Test.php', 'tests/Feature/**/*Test.php'], ['phpunit']);
});

gulp.task('default', ['phpspecRun', 'phpunitRun', 'watch']);

gulp.task('phpspec', ['phpspecRun', 'phpspecWatch']);
gulp.task('phpunit', ['phpunitRun', 'phpunitWatch']);