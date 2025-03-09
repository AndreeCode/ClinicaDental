import {createRouter,createWebHistory} from 'vue-router';

import home from '@/components/homePage.vue';
import registrarCita from '@/components/registrarCita.vue';
import historial from '@/components/historial.vue';
import usuario from '@/components/usuario.vue';

const routes=[
    {
        path: '/dashboard/',
        component: home,
    },
    {
        path: '/dashboard/citar',
        component: registrarCita,
    },
    {
        path: '/dashboard/usuario',
        component: usuario,
    },
    {
        path: '/dashboard/historial',
        component: historial,
    },
];
const router=createRouter({
    history:createWebHistory(),
    routes,
});
export default router;