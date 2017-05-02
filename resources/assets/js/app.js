
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue2Filters from 'vue2-filters'

require('./chartjsdemo.js')

window.Vue.use(Vue2Filters)

import VueEcho from 'vue-echo';

Vue.use(VueEcho, {
  broadcaster: 'pusher',
  key: '06d5f8319089048cd234',
  cluster: 'eu',
  encrypted: true
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
