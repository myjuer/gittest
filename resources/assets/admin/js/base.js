var a = function(){
	console.log('test111');
}()

require.config({
	baseUrl:'http://127.0.0.1/resources/assets/',
	paths:{
		'jquery':'admin/AdminLTE/bower_components/jquery/dist/jquery.min',
		'jquery-ui':'admin/AdminLTE/bower_components/jquery-ui/jquery-ui.min',
		'bootstrap':'admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min',
		'raphael':'admin/AdminLTE/bower_components/raphael/raphael.min',
		'morris':'admin/AdminLTE/bower_components/morris.js/morris.min',
		'jquery-sparkline':'admin/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min',
		'jquery-jvectormap':'admin/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min',
		'jquery-jvectormap-world-mill-en':'admin/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en',
		'jquery-knob':'admin/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min',
		'moment':'admin/AdminLTE/bower_components/moment/min/moment.min',
		'daterangepicker':'admin/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker',
		'bootstrap-datepicker':'admin/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min',
		'bootstrap3-wysihtml5-all':'admin/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min',
		'jquery-slimscroll':'admin/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min',
		'fastclick':'admin/AdminLTE/bower_components/fastclick/lib/fastclick',
		'adminlte':'admin/AdminLTE/dist/js/adminlte.min',
		'dashboard':'admin/AdminLTE/dist/js/pages/dashboard',
		'adminlte-demo':'admin/AdminLTE/dist/js/demo',
		'icheck':'admin/AdminLTE/plugins/iCheck/icheck'
	},
	shim: {
		'jquery': {
　　　　　　exports: 'jquery'
　　　　},
　　　　'jquery-ui': {
　　　　　　deps: ['jquery'],
　　　　　　exports: 'jquery-ui'
　　　　},
		　'raphael': {
　　　　　　deps: ['jquery'],
　　　　　　exports: 'raphael'
　　　　},
		　'morris': {
		　　　　　　deps: ['jquery'],
		　　　　　　exports: 'morris'
		　　　　},
		　'jquery-sparkline': {
		　　　　　　deps: ['jquery'],
		　　　　　　exports: 'jquery-sparkline'
		　　　　},
		　'jquery-jvectormap': {
		　　　　　　deps: ['jquery'],
		　　　　　　exports: 'jquery-jvectormap'
		　　　　},
		　'jquery-jvectormap-world-mill-en': {
		　　　　　　deps: ['jquery'],
		　　　　　　exports: 'jquery-jvectormap-world-mill-en'
		　　　　},
		'jquery-knob':{
		   deps: ['jquery'],
　　　　　　exports: 'jquery-knob'
		},
		'moment':{
		   deps: ['jquery'],
　　　　　　exports: 'moment'
		},
		'daterangepicker':{
		   deps: ['jquery'],
　　　　　　exports: 'daterangepicker'
		},
		'bootstrap-datepicker':{
		   deps: ['jquery'],
　　　　　　exports: 'bootstrap-datepicker'
		},
		'bootstrap3-wysihtml5-all':{
		   deps: ['jquery'],
　　　　　　exports: 'bootstrap3-wysihtml5-all'
		},
		'jquery-slimscroll':{
		   deps: ['jquery'],
　　　　　　exports: 'jquery-slimscroll'
		},
		'fastclick':{
		   deps: ['jquery'],
　　　　　　exports: 'fastclick'
		},
		'adminlte':{
		   deps: ['jquery'],
　　　　　　exports: 'adminlte'
		},

		'dashboard':{
			deps: [
			'jquery',
			'jquery-ui',
			'bootstrap3-wysihtml5-all',
			'raphael',
			'morris',
			'jquery-sparkline',
			'jquery-jvectormap',
			'jquery-jvectormap-world-mill-en',
			'jquery-knob',
			'moment',
			'daterangepicker',
			'bootstrap-datepicker',
			'jquery-slimscroll',
			'fastclick',
			'adminlte',
			'adminlte-demo'
			],
　　　　　　exports: 'dashboard'
		},
		'adminlte-demo':{
		   deps: ['jquery'],
　　　　　　exports: 'adminlte-demo'
		}
	}
})
require([
	'jquery',
	'bootstrap',
	'jquery-ui',
	'adminlte',
	'dashboard',
	'adminlte-demo',
	],function($){
 $.widget.bridge('uibutton', $.ui.button);
})
