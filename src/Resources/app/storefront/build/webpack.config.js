const { resolve, join } = require('path');

module.exports = ({ config }) => {
    config.resolve.alias['@fullcalendar'] = resolve(
        join(__dirname, '../../', 'node_modules/@fullcalendar')
    );

    config.resolve.alias['moment'] = resolve(
        join(__dirname, '../../', 'node_modules/moment')
    );

    return config;
}