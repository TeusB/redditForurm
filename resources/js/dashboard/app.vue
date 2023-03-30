<!-- dashboardApp -->
<template>
    <div style="max-width: 99vw; height: 95vh" class="row">
        <div style="box-sizing: border-box; border-right: 2px solid lightgray" class="col-lg-3">
            <navbar>
            </navbar>
            <sidebar></sidebar>
        </div>
        <div class="col-lg-9">
            <router-view v-slot="{ Component }">
                <component :is="Component">
                </component>
            </router-view>
        </div>
    </div>
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
