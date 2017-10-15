var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/','public/fonts/bootstrap'); 
    mix.scripts([
        'jquery/dist/jquery.min.js',
	'jquery-ui-bundle/jquery-ui.min.js',
	'bootstrap/js/alert.js',
	'bootstrap/js/tooltip.js',
	'bootstrap/js/transition.js',
	'bootstrap/js/dropdown.js',
	'bootstrap/js/collapse.js',
	'bootstrap/js/popover.js',
        // list your other npm packages here
    ],
    'public/js/vendor.js',
    'node_modules');
    
    mix.scripts('app.js');
});
