require.config({
    baseUrl: 'js/',
    paths: {
        'models': 'app/models',
        'views': 'app/views',
        'templates': 'app/templates',
        'jquery': 'vendor/jquery/jquery.js',
        'underscore': 'vendor/underscore/underscore.js',
        'bootstrap': 'vendor/bootstrap/bootstrap.min.js',
        'backbone': 'vendor/backbone/backbone.js',
        'jquery': 'vendor/jquery/jquery.js',
    },
    shim: {
        jquery: {
            exports: '$'
        },
        backbone: {
            deps: ['jquery', 'underscore']
            exports: 'Backbone'
        },
        underscore: {
            exports: '_'
        }
    }
});

define([], function () {
    
});