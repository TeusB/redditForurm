<template>
    <div style="min-width: min-content">
        <div style="margin: 8px; box-sizing: border-box" class="text-center row" v-if="threads"
            v-for="(thread, index) in threads" :key="index">
            <div class="col-lg-3 text-center">
                <div style="display: flex; justify-content: center; position: relative; left: calc(-50px + 3vw); min-width: min-content;"
                    class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush"
                        viewBox="0 0 16 16">
                        <path
                            d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z" />
                    </svg>
                    <span style="padding-left: 5px">Art</span>
                </div>
            </div>
            <div style="position: relative; top: 7px" class="col-lg-7 text-left">
                <router-link style="color: black; font-weight: 700"
                    :to="{ name: 'dashboardViewRedditPost', params: { id: thread.id } }">{{
                        thread.title
                    }}
                </router-link>
            </div>
            <div @click="like(index)" style="position: relative; top: 7px" class="col-lg-2 text-right">
                <span>{{ thread.likes }}
                </span>
                <span>
                </span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" :fill="thread.liked ? 'currentcolor' : 'red'
    " class="bi bi-balloon-heart" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="m8 2.42-.717-.737c-1.13-1.161-3.243-.777-4.01.72-.35.685-.451 1.707.236 3.062C4.16 6.753 5.52 8.32 8 10.042c2.479-1.723 3.839-3.29 4.491-4.577.687-1.355.587-2.377.236-3.061-.767-1.498-2.88-1.882-4.01-.721L8 2.42Zm-.49 8.5c-10.78-7.44-3-13.155.359-10.063.045.041.089.084.132.129.043-.045.087-.088.132-.129 3.36-3.092 11.137 2.624.357 10.063l.235.468a.25.25 0 1 1-.448.224l-.008-.017c.008.11.02.202.037.29.054.27.161.488.419 1.003.288.578.235 1.15.076 1.629-.157.469-.422.867-.588 1.115l-.004.007a.25.25 0 1 1-.416-.278c.168-.252.4-.6.533-1.003.133-.396.163-.824-.049-1.246l-.013-.028c-.24-.48-.38-.758-.448-1.102a3.177 3.177 0 0 1-.052-.45l-.04.08a.25.25 0 1 1-.447-.224l.235-.468ZM6.013 2.06c-.649-.18-1.483.083-1.85.798-.131.258-.245.689-.08 1.335.063.244.414.198.487-.043.21-.697.627-1.447 1.359-1.692.217-.073.304-.337.084-.398Z" />
                </svg>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            threads: [],
        };
    },
    methods: {
        like(index) {
            if (this.threads[index].liked) {
                this.threads[index].liked = false;
                this.threads[index].likes++;
            } else {
                this.threads[index].liked = true;
                this.threads[index].likes--;
            }
        },
    },
    created() {
        this.threads = [{
            title: "Kunsttentoonstelling in het theater",
            author: "dit is de naam van de author",
            karma: "dit is de karma",
            id: 1,
            likes: 15,
            liked: true,
        },
        {
            title: "Theateroptreden met live muziek: wat vond je ervan?",
            author: "dit is de naam van de author",
            karma: "dit is de karma",
            id: 2,
            likes: 22,
            liked: false,
        },
        {
            title: "Kunsttentoonstelling in Schouwburg Tilburg",
            author: "dit is de naam van de author",
            karma: "dit is de karma",
            id: 3,
            likes: 12,
            liked: true,
        },
        ];
    }
}
</script>
