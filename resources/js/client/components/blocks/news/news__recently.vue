<template>
    <section class="news__recently">
        <div class="container">
            <div class="list">
                <h2>Recently</h2>
                <div class="row" v-if="posts">
                    <template v-for="(post, index) in posts">
                        <template v-if="index !== 0 && index % 4 === 0">
                            <recently_post_fullwidth
                                    class="post post--fullwidth col-lg-12 col-sm-12 "
                                    :data="post">
                            </recently_post_fullwidth>
                        </template>
                        <template v-else>
                            <recently_post
                                    class="post col-lg-6 col-sm-12 "
                                    :data="post">
                            </recently_post>
                        </template>
                    </template>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import {get as objGet, isArray, isObject} from "lodash";
    import recently_post from "./post/recently_post.vue";
    import recently_post_fullwidth from "./post/recently_post_fullwidth.vue";

    export default {
        name: "news__recently",
        components: {
            recently_post,
            recently_post_fullwidth
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
                return objGet(this.data, 'title');
            },
            published_at: function () {
                return objGet(this.data, 'published_at_format');
            },
            posts: function () {
                if (!isArray(this.data)) {
                    return [];
                }

                return this.data;
            },
        }
    }
</script>
