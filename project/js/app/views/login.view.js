define(['backbone', 'underscore', 'models/login.model', 'text!templates/login.tpl.html'], 
    function (Backbone, _, loginModel, tpl) {
    var loginView = Backbone.View.extend({
        initialize: function (opts){
            opts = opts || {};
            this.model = (!opts.model)? new loginModel() : opts.model;
            this.model.on("change", this.render, this);
            this.render();
        },
        events: {
            "click button": "logIn",
            "change input[type='text']": "updateModel",
            "change input[type='password']": "updateModel"
        },
        render: function () {
            this.$el.empty();
            this.delegateEvents();
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        },
        logIn: function (evt) {
            //should show some update sign
            debugger;
            this.model.save({
                success: function () {
                    window.location.replace('#');
                },
                error: function () {
                    alert("no te pudiste logear");
                }
            });
            evt.preventDefault();
            evt.stopPropagation();
            evt.stopImmediatePropagation();            
        },
        updateModel: function (evt) {
            var input = evt.currentTarget,
                inputId = input.id,
                inputValue = input.value;
            switch(inputId){
                case 'userinput':
                    this.model.set("username", inputValue);
                    break;
                case 'passinput':
                    this.model.set("password", inputValue);
                    break;
            };
        },
        template: _.template(tpl)        
    });
    
    return loginView;
});