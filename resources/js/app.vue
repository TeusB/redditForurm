<!-- main app -->
<template>
    <router-view v-slot="{ Component }">
        <component :is="Component">
        </component>
    </router-view>
</template>
<style>
html {
    background: linear-gradient(90deg, rgb(107 103 180) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
}
</style>