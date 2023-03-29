<template>
    <div v-if="threads" v-for="thread in threads" :key="threads.id">
        <router-link :to="{ name: 'dashboardViewRedditPost', params: { id: 0 } }">{{ thread.title }}</router-link>
    </div>
</template>
<script>
export default {
    data() {
        return {
            threads: [],
        };
    },
    created() {
        this.threads = [{
            title: "dit is de titel van de thread",
            author: "dit is de naam van de author",
            karma: "dit is de karma",
        },
        {
            title: "dit is de titel van de thread",
            author: "dit is de naam van de author",
            karma: "dit is de karma",
        },
        {
            title: "dit is de titel van de thread",
            author: "dit is de naam van de author",
            karma: "dit is de karma",
        },
        ];
    }
}
</script>