define(['backbone', 'underscore', 'models/itemlist.model'], 
    function (Backbone, _, itemListModel) {
    var todoModel = Backbone.Model.extend({
        initialize: function (){
            //this.todos = new itemListModel();
            this.set("todos", new itemListModel());
        },
        defaults: {
            title: "Nuevo titulo"
        },
        addNewItem: function () {
            this.get("todos").addNewItem();
        }
    });
    
    return todoModel;
});