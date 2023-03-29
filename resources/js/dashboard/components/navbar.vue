<template>
    <RouterLink :to="{ name: 'dashboardIndex' }" exact-active-class="active" active-class="active">
        Home</RouterLink>
    <router-link :to="{ name: 'dashboardViewRedditPost', params: { id: 0 } }">View</router-link>
    <router-link :to="{ name: 'dashboardUpdateRedditPost', params: { id: 0 } }">Update</router-link>
    <RouterLink :to="{ name: 'dashboardCreateRedditPost' }">Create</RouterLink>
</template>
