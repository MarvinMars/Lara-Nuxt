<template>
    <div class="project__screenshot project__screenshot--inverted"
         :style="{ backgroundImage: background_image }">
        <div class="container">
            <div class="devices">
                <div class="row" v-if="top_block">
                    <div class="text col-xl-8 col-lg-12">
                        <h2 v-if="top_block.title" v-html="top_block.title"></h2>
                        <div v-if="top_block.description" v-html="top_block.description"></div>
                    </div>
                    <div class="images col-xl-4 col-lg-12">
                        <div class="iphone-mask">
                            <img v-if="top_image" :src="top_image" alt="">
                        </div>
                    </div>
                </div>
                <div class="screens" v-if="screen_images">
                    <img v-for="image in screen_images" v-if="image" :src="image" alt="">
                </div>
                <div class="screen-with-text" v-if="full_width_block && (full_width_block.title || full_width_block.description || full_width_block.image)" >
                    <div class="title">
                        <h3 v-if="full_width_block.title" v-html="full_width_block.title"></h3>
                        <div v-if="full_width_block.description" v-html="full_width_block.description"></div>
                    </div>
                    <div class="image">
                        <img v-if="full_width_block.image" :src="full_width_block.image" alt="">
                    </div>
                </div>
                <div class="screen-with-text columns" v-if="bottom_block && (bottom_block.image || bottom_block.title || bottom_block.description)">
                    <div class="row">
                        <div class="image col-lg-6 col-sm-12">
                            <img v-if="bottom_block.image" :src="bottom_block.image" alt="">
                        </div>
                        <div class="title col-lg-6 col-sm-12">
                            <h3 v-if="bottom_block.title" v-html="bottom_block.title"></h3>
                            <div v-if="bottom_block.description" v-html="bottom_block.description"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, isObject, isArray} from "lodash";

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
            background_image: function () {
                return 'url("' + objGet(this.data, 'fields.background') + '")';
            },

            /* need fix */
            top_image: function () {
                return objGet(this.data, 'fields.top_block.image');
            },

            top_block: function () {
                return this.sortBlocks(objGet(this.data, 'fields.top_block'));
            },
            full_width_block: function () {
                return this.sortBlocks(objGet(this.data, 'fields.full_width_block'));
            },
            bottom_block: function () {
                return this.sortBlocks(objGet(this.data, 'fields.bottom_block'));
            },
            screen_images: function () {
                let screen_images = [];
                if (isArray(objGet(this.data, 'fields.screen_images'))) {
                    screen_images = this.data.fields.screen_images.map(screen_image => {
                        return objGet(screen_image, 'image');
                    })
                }
                return screen_images;
            }

        },
        methods: {
            sortBlocks(block) {
                if (isObject(block)) {
                    return {
                        description: objGet(block, 'description'),
                        image: objGet(block, 'image'),
                        title: objGet(block, 'title'),
                    };
                }
                return {};
            }
        }
    }
</script>
