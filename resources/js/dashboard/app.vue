<!-- dashboardApp -->
<template>
    <div style="max-width: 100vw; height: 95vh" class="row">
        <div style="box-sizing: border-box; border-right: 2px solid lightgray" class="col-lg-3">
            <navbar>
            </navbar>
            <sidebar></sidebar>
        </div>
        <div class="col-lg-9">
            <router-view v-slot="{ Component }">
                <transition name="nested" mode="out-in">
                        <component :is="Component">
                        </component>
                </transition>
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

<style>
.nested-enter-active,
.nested-leave-active {
    transition: all 0.2s ease-in-out;
}

.nested-enter-active {
    transition-delay: 0.20s;
}

.nested-leave-active {
    transition-delay: 0.20s;
}

.nested-enter-from,
.nested-leave-to {
    /* transform: translateY(30px); */
    opacity: 0;
}

.submitButton {
    background: linear-gradient(90deg, rgba(120, 115, 200, 1) 0%, rgba(181, 29, 35, 1) 6%, rgba(0, 212, 255, 1) 100%);
}

.buttonText {
    background: transparent;
}
</style>
