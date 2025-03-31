module.exports = {
  proxy: 'http://localhost:10083',
  files: ['dist/*.css', 'dist/*.js', '*.php'],
  notify: false,
};
