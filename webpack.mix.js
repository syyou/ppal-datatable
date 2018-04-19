let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// Load JQuery 1st and Autoload ::
mix .js('node_modules/jquery/dist/jquery.min.js', 'public/js')
      .autoload({
        jquery: ['$', 'window.jQuery','jQuery',"window.$','jquery",'window.jquery'],
        'popper.js': ['Popper']
    });

//Other javascript ::
mix .js([
            'node_modules/bootstrap/dist/js/bootstrap.js',
            'resources/assets/js/app.js',
            'resources/assets/js/home.js'
        ],
        './public/js/vendor.js'
    );

// Bootstrap - CSS  3.3.7 ::
mix.sass('resources/assets/sass/app.scss', 'public/css');
mix.combine(
    [
        'node_modules/datatables.net-dt/css/jquery.dataTables.css',
        'node_modules/datatables.net-autofill-dt/css/autoFill.dataTables.css',
        'node_modules/datatables.net-buttons-dt/css/buttons.dataTables.css',
        'node_modules/datatables.net-colreorder-dt/css/colReorder.dataTables.css',
        'node_modules/datatables.net-fixedcolumns-dt/css/fixedColumns.dataTables.css',
        'node_modules/datatables.net-fixedheader-dt/css/fixedHeader.dataTables.css',
        'node_modules/datatables.net-keytable-dt/css/keyTable.dataTables.css',
        'node_modules/datatables.net-responsive-dt/css/responsive.dataTables.css',
        'node_modules/datatables.net-rowgroup-dt/css/rowGroup.dataTables.css',
        'node_modules/datatables.net-rowreorder-dt/css/rowReorder.dataTables.css',
        'node_modules/datatables.net-scroller-dt/css/scroller.dataTables.css',
        'node_modules/datatables.net-select-dt/css/select.dataTables.css',
    ],
    'public/css/dt.css');

// Media File
mix.copyDirectory('resources/assets/images', 'public/images');
