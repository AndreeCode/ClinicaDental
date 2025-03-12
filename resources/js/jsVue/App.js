import '../bootstrap';
import {createApp} from 'vue';
import App from '@/components/App.vue'
import router from '@/router/index'
const el=document.getElementById('app');

const app = createApp(App,{
    name: el.getAttribute('data-name'),
});
app.use(router);
app.mount('#app');