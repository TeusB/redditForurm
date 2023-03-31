<template>
    <button class="btn btn-dark" @click="redditRedirect">Reddit account</button>
</template>
<script>
export default {
    methods: {
        redditRedirect() {
            window.open(
                "https://www.reddit.com/api/v1/authorize?client_id=lA5B2H5N7eB5vLyrWMp5Hw&response_type=code&state=test&redirect_uri=http://127.0.0.1:8000/api/loginCallback&duration=permanent&scope=save,submit,identity", "_blank");
        }
    }
}
</script>