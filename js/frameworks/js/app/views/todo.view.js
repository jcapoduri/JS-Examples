define(['backbone', 'underscore', 'models/todo.model', 'views/itemlist.view', 'text!templates/todo.tpl.html'], 
    function (Backbone, _, todoModel, itemListView, tpl) {
    var todoModelClass = Backbone.View.extend({
        initialize: function (opts){
            this.model = !(opts.model)? new todoModel() : opts.model;
            this.itemlistView = new itemListView({
                model: this.model.get("todos")
            });
            this.render();
        },
        events: {
            "click button#addItem": "addItem",
            "click h3": "startEdit",
            "change input[type='text']": "stopEdit"
        },
        startEdit: function () {
            this.$el.find("h3").removeClass("show").addClass("hidden");
            this.$el.find("input[type='text']").removeClass("hidden").addClass("show");
        },
        stopEdit: function () {
            var newValue = this.$el.find("input[type='text']").val();
            this.model.set("title", newValue);
            this.render();
        },
        render: function () {            
            this.$el.empty();
            this.$el.append(this.template(this.model.toJSON()));
            this.itemlistView.render().$el.appendTo(this.$('table'));
            return this;
        },
        template: _.template(tpl),
        addItem: function () {
            this.model.get("todos").addNewItem();
        }   
    });
    
    return todoModelClass;
});