<template>
    <div class="project__hero">
        <div class="background_image"
             :style="{ backgroundImage: backgroundImageUrl }">
        </div>
        <div class="meta">
            <h2 v-html="title"></h2>
            <div class="information">
                <div class="inner">
                    <div class="item" v-for="block in blocks" v-if="blocks">
                        <h3>{{ block.title }}</h3>
                        <div v-html="block.content"></div>
                    </div>
                    <div class="back" v-if="buttonLabel || buttonUrl">
                        <nuxt-link :to="buttonUrl">
                            {{ buttonLabel }}
                        </nuxt-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, has as objHas, isArray, isObject} from 'lodash';

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
            backgroundImageUrl: function () {
                return 'url("' + (objGet(this.data, 'fields.background')) + '")';
            },
            title: function () {
                return objGet(this.data, 'fields.title');
            },
            buttonLabel: function () {
                return objGet(this.data, 'fields.button_label');
            },
            buttonUrl: function () {
                return objGet(this.data, 'fields.button_url');
            },
            blocks: function () {
                let blocks = [];
                if (objHas(this.data, 'fields.information_blocks') && isArray(objGet(this.data, 'fields.information_blocks'))) {
                    blocks = this.data.fields.information_blocks.map(block => {
                        return {
                            title: block.title || '',
                            content: block.content || '',
                        }
                    })
                }

                return blocks;
            }
        }
    }
</script>
