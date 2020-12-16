window.Vue = require('vue');
import {vueBaberrage} from 'vue-baberrage';
Vue.use(vueBaberrage);

Vue.component('danmu-component', require('./components/DanmuComponent.vue'));

new Vue({
    el: 'danmu-component'
});
