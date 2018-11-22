var Encore = require('@symfony/webpack-encore');
Encore.setOutputPath('web/build')
    .setPublicPath('/build')
    .cleanupOutputBeforeBuild()
    .addEntry('app', './web/assets/js/app.js')
    .addEntry('bootstrap-datetimepickerjs', './web/assets/js/bootstrap-datetimepicker.js')
    .addEntry('adminltejs', './web/assets/dist/js/adminlte.js')
    .addEntry('jquery.dataTables', './web/assets/datatables/jquery.dataTables.js')
    .addEntry('dataTables.bootstrap4.minjs', './web/assets/datatables/dataTables.bootstrap4.min.js')
    .addStyleEntry('global', './web/assets/css/global.scss')
    .addStyleEntry('bootstrap-datetimepickercss', './web/assets/css/bootstrap-datetimepicker.css')
    .addStyleEntry('adminlte', './web/assets/dist/css/adminlte.css')
    .addStyleEntry('dataTables.bootstrap4.mincss', './web/assets/datatables/dataTables.bootstrap4.min.css')
    .addStyleEntry('font-awesome', './web/assets/font-awesome/css/font-awesome.css')
    .enableSassLoader().autoProvidejQuery().enableSourceMaps(!Encore.isProduction());
module.exports = Encore.getWebpackConfig();