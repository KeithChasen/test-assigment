require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import {routes} from './routes/routes';
import StoreData from './store';
import MainApp from './components/MainApp.vue';
import {bootstrap} from './core'
import Vuetify from 'vuetify'

import 'materialize-css/dist/css/materialize.min.css';
import 'materialize-css/dist/js/materialize.min'

Vue.use(Vuetify)
Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes,
    mode: 'history'
});

bootstrap(store, router);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        MainApp
    }
});
