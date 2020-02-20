<template>
    <section class="news__hero" :style="{backgroundImage:backgroundImageUrl}">
        <div class="container">
            <div class="text">
                <time v-if="published_at">{{ published_at }}</time>
                <h2>
                    <nuxt-link v-if="link || preview_title" :to="link" v-html="preview_title"></nuxt-link>
                </h2>
                <p v-if="preview_description" v-html="preview_description"></p>
                <nuxt-link :to="link" class="view-post">
                    <span>
                        <small data-hover="read article">read article</small>
                    </span>
                </nuxt-link>
            </div>
        </div>
    </section>
</template>

<script>
    import {get as objGet, isArray, isObject} from "lodash";

    export default {
        name: "news__hero",
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            },
        },
        computed: {
            published_at: function () {
                return objGet(this.data, 'published_at_format');
            },
            backgroundImageUrl: function () {
                return 'url("' + (this.main_block.image || '') + '")';
            },
            link: function () {
                return '/news/' + (this.data.slug || '');
            },
            main_block: function () {
                let main_block = this.data.blocks.find(x => x.name === 'post_template').fields;
                return main_block || '';
            },
            description: function () {
                return this.main_block.description || '';
            },
            title: function () {
                return this.main_block.title || '';
            },
            preview_description: function () {
                return this.main_block.preview_description || '';
            },
            preview_title: function () {
                return this.main_block.preview_title || '';
            },
        }
    }
</script>
