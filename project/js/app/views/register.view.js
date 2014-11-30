define(['backbone', 'underscore', 'models/register.model', 'text!templates/register.tpl.html'], 
    function (Backbone, _, registerModel, tpl) {
    var registerView = Backbone.View.extend({
        initialize: function (opts){
            this.model = (!opts.model)? new registerModel() : opts.model;
            this.model.on("change", this.render, this);
            this.render();
        },
        events: {
            "click span": "startEdit",
            "change input[type='text']": "stopEdit",
            "click input[type='checkbox']": 'toggleComplete',
            "click button#removeItem": "triggerRemoveMe"
        },
        template: _.template(tpl)        
    });
    
    return registerView;
});