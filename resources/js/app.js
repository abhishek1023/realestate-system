require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('property-list', require('./components/PropertyList.vue').default);
const app = new Vue({
    el: '#app',
});