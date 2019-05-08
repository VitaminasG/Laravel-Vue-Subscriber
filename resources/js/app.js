require('./bootstrap');
window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('subscribe-component', require('./components/SubscribeComponent.vue').default);

const app = new Vue({
    el: '#app'
});
