define(['backbone', 'underscore', 'models/todo.model', 'text!templates/main.tpl.html'], 
    function (Backbone, _, TodoModel, tpl) {
    var todoModel = Backbone.View.extend({
        initialize: function (){
            this.model = new ListModel();
        },
        el: 'div',
        events: {},
        render: function () {
            $el.empty();
            this.model.each(this.renderList, this);
            $el.append(this.template());
            return this;
        },
        renderList: function (todo) {
            var listhtml = new ListView({
                model: todo
            }).el;
        },
        template: _.template(tpl)        
    });
    
    return todoModel;
});