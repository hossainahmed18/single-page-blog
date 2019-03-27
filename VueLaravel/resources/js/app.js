
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'

Vue.use(VueRouter)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-main', require('./components/myadmin/adminmaster.vue').default);
Vue.component('home-main', require('./components/fuser/PublicMaster.vue').default);
import {routes} from './routes.js';


//v form
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form=Form;

//Sweet alert
import Swal from 'sweetalert2'
window.Swal=Swal


const router = new VueRouter({
  routes,
  mode:'hash' // short for `routes: routes`
})



//Vex er kaj
//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)

import storeData  from './Store/vueindex.js';
const store = new Vuex.Store(
	storeData
)


//support moment js
import {filter} from './filter_format'


//suport Editor
import 'v-markdown-editor/dist/index.css';
import Editor from 'v-markdown-editor'
// global register
Vue.use(Editor);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    store,
});
