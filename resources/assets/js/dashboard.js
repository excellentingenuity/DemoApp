/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

var VueResource = require('vue-resource');
var moment = require('moment');

Vue.use(VueResource);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

//Vue.component('example', require('./components/Example.vue'));
//Vue.component('datepicker', require('./components/datepicker.vue'));

const dashboard = new Vue({
    el: '#dashboard',
    http: {
        root: '/dashboard'
    },
    data: {
        upcomingExpos: {},
        scheduledExpos: {},
        expo: {
            id: 'id',
            name: 'Name',
            description: 'Description',
            startDate: new Date(2016, 10, 1)
        }
    },
    methods: {
        getUpcomingExpos: function() {
            this.$http.get('../api/expos/upcoming')
                .then((response) => {
                    console.log(response)
                    this.upcomingExpos = JSON.parse(response.body);
                }, (response) => {
                    console.log(response);
                });
        },

        getScheduledExpos: function() {
            this.$http.get('../api/expos/scheduled')
                .then((response) => {
                    console.log(response)
                    this.scheduledExpos = JSON.parse(response.body);
                }, (response) => {
                    console.log(response);
                });
        },

        loadExpoToForm: function (id, name, description) {
            this.expo.id = id;
            this.expo.name = name;
            this.expo.description = description;
          //console.log(name);
            //console.log(this.scheduledExpos.);
        },

        moment: function () {
            return moment();
        }
    },
    filters: {
        transformDate: function(date) {
            return moment(date).format('ll');
        }
    },
    components: {

    }

});

dashboard.getUpcomingExpos();
dashboard.getScheduledExpos();



