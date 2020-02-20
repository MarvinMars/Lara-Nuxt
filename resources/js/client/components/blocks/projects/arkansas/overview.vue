<template>
    <div class="project__overview"
         :style="{ backgroundImage: backgroundImageUrl }">
        <div class="container">
            <div class="numbers">
                <h2>{{ title }}</h2>
                <div class="row">
                    <div class="numbers__text col-lg-6 col-sm-12" v-html="description"></div>
                    <div class="numbers__list col-lg-6 col-sm-12">
                        <div class="inner" v-if="numbers">
                            <div class="item" v-for="number in numbers">
                                <div class="heading">
                                    <img :src="number.image" alt="">
                                    <span>{{ number.title }}</span>
                                </div>
                                <p>{{ number.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="screenshot">
                <div class="row">
                    <div class="screenshot__image col-lg-6 col-sm-12">
                        <img v-lazy="screenshot_image" v-if="screenshot_image">
                    </div>
                    <div class="screenshot__text col-lg-6 col-sm-12">
                        <h2 v-if="screenshot_title">{{ screenshot_title }}</h2>
                        <div v-html="screenshot_description"></div>
                    </div>
                </div>
            </div>
            <div class="table">
                <div class="row">
                    <div class="table__text col-lg-6 col-sm-12">
                        <h2>{{ bottom_block_title }}</h2>
                        <div v-html="bottom_block_content"></div>
                    </div>
                    <div class="table__object col-lg-6 col-sm-12">
                        <div class="inner" v-if="bottom_block_table">
                            <div class="table__head" v-if="bottom_block_table.heading">
                                <span v-for="heading in bottom_block_table.heading">{{ heading.title }}</span>
                            </div>
                            <div class="table__body" v-if="bottom_block_table.rows">
                                <div class="item" v-for="row in bottom_block_table.rows">
                                    <template v-for="item in row.row">
                                        <span :class="item.type">{{ item.value }}</span>
                                    </template>
                                </div>
                            </div>
                            <div class="caption">
                                <span>{{ bottom_block_table.caption_title }}</span>
                                <small>{{ bottom_block_table.caption_subtitle }}</small>
                            </div>
                        </div>
                    </div>
                </div>
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
            backgroundImageUrl: function () {
                return 'url("' + (objGet(this.data, 'fields.background')) + '")';
            },
            title: function () {
                return objGet(this.data, 'fields.title');
            },
            description: function () {
                return objGet(this.data, 'fields.description');
            },
            numbers: function () {
                let data = [];

                if (objHas(this.data, 'fields.numbers')) {
                    data = this.data.fields.numbers.map(number => {
                        return {
                            image: number.image || null,
                            title: number.title || null,
                            description: number.description || null,
                        }
                    })
                }

                return data;
            },
            screenshot_image: function () {
                return objGet(this.data, 'fields.screenshot_image');
            },
            screenshot_title: function () {
                return objGet(this.data, 'fields.screenshot_title');
            },
            screenshot_description: function () {
                return objGet(this.data, 'fields.screenshot_description');
            },
            bottom_block_title: function () {
                return objGet(this.data, 'fields.bottom_block_title');
            },
            bottom_block_content: function () {
                return objGet(this.data, 'fields.bottom_block_content');
            },
            bottom_block_table: function () {
                if (!objHas(this.data, 'fields.bottom_block_table')) {
                    return false;
                }

                return this.data.fields.bottom_block_table;
            },

        }
    }
</script>
