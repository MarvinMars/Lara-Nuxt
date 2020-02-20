<template>
    <section class="news__top" v-if="posts">
        <div class="container">
            <div class="list">
                <h2>Top News</h2>
                <div class="post" v-for="(post, index) in posts">
                    <template v-if="index % 2 === 0">
                        <top_post_right :data="post">
                        </top_post_right>
                    </template>
                    <template v-else>
                        <top_post_left :data="post">
                        </top_post_left>
                    </template>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import {isArray, isObject} from "lodash";
    import top_post_left from "./post/top_post_left.vue";
    import top_post_right from "./post/top_post_right.vue";

    export default {
        name: "news__top",
        components: {
            top_post_left,
            top_post_right
        },
        props: {
            data: {
                type: Array,
                default: () => {
                    return [];
                }
            },
        },
        computed: {
            title: function () {
                return this.data.title || '';
            },
            posts: function () {
                if (!isArray(this.data)) {
                    return [];
                }

                return this.data.splice(0, 2);
            },
        }
    }
</script>
