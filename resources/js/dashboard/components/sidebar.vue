<template>
    <div v-for="child in threads.data?.children" :key="child.data.id">
        <router-link :to="{ name: 'dashboardViewRedditPost', params: { id: 0 } }">{{ child.data.title }}</router-link>
    </div>
</template>
<script>
import axios from '../../axios.js';
export default {
    data() {
        return {
            threads: [],
        };
    },
    created() {
        axios.get('thread/' + this.$route.params.id, {
            headers: {
                Authorization: `Bearer ${sessionStorage.getItem('API_TOKEN')}`
            }
        }).then(response => {
            console.log(response);
            this.threads = {
                "kind": "Listing",
                "data": {
                    "modhash": "abcdefg",
                    "dist": 1,
                    "children": [
                        {
                            "kind": "t3",
                            "data": {
                                "title": "What is the meaning of life1?",
                                "author": "TheMeaningFinder",
                                "created_utc": 1462867200,
                                "num_comments": 42,
                                "score": 100,
                                "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                                "selftext": "I've been searching for the meaning of life...",
                                "subreddit": "AskReddit"
                            }
                        }, {
                            "kind": "t3",
                            "data": {
                                "title": "What is the meaning of life2?",
                                "author": "TheMeaningFinder",
                                "created_utc": 1462867200,
                                "num_comments": 42,
                                "score": 100,
                                "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                                "selftext": "I've been searching for the meaning of life...",
                                "subreddit": "AskReddit"
                            }
                        }, {
                            "kind": "t3",
                            "data": {
                                "title": "What is the meaning of life3?",
                                "author": "TheMeaningFinder",
                                "created_utc": 1462867200,
                                "num_comments": 42,
                                "score": 100,
                                "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                                "selftext": "I've been searching for the meaning of life...",
                                "subreddit": "AskReddit"
                            }
                        }, {
                            "kind": "t3",
                            "data": {
                                "title": "What is the meaning of life4?",
                                "author": "TheMeaningFinder",
                                "created_utc": 1462867200,
                                "num_comments": 42,
                                "score": 100,
                                "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                                "selftext": "I've been searching for the meaning of life...",
                                "subreddit": "AskReddit"
                            }
                        },
                    ],
                    "after": null,
                    "before": null
                }
            };
        }).catch(error => {
            console.log(error);
            this.threads = {
                "kind": "Listing",
                "data": {
                    "modhash": "abcdefg",
                    "dist": 1,
                    "children": [
                        {
                            "kind": "t3",
                            "data": {
                                "title": "What is the meaning of life1?",
                                "author": "TheMeaningFinder",
                                "created_utc": 1462867200,
                                "num_comments": 42,
                                "score": 100,
                                "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                                "selftext": "I've been searching for the meaning of life...",
                                "subreddit": "AskReddit"
                            }
                        }, {
                            "kind": "t3",
                            "data": {
                                "title": "What is the meaning of life2?",
                                "author": "TheMeaningFinder",
                                "created_utc": 1462867200,
                                "num_comments": 42,
                                "score": 100,
                                "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                                "selftext": "I've been searching for the meaning of life...",
                                "subreddit": "AskReddit"
                            }
                        }, {
                            "kind": "t3",
                            "data": {
                                "title": "What is the meaning of life3?",
                                "author": "TheMeaningFinder",
                                "created_utc": 1462867200,
                                "num_comments": 42,
                                "score": 100,
                                "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                                "selftext": "I've been searching for the meaning of life...",
                                "subreddit": "AskReddit"
                            }
                        }, {
                            "kind": "t3",
                            "data": {
                                "title": "What is the meaning of life4?",
                                "author": "TheMeaningFinder",
                                "created_utc": 1462867200,
                                "num_comments": 42,
                                "score": 100,
                                "permalink": "/r/AskReddit/comments/4hxfl4/what_is_the_meaning_of_life/",
                                "selftext": "I've been searching for the meaning of life...",
                                "subreddit": "AskReddit"
                            }
                        },
                    ],
                    "after": null,
                    "before": null
                }
            };
        });
    }
}
</script>