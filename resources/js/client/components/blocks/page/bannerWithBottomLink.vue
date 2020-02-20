<template>
    <section class="animated">
        <section class="section services-banner"
                 :style="{ backgroundImage: backgroundImageUrl }">
            <div class="container">
                <div class="text">
                    <h2>{{ title }}</h2>
                    <span v-if="content" v-html="content"></span>
                </div>
                <div class="link">
                    <a :href="buttonLinkUrl" v-if="buttonLinkLabel && buttonLinkUrl" target="_blank" rel="noopener">
                        <span><small :data-hover="buttonLinkLabel">{{ buttonLinkLabel }}</small></span>
                    </a>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    import {get as objGet, isArray, isObject} from "lodash";

    export default {
        name: "bannerWithBottomLink",
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        computed: {
            title: function () {
                return objGet(this.data, 'fields.title');
            },
            content: function () {
                return objGet(this.data, 'fields.content');
            },
            backgroundImageUrl: function () {
                return 'url("' + (objGet(this.data, 'fields.background')) + '")';
            },
            buttonLinkLabel: function () {
                return objGet(this.data, 'fields.button_link_label');
            },
            buttonLinkUrl: function () {
                return objGet(this.data, 'fields.button_link_url');
            }
        }
    }
</script>
