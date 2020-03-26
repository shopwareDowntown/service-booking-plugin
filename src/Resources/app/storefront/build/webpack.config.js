const { resolve, join } = require('path');

module.exports = ({ config }) => {
    config.resolve.alias['@fullcalendar'] = resolve(
        join(__dirname, '../../', 'node_modules/@fullcalendar')
    );

    console.log(config.resolve);

    return config;
}