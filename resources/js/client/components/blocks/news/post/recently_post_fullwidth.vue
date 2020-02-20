<template>
    <div>
        <div class="inner">
            <div class="image" :style="{ backgroundImage:backgroundImageUrl }"></div>
            <div class="caption">
                <nuxt-link :to="link" v-if="preview_title || link" v-html="preview_title"></nuxt-link>
                <time v-if="published_at" v-html="published_at"></time>
                <p v-if="preview_description" v-html="preview_description"></p>
            </div>
            <nuxt-link :to="link" class="view-post">
                <span>
                    <small data-hover="read article">read article</small>
                </span>
            </nuxt-link>
        </div>
    </div>
</template>

<script>
    import {isArray, isObject} from "lodash";

    export default {
        name: "recently_post_fullwidth",
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            },
        },
        computed: {
            main_block: function () {
                let main_block = this.data.blocks.find(x => x.name === 'post_template').fields;
                return main_block || '';
            },
            backgroundImageUrl: function () {
                return 'url("' + (this.main_block.image || '') + '")';
            },
            published_at: function () {
                return this.data.published_at_format || '';
            },
            link: function () {
                return '/news/' + (this.data.slug || '');
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
