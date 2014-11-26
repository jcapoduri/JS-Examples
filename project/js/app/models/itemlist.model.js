define(['backbone', 'underscore', 'models/item.model'], 
    function (Backbone, _, itemModel) {
    var itemListModel = Backbone.Collection.extend({
        initialize: function () {},        
        addNewItem: function () {
            this.add(new this.model());
        },
        model: itemModel
    });
    
    return itemListModel;
});