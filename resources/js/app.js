require('./bootstrap');

window.Vue = require('vue').default;

import store from './store'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

Vue.component('left-side', require('./components/leftSide.vue').default);
Vue.component('right-side', require('./components/rightSide.vue').default);



const app = new Vue({
    el: '#app',
    store
});
