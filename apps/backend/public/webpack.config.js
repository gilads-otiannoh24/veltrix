const path = require("path");

module.exports = {
  mode: "development",
  entry: {
    app: "./js/src/index.js",
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "js/dist"),
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
        },
      },
    ],
  },
};
