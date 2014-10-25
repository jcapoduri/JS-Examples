define(['backbone', 'underscore'], function (Backbone, _) {
    var itemModel = Backbone.Model.extend({
        defaults: {
            done: false,
            title: ""
        }
    });
    
    return itemModel;
});