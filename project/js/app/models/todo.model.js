define(['backbone', 'underscore', 'models/itemlist.model'], 
    function (Backbone, _, itemListModel) {
    var todoModel = Backbone.Model.extend({
        url: function () {
            return 'api/todo' + this.id();
        },
        urlRoot: 'api/todo',
        initialize: function (){
            var self = this;
            //this.set("items", new itemListModel());
            this.items = new itemListModel();
            this.items.url = function () {
                return self.url() + "/items";
            };
        },
        defaults: {
            title: "Nuevo titulo"
        },
        addNewItem: function () {
            //this.get("items").addNewItem();
            this.items.addNewItem();
        }
    });
    
    return todoModel;
});