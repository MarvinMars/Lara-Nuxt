<template>
    <div class="project__partnership"
         :style="{ backgroundImage: background_image }">
        <div class="container">
            <div class="row">
                <div class="image col-lg-5 col-sm-12">
                    <div :class="imageMask" v-if="image">
                        <img v-lazy="image">
                    </div>
                </div>
                <div class="text col-lg-7 col-sm-12">
                    <h2 v-if="title" v-html="title"></h2>
                    <div class="image image--mobile col-lg-5 col-sm-12">
                        <div :class="imageMask" v-if="image">
                            <img v-lazy="image">
                        </div>
                    </div>
                    <p v-if="content" v-html="content"></p>
                </div>
            </div>
        </div>
        <div class="percents" v-if="percentage">
            <span :style="{color: percentage_color}" v-if="percentage_value" v-text="percentage_value"></span>
            <img v-if="percentage_icon" :src="percentage_icon" alt="">
        </div>
    </div>
</template>

<script>
    import {get as objGet, isArray} from "lodash";

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
                return 'url("' + (objGet(this.data, 'fields.background_image')) + '")';
            },
            title: function () {
                return objGet(this.data, 'fields.title');
            },
            content: function () {
                return objGet(this.data, 'fields.content');
            },
            image: function () {
                return objGet(this.data, 'fields.image');
            },
            imageMask: function () {
                return objGet(this.data, 'fields.mask')
            },
            percentage: function () {
                return objGet(this.data, 'fields.percentage');
            },
            percentage_color: function () {
                return objGet(this.data, 'fields.percentage.color');
            },
            percentage_icon: function () {
                return objGet(this.data, 'fields.percentage.icon');
            },
            percentage_value: function () {
                return objGet(this.data, 'fields.percentage.value');
            },
        }
    }
</script>


