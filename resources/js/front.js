window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'; //csrf token from cookie to backend
window.Vue = require('Vue');

import App from './views/App.vue';
import Vue from 'vue';
import router from './router';

const app = new Vue({
    el: '#app',
    render: h => h(App), router
});