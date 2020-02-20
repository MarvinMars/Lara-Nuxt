<template>
    <div class="project__results">
        <div class="container">
            <div class="row">
                <div class="text col-lg-6 col-sm-12">
                    <h2 v-if="title" v-html="title"></h2>
                    <div v-if="content" v-html="content"></div>
                    <a v-if="link_url || link_label" :href="link_url" target="_blank" rel="noopener">
                        <span>
                            <small :data-hover="link_label" v-text="link_label"></small>
                        </span>
                    </a>
                </div>
                <div class="screens col-lg-6 col-sm-12">
                    <img v-if="tablet_screen_image" :src="tablet_screen_image" alt="">
                    <div class="iphone-mask" v-if="mobile_screen_image">
                        <img v-lazy="mobile_screen_image" alt="">
                    </div>
                </div>
            </div>
            <div class="percents" v-if="percentage">
                <span v-if="percentage.color || percentage.value" :style="{color: percentage.color }"
                      v-text="percentage.value"></span>
                <img v-if="percentage.icon" :src="percentage.icon" alt="">
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, isObject} from "lodash";

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
            title: function () {
                return objGet(this.data, 'fields.title');
            },
            content: function () {
                return objGet(this.data, 'fields.content');
            },
            mobile_screen_image: function () {
                return objGet(this.data, 'fields.mobile_screen_image') || false;
            },
            tablet_screen_image: function () {
                return objGet(this.data, 'fields.tablet_screen_image');
            },
            link_label: function () {
                return objGet(this.data, 'fields.link_label');
            },
            link_url: function () {
                return objGet(this.data, 'fields.link_url') || '';
            },
            percentage: function () {
                let percentage = objGet(this.data, 'fields.percentage');
                if (isObject(percentage)) {
                    return {
                        color: objGet(percentage, 'color'),
                        icon: objGet(percentage, 'icon'),
                        value: objGet(percentage, 'value')
                    };
                }
                return {};
            },

        }
    }
</script>
