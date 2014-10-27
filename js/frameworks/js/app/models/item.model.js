define(['backbone', 'underscore'], function (Backbone, _) {
    var itemModel = Backbone.Model.extend({
        defaults: {
            done: false,
            title: "nuwvo item"
        },
        checked: function () {
            if (this.done) return "checked";
            return "";
        }
    });
    
    return itemModel;
});