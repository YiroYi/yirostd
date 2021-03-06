
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('activity', require('./components/Activity.vue'));
Vue.component('cost', require('./components/Cost.vue'));
Vue.component('rol', require('./components/Rol.vue'));
Vue.component('schedule', require('./components/Schedule.vue'));
Vue.component('user', require('./components/User.vue'));
Vue.component('coach', require('./components/Coach.vue'));
Vue.component('sale', require('./components/Sale.vue'));

const app = new Vue({
    el: '#app',
    data:{
      menu:0
    }
});
