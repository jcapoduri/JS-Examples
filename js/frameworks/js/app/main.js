requirejs.config({
    baseUrl: 'js',
    paths: {
        models: 'app/models',
        views: 'app/views',
        templates: 'app/templates',
        jquery: 'vendor/jquery/jquery',
        underscore: 'vendor/underscore/underscore',
        bootstrap: 'vendor/bootstrap/bootstrap.min',
        backbone: 'vendor/backbone/backbone',
        jquery: 'vendor/jquery/jquery',
        text: 'vendor/require/text',
    },
    shim: {
        jquery: {
            exports: '$'
        },
        backbone: {
            deps: ['jquery', 'underscore'],
            exports: 'Backbone'
        },
        underscore: {
            exports: '_'
        }
    }
});

requirejs(['backbone', 'app/router'], function (Backbone, Router) {
    var App = new Router();
    Backbone.history.start()
});