
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

var VueResource = require('vue-resource');

Vue.use(VueResource);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

//Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    http: {
        root: '/root'
    },
    data: {
        productName: 'productName',
        quantityInStock: 'quantityInStock',
        pricePerItem: 'pricePerItem',
        products: {},
        total: 0
    },
    methods: {
        saveProduct: function(event) {
            event.preventDefault();
          $.ajax('/save', {
              dataType: 'json',
              type: 'POST',
              data: {
                  'productName': this.productName,
                  'quantityInStock': this.quantityInStock,
                  'pricePerItem': this.pricePerItem
              },
              success: function(result) {

                  this.products = result;
              },
              failure: function(result) {
                  console.log(result);
              }
          });
        },

        getProducts: function() {
            this.$http.get('/products')
                .then((response) => {
                    console.log(response)
                    this.products = response.body;
                    this.totalProducts();
            }, (response) => {
                console.log(response);
            });
        },

        totalProducts: function() {
            for (var i=0; i < this.products.length; i++) {
                this.total += (this.products[i].price * this.products[i].quantity);
            }
        }

    }
});

app.getProducts();
