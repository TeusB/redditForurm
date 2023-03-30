// vue-router 
import { createRouter, createWebHistory } from 'vue-router';

//mainApps
import homeApp from './home/app.vue';
import dashboardApp from './dashboard/app.vue';

//home pages
import homeIndex from './home/views/index.vue';

//dashboard pages
import dashboardViewRedditPost from './dashboard/views/viewRedditPost.vue';
import dashboardUpdateRedditPost from './dashboard/views/updateRedditPost.vue';
import dashboardCreateRedditPost from './dashboard/views/createRedditPost.vue';
import dashboardEvents from './dashboard/views/events.vue';
import dashboardChats from './dashboard/views/chats.vue';

import dashboardIndex from './dashboard/views/index.vue';

//routes
const routes = [
    //home
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
    //dashboard
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
            {
                path: 'events',
                component: dashboardEvents,
                name: 'dashboardEvents',
            },
            {
                path: 'chats',
                component: dashboardChats,
                name: 'dashboardChats',
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