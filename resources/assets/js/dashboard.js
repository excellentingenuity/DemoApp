/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

var VueResource = require('vue-resource');
var moment = require('moment');
var flatpickr = require('../../../node_modules/vue-flatpickr/vue-flatpickr-default.vue');

Vue.use(VueResource);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

//Vue.component('example', require('./components/Example.vue'));


const dashboard = new Vue({
    el: '#dashboard',
    http: {
        root: '/dashboard'
    },
    data: {
        upcomingExpos: {},
        scheduledExpos: [],
        expo: {
            id: 'id',
            name: 'Name',
            description: 'Description',
            start_date: new Date(2016, 10, 1),
            end_date: new Date(2016, 10, 1)

        },
        end_date: 'Select a date',
        start_date: 'Select a date'
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
            //console.log(this.getById(id, this.scheduledExpos));
            this.expo = this.getById(id, this.scheduledExpos);
            this.updateStart(this.expo.start_date);
            this.updateEnd(this.expo.end_date);
        },

        moment: function () {
            return moment();
        },

        getById: function (id, myArray) {
            return myArray.filter(function(obj) {
                if(obj.id == id) {
                    return obj
                }
            })[0]
        },

        updateStart: function(val) {
            this.start_date = val;
        },
        updateEnd: function(val) {
            this.end_date = val;
        }
    },
    filters: {
        transformDate: function(date) {
            return moment(date).format('ll');
        }

    },
    components: {
        flatpickr: flatpickr
    }
});
dashboard.getUpcomingExpos();
dashboard.getScheduledExpos();




