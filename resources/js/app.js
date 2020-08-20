require('./bootstrap');

window.Vue = require('vue')
window.$ = window.jQuery = require('jquery')

//Imports
import axios from 'axios'
import Router from 'vue-router'
import BootstrapVue from 'bootstrap-vue'

Vue.use(Router)
Vue.use(BootstrapVue)

Vue.component('indexProducts', require('./components/products/index.vue').default);
Vue.component('createProduct', require('./components/products/create.vue').default);

let router = new Router({
    routes: [
        {
            path: '/',
            component: require('./components/products/index.vue').default,
            name: 'Home'
        },
        {
            path: '/crear',
            component: require('./components/products/create.vue').default,
            name: 'Create'
        }
    ]
});

const app = new Vue({
    el: '#app',
    axios,
    router,
    BootstrapVue
});