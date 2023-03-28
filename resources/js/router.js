import { createRouter, createWebHistory } from 'vue-router';
import homeApp from './home/app.vue';
import dashboardApp from './dashboard/app.vue';

import homeIndex from './home/views/index.vue';
import dashboardIndex from './dashboard/views/index.vue';


const routes = [
    {
        path: '/',
        name: 'homeApp',
        component: homeApp,
        children: [
            {
                path: '',
                component: homeIndex,
                name: 'homeIndex',
            },
        ]
    },
    {
        path: '/dashboard',
        name: 'homeDashboard',
        component: dashboardApp,
        children: [
            {
                path: '',
                component: dashboardIndex,
                name: 'dashboardIndex',
            },
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {

    next();
});

export { router };