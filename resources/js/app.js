require('./bootstrap');

window.Vue = require('vue')

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
            component: require('./components/products/index.vue').default
        },
        {
            path: '/crear',
            component: require('./components/products/create.vue').default
        }
    ]
});

const app = new Vue({
    el: '#app',
    axios,
    router,
    BootstrapVue
});