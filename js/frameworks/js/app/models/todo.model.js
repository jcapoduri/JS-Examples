define(['Backbone', 'Underscore', 'models/item.model'], function (Backbone, _) {
    var todoModel = Backbone.Model.extend({
        initialize: function (){},
        defaults: {}
    });
    
    return todoModel;
});