define(['backbone', 'underscore'], function (Backbone, _) {
    var registerModel = Backbone.Model.extend({
        url: 'api/user/singup',
        defaults: {
            email: "",
            username: "",
            password: ""
        }
    });

    return registerModel;
});