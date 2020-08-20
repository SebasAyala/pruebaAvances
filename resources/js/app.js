require('./bootstrap');

window.Vue = require('vue')

//Imports
import Router from 'vue-router'
import BootstrapVue from 'bootstrap-vue'

Vue.use(Router)
Vue.use(BootstrapVue)

let router = new Router({
    routes: [
        {
            path: '/',
            component: {
                template: '<div><h1>Login</h1></div>',
            }
        },
        {
            path: '/productos',
            component: {
                template: '<h1>Prod</h1>'
            }
        }
    ]
});

const app = new Vue({
    el: '#app',
    router,
    BootstrapVue
});