var Encore = require('@symfony/webpack-encore');
Encore.setOutputPath('web/build')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .addEntry('app', './web/assets/js/app.js')
    .addEntry('bootstrap-datetimepickerjs', './web/assets/js/bootstrap-datetimepicker.js')
    .addEntry('moment', './web/assets/js/moment.min.js')
    .addEntry('adminltejs', './web/assets/dist/js/adminlte.js')
    .addEntry('main', './web/assets/js/main.js')
    .addStyleEntry('global', './web/assets/css/global.scss')
    .addStyleEntry('bootstrap-datetimepickercss', './web/assets/css/bootstrap-datetimepicker.css')
    .addStyleEntry('adminlte', './web/assets/dist/css/adminlte.css')
    .addStyleEntry('font-awesome', './web/assets/font-awesome/css/font-awesome.css')
    .enableSassLoader().autoProvidejQuery().enableSourceMaps(!Encore.isProduction());
module.exports = Encore.getWebpackConfig();