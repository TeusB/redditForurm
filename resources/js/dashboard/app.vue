<!-- dashboardApp -->
<template>
    <div class="row">
        <div class="col-lg-3">
            <navbar>
            </navbar>
            <sidebar></sidebar>
        </div>
        <div class="col-lg-9">

        </div>
    </div>

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
