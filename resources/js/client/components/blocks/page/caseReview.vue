<template>
    <section class="case-review">
        <div class="case-review__text">
            <blockquote>
                <p>{{ quote }}</p>
            </blockquote>
            <div class="author">
                <span v-if="author">{{ author }}</span>
                <small v-if="authorPosition">{{ authorPosition }}</small>
            </div>
        </div>
        <div class="case-review__image"
             :style="{ backgroundImage: backgroundImageUrl }">
            <img v-if="logoUrl" :src="logoUrl" :alt="logoAlt"/>
            <nuxt-link :to="linkUrl" v-if="linkUrl && linkLabel">
                <span><small :data-hover="linkLabel">{{ linkLabel }}</small></span>
            </nuxt-link>
        </div>
    </section>
</template>

<script>
    import {get as objGet, isObject, isArray} from "lodash";

    export default {
        name: "caseReview",
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        computed: {
            backgroundImageUrl: function () {
                return 'url("' + (objGet(this.data, 'fields.background_image')) + '")';
            },
            logoUrl: function () {
                return objGet(this.data, 'fields.logo_image');
            },
            logoAlt: function () {
                return objGet(this.data, 'fields.logo_alt');
            },
            quote: function () {
                return objGet(this.data, 'fields.quote');
            },
            author: function () {
                return objGet(this.data, 'fields.author_name');
            },
            authorPosition: function () {
                return objGet(this.data, 'fields.author_position');
            },
            linkUrl: function () {
                return objGet(this.data, 'fields.link_url');
            },
            linkLabel: function () {
                return objGet(this.data, 'fields.link_label');
            },
        }
    }
</script>
