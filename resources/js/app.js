import Vue from 'vue';

import Vuetify from 'vuetify';
import wysiwyg from "vue-wysiwyg";
import VueMask from 'v-mask'
import VueHighcharts from 'vue-highcharts';


window.Vue = require('vue');

Vue.use(VueHighcharts);
Vue.use(wysiwyg, {}); // config is optional. more below
Vue.use(Vuetify);
Vue.use(VueMask)

require('./../../Modules/Core/Resources/js/app');
require('./../../Modules/ManageUser/Resources/js/app');

const vuetify = new Vuetify({
	icons: {
    	iconfont: 'mdi',
  	},
})

const app = new Vue({
    vuetify,
}).$mount('#page-content');