define(['backbone', 'underscore', 'models/todo.model'], 
    function (Backbone, _, todoModel) {
    var todoListModel = Backbone.Collection.extend({
        url: 'api/todo',
        initialize: function () {},
        addNew: function () {
            this.add(new this.model());
        },
        model: todoModel
    });
    
    return todoListModel;
});