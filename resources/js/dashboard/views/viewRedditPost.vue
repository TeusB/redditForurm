<template>
    <div class="table-container" v-if="thread">
        <h1>thread</h1>
        Title: {{ thread.data?.children.data.title }}
        Author: {{ thread.data?.children.data.author }}
    </div>
</template>
<script>
import axios from '../../axios.js';
export default {
    data() {
        return {
            thread: [],
        };
    },
    created() {
        axios.get('thread/' + this.$route.params.id, {
            headers: {
                Authorization: `Bearer ${sessionStorage.getItem('API_TOKEN')}`
            }
        }).then(response => {
            console.log(response);
            this.thread = {
                "kind": "Listing",
                "data": {
                    "modhash": "abcdefg",
                    "dist": 1,
                    "children":
                    {
                        "kind": "t3",
                        "data": {
                            "title": "What is the meaning of life?",
                            "author": "TheMeaningFinder",
                            "created_utc": 1462867200,
                            "num_comments": 42,
                            "score": 100,
                            "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                            "selftext": "I've been searching for the meaning of life...",
                            "subreddit": "AskReddit"
                        }
                    },
                    "after": null,
                    "before": null
                }
            };
        }).catch(error => {
            console.log(error);
            this.thread = {
                "kind": "Listing",
                "data": {
                    "modhash": "abcdefg",
                    "dist": 1,
                    "children":
                    {
                        "kind": "t3",
                        "data": {
                            "title": "What is the meaning of life?",
                            "author": "TheMeaningFinder",
                            "created_utc": 1462867200,
                            "num_comments": 42,
                            "score": 100,
                            "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                            "selftext": "I've been searching for the meaning of life...",
                            "subreddit": "AskReddit"
                        }
                    },
                    "after": null,
                    "before": null
                }
            };
        });
    }
}
</script>