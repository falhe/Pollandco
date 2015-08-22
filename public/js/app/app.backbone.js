/*
Model
*/
(function() {
    "use strict";

    window.app = {
        Model: {},
        Collection: {},
        View: {}
    };

    // Utilisateur Model
    app.Model.User = Backbone.Model.extend({
        defaults: {
            name: "nom de famille",
            prenom: "prénom",
            id: 1
        }

        //url: rootPath + '/searchusers'
    });

    // Collection de la liste des users recherché
    app.Collection.User = Backbone.Collection.extend({

        'model': app.Model.User,
        'url': rootPath + '/searchusers'
    });

    /*
     *   Vue Search Input for users [#form-search-users]
     */
    app.View.SearchUserForm = Backbone.View.extend({

        el: '#form-search-users',

        events: {
            'submit .form-search-users': 'searchUser'
        },

        initialize: function() {
            _.bindAll(this, 'searchUser');
            console.log('init vue FormSearchUser');
        },

        searchUser: function(e) {
            e.preventDefault();
            var parameters = {
                name: this.$el.find('.search').val()
            };

            this.collection.fetch({
                data: {
                    q: parameters.name
                },
                success: function(data) {
                    Backbone.Mediator.publish('SearchUserForm:search', data);
                },
                error: function(data) {
                    console.log('error', data);
                }
            });
        }

    });

    /*
     *  Vue Item d un utilisateur
     */
    app.View.SearchUserResult = Backbone.View.extend({

        tagName: 'table',

        className: 'table item-user-search',

        template: _.template($('#SearchUserResult').html()),

        events: {
            'click span.id': 'toto'
        },

        initialize: function() {
            console.log('SearchUserResult ITEM ');
        },

        render: function() {
            this.$el.html(this.template(this.model.toJSON()));
            return this;
        },

        toto: function(argument) {
            console.log(argument);
        },
    });

    /*
     *   Vue de la liste des resultats
     */
    app.View.SearchUserResults = Backbone.View.extend({

        el: '#search-users-list',

        tagName: 'div',

        events: {
            //'submit .form-search-users': 'fetchlaCollection'
        },

        initialize: function() {
            console.log('initialize la vue liste des users recherché');
            this.listenTo(this.collection, 'change', this.render);
            Backbone.Mediator.subscribe('SearchUserForm:search', this.render, this);
        },

        render: function(data) {
            this.$el.empty();
            //boucle sur la collection
            data.each(function(model, index) {
                var item = new app.View.SearchUserResult({
                    model: model
                });

                this.$el.append(item.render().el);

            }.bind(this));

            return this;
        }
    });

    /*
     *   Instance Vue Search Input for users
     */
    // var SearchUserForm = new app.View.SearchUserForm({
    //     'model': new Backbone.Model()
    // });

    var searchUserForm = new app.View.SearchUserForm({
        collection: new app.Collection.User
    });
    var users = new app.View.SearchUserResults();

})();