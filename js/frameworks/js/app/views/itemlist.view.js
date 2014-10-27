define(['backbone', 'underscore', 'models/itemlist.model', 'views/item.view', 'text!templates/itemlist.tpl.html'], 
    function (Backbone, _, itemListModel, itemView, tpl) {
    var itemListView = Backbone.View.extend({
        tagName: 'tbody',
        initialize: function (opts){
            this.model = (!opts.model)? new itemListModel() : opts.model;
            this.model.on("add", this.renderNew, this);
            this._itemViews = [];
            this.render();
        },
        render: function () {
            this.$el.empty();
            _(this._itemViews).each(this.renderItem, this);            
            return this;
        },
        renderNew: function (item) {
            var view = new itemView({
                model: item
            });
            this.listenTo(view, 'removeme', this.removeElement);
            this._itemViews.push(view);
            this.render();
        },
        removeElement: function (item) {
            this.model.remove(item);
            var viewToRemove = _(this._itemViews).select(function(cv) { return cv.model === item; })[0];
            this._itemViews = _(this._itemViews).without(viewToRemove);
            this.render();
        },
        renderItem: function (view) {
            view.delegateEvents();
            this.$el.append(view.$el);
        },
        template: _.template(tpl)        
    });
    
    return itemListView;
});