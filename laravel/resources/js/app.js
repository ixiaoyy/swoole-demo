window.Vue = require('vue');
import {vueBaberrage} from 'vue-baberrage';
Vue.use(vueBaberrage);

// const vueBaberrage = request('vue-baberrage').vueBaberrage

// import DanmuComponent from './components/DanmuComponent.vue';
//
// export default {
//     name: 'app',
//     components: {
//         DanmuComponent
//     }
// }

Vue.component('danmu-component', require('./components/DanmuComponent.vue').default);
//
// Vue.component('danmu-component', {
//     template: '<li>这是个待办项</li>'
// });

// new Vue({
//     el: 'danmu-component'
// });
// new Vue({ el: '#app' })


// Vue.component('danmu-component', {
//     template: '<li>这是个待办项</li>'
// });
//
// new Vue({
//     el: 'danmu-component'
// });
