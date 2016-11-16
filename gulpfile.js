const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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
var adminStyle = [
	'general/bootstrap.css',
	'admin/sb-admin.css',
	'admin/morris.css',
];
var adminScripts = [
	'general/bootstrap.min.js',
	'admin/plugins/morris/raphael.min.js',
	'admin/plugins/morris/morris.min.js',
	'admin/plugins/morris/morris-data.js',
];
elixir(mix => {
    mix.styles(adminStyle, 'public/css/app.css')
    	.scripts(adminScripts, 'public/js/app.js')
    	.version(['css/app.css','js/app.js'])
});
