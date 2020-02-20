<template>
    <div class="project__stories">
        <div class="container">
            <div class="thumbs">
                <div class="thumb" v-for="story in stories">
                    <a @click.prevent href="/" v-if="story">
                        <span class="sr-only">story</span>
                        <div class="inner">
                            <div class="image"
                                 v-if="story.image"
                                 :style="{ backgroundImage: story.image }"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="title">
                <h2 v-if="title" v-html="title"></h2>
                <p v-if="subtitle" v-html="subtitle"></p>
            </div>
            <div class="row">
                <div class="screen col-lg-5 col-sm-12">
                    <img v-if="mobile_preview_image" :src="mobile_preview_image" alt="">
                </div>
                <div class="text col-lg-7 col-sm-12" v-if="content" v-html="content"></div>
            </div>
        </div>
    </div>
</template>
<script>
    import {get as objGet, has as objHas, isArray, isObject} from "lodash";

    export default {
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        computed: {
            mobile_preview_image: function () {
                return objGet(this.data, 'fields.mobile_preview_image');
            },
            title: function () {
                return objGet(this.data, 'fields.title');
            },
            subtitle: function () {
                return objGet(this.data, 'fields.subtitle');
            },
            content: function () {
                return objGet(this.data, 'fields.content');
            },
            stories: function () {
                let stories = [];
                if (objHas(this.data, 'fields.stories')) {
                    stories = this.data.fields.stories.map(story => {
                        return {
                            image: 'url("' + (story.image || '') + '")',
                        }
                    })
                }

                return stories;
            },
        }
    }
</script>
