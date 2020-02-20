<template>
    <section class="news">
        <section class="news__hero" :style="{backgroundImage: backgroundImageUrl}">
            <div class="container">
                <div class="text">
                    <time v-if="published_at" v-text="published_at"></time>
                    <h2 v-html="title || preview_title"></h2>
                    <p v-if="preview_description" v-html="preview_description"></p>
                </div>
            </div>
        </section>
        <section class="news__top">
            <div class="container">
                <div class="list">
                    <div class="post">
                        <div class="row">
                            <div class="post__caption col-lg-12 col-sm-12" v-if="description"
                                 v-html="description"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    import {isArray, isObject} from "lodash";

    export default {
        name: "post_template",
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            },
            published_at: {
                type: String,
                default: () => {
                    return '';
                }
            }
        },
        computed: {
            backgroundImageUrl: function () {
                return 'url("' + (this.data.fields.image || '') + '")';
            },
            link: function () {
                return '/news/' + (this.data.slug || '');
            },
            preview_description: function () {
                return this.data.fields.preview_description || '';
            },
            preview_title: function () {
                return this.data.fields.preview_title || '';
            },
            description: function () {
                return this.data.fields.description || '';
            },
            title: function () {
                return this.data.fields.title || '';
            },
        },
    }
</script>
