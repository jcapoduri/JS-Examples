define(['backbone', 'views/todolist.view'], function (Backbone, mainView) {
    var router = Backbone.Router.extend({
        routes: {
            'default': 'home'
        },
        home: function () {
            if (!this.mainView) this.mainView = new mainView();
            $("#main").html(this.mainView.render().$el.innerHTML);
        }
    });
    
    return router;
});