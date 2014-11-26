define(['backbone', 'underscore', 'models/todolist.model', 'views/todo.view', 'text!templates/main.tpl.html'], 
    function (Backbone, _, todoListModel, todoView, tpl) {
    var todoModelClass = Backbone.View.extend({
        initialize: function (){
            this.model = new todoListModel();
            this.model.on("add", this.renderNew, this);
            this._todosViews = [];
        },        
        events: {
            "click button#addTodo": "addList"
        },
        render: function () {
            this.$el.empty();            
            _(this._todosViews).each(this.renderList, this);
            this.$el.append(this.template());
            return this;
        },
        renderNew: function (item) {
            var view = new todoView({
                model: item
            });
            this._todosViews.push(view);
            this.render();
        },
        renderList: function (view) {
            view.delegateEvents();
            this.$el.append(view.el);
        },
        template: _.template(tpl),
        addList: function () {
            this.model.addNew();            
        }
    });
    
    return todoModelClass;
});