<template>
    <navbar>
    </navbar>
    <sidebar></sidebar>
    <router-view v-slot="{ Component }">
        <component :is="Component">
        </component>
    </router-view>
</template>

<script>
import sidebar from './components/sidebar.vue';
import navbar from './components/navbar.vue';
export default {
    name: 'App',
    components: {
        sidebar,
        navbar,
    },
};
</script>