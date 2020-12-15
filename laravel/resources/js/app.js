window.Vue = require('vue');
import {vueBaberrage} from 'vue-baberrage';
Vue.use(vueBaberrage);

require('./bootstrap');

Vue.component('danmu-component', require('./components/DanmuComponent.vue').default);
