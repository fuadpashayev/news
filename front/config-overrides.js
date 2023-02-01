const path = require("path");

module.exports = function override(config) {
    config.resolve.modules = [path.resolve(__dirname, "src"), "node_modules"];
    // config.resolve.alias["components"] = path.resolve(__dirname, "src/components");

    return config;
};