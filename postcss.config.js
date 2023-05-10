const postcssNormalize = require('postcss-normalize');
const postcssClean = require('postcss-clean');
const autoprefixer = require('autoprefixer');

module.exports = {
	plugins: [
		autoprefixer(),
		postcssNormalize(),
		postcssClean(),
	]
}