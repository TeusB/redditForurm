import { createRouter, createWebHistory } from 'vue-router';

import homeApp from './home/app.vue';
import dashboardApp from './dashboard/app.vue';

import homeIndex from './home/views/index.vue';

import dashboardViewRedditPost from './dashboard/views/viewRedditPost.vue';
import dashboardUpdateRedditPost from './dashboard/views/updateRedditPost.vue';
import dashboardCreateRedditPost from './dashboard/views/createRedditPost.vue';

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
            {
                path: 'createRedditPost',
                component: dashboardCreateRedditPost,
                name: 'dashboardCreateRedditPost',
            },
            {
                path: 'viewRedditPost/:id',
                component: dashboardViewRedditPost,
                name: 'dashboardViewRedditPost',
            },
            {
                path: 'updateRedditPost/:id',
                component: dashboardUpdateRedditPost,
                name: 'dashboardUpdateRedditPost',
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