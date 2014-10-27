define(['backbone', 'underscore', 'models/item.model', 'text!templates/item.tpl.html'], 
    function (Backbone, _, itemModel, tpl) {
    var itemView = Backbone.View.extend({
        tagName: 'tr',
        initialize: function (opts){
            this.model = (!opts.model)? new itemModel() : opts.model;
            this.model.on("change", this.render, this);
            this.render();
        },
        events: {
            "click span": "startEdit",
            "change input[type='text']": "stopEdit",
            "click input[type='checkbox']": 'toggleComplete',
            "click button#removeItem": "triggerRemoveMe"
        },
        render: function () {
            this.$el.empty();
            this.delegateEvents();
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        },
        stopEdit: function () {
            var newValue = this.$el.find("input[type='text']").val();
            this.model.set("title", newValue);
            this.render();
        },        
        startEdit: function () {
            this.$el.find("td > span").removeClass("show").addClass("hidden");
            this.$el.find("del").removeClass("show").addClass("hidden");
            this.$el.find("input[type='text']").removeClass("hidden").addClass("show");
        },
        toggleComplete: function () {
            var newValue = this.$el.find("input[type='checkbox']").is(':checked');
            if (newValue) {
                this.$el.find("td > span").removeClass("show").addClass("hidden");
                this.$el.find("del").removeClass("hidden").addClass("show");
            } else {
                this.$el.find("td > span").removeClass("hidden").addClass("show");
                this.$el.find("del").removeClass("show").addClass("hidden");
            };            
        },
        triggerRemoveMe: function () {
            this.trigger("removeme", this.model);
        },
        template: _.template(tpl)        
    });
    
    return itemView;
});