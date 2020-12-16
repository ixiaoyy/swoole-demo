// window.Vue = require('vue');
// import {vueBaberrage} from 'vue-baberrage';
// Vue.use(vueBaberrage);

// Vue.component('danmu-component', require('./components/DanmuComponent.vue'));
Vue.component('danmu-component', {
    template: '<li>这是个待办项</li>'
});

new Vue({
    el: 'danmu-component'
});
