import '../bootstrap';
import {createApp} from 'vue';
import App from '@/components/App.vue';
import router from '@/router/index';

import { createPinia } from 'pinia';

const pinia=createPinia();

const el=document.getElementById('app');
const props={
    name: el.getAttribute('data-name'),
    id:el.getAttribute('data-i'),
};
const app = createApp(App,props);
app.use(pinia);
app.use(router);
app.mount('#app');