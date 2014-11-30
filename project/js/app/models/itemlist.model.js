define(['backbone', 'underscore', 'models/item.model'], 
    function (Backbone, _, itemModel) {
    var itemListModel = Backbone.Collection.extend({
        initialize: function () {},        
        addNewItem: function () {
            var newItem = new this.model();
            this.add(newItem);
            newItem.save();
        },
        model: itemModel
    });
    
    return itemListModel;
});