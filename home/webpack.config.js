const path = require('path');

module.exports = {
  entry : './srs/app/index.js',
  output : {
    path : path.resolve(__dirname,'dist'),

  }
}
