
/**x
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import $ from 'jquery';
require('./bootstrap');

window.Vue = require('vue');

import 'datatables.net';
import 'select2';
import 'jquery-bar-rating';
window.swal = require('sweetalert2');
var printThis = require('print-this');
import print from 'print-js';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('map-component',require('./components/MapComponent.vue'));
Vue.component('pin-component',require('./components/PinComponent.vue'));
Vue.component('product-component',require('./components/ProductComponent.vue'));
Vue.component('achivement-component',require('./components/AchivementComponent.vue'));
Vue.component('training-component',require('./components/TrainingComponent.vue'));
Vue.component('productimage-component',require('./components/ProductImageComponent.vue'));
Vue.component('form-province-component',require('./components/FormProvinceComponent.vue'));
Vue.component('problem-component',require('./components/ProblemComponent.vue'));

const app = new Vue({
    el: '#app'
});

