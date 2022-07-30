import './bootstrap';

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();



// window.Vue = require('vue');
import {createApp} from "vue";
import {router} from './router/index.js';

// Vue.component('example', require('./components/Example.vue'));
import ExampleComponent from './components/ExampleComponent.vue';
createApp({
        ExampleComponent
}).use(router).mount("#app");