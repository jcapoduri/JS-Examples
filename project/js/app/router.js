define(['backbone', 'views/todolist.view', 'views/register.view', 'views/login.view'], 
    function (Backbone, mainView, registerView, loginView) {
    var router = Backbone.Router.extend({
        routes: {
            'login': 'login',
            'signup': 'signup',
            'signout': 'signout',
            '*default': 'home'
        },
        home: function () {
            if (!this.mainView) this.mainView = new mainView();
            //$("#main").html(this.mainView.render().$el.innerHTML);
            $("#main").html(this.mainView.render().el);
            q = this.mainView;
        },
        login: function () {
            if (!this.loginView) this.loginView = new loginView();
            //$("#main").html(this.mainView.render().$el.innerHTML);
            $("#main").html(this.loginView.render().el);
            q = this.loginView;
        },
        signup: function () {
            if (!this.registerView) this.registerView = new registerView();
            //$("#main").html(this.mainView.render().$el.innerHTML);
            $("#main").html(this.registerView.render().el);
            q = this.registerView;  
        },
        signout: function () {}
    });
    
    return router;
});