module.exports = {
  proxy: 'http://localhost:10082',
  files: ['dist/*.css', 'dist/*.js', '*.php'],
  notify: false,
};
