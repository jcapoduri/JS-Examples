define(['backbone', 'underscore'], function (Backbone, _) {
    var loginModel = Backbone.Model.extend({
        url: 'api/user/login',
        defaults: {
            username: "",
            password: ""
        }
    });

    return loginModel;
});