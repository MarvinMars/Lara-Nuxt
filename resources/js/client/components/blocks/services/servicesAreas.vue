<template>
    <div class="services__areas">
        <div class="container-fluid">
            <div class="title">
                <div class="title_wrap">
                    <div class="inner">
                        <h2>{{ title }}</h2>
                        <div class="subtitle">
                            <h2>{{ afterAnimationTitle }}</h2>
                            <p class="areasTitleCaption" v-html="afterAnimationDescription"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list areasList" v-if="slides">
                <div class="inner">
                    <div class="item swiper-slide"></div>
                    <div class="item swiper-slide" v-for="slide in slides">
                        <div class="item_wrap">
                            <div class="heading">
                                <img :src="slide.image" :alt="slide.title" v-if="slide.image">
                                <span>{{ slide.title}}</span>
                            </div>
                            <div class="text" v-html="slide.content"></div>
                        </div>
                    </div>
                    <div class="item swiper-slide"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, has as objHas, isArray, isObject} from "lodash";

    export default {
        name: "servicesAreas",
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
            afterAnimationTitle: function () {
                return objGet(this.data, 'fields.after_animation_title');
            },
            afterAnimationDescription: function () {
                return objGet(this.data, 'fields.after_animation_description');
            },
            slides: function () {
                if (!objHas(this.data, 'fields.slides') || !isArray(this.data.fields.slides)) {
                    return [];
                }
                return this.data.fields.slides.map(slide => {
                    return {
                        image: slide.image || null,
                        title: slide.title || null,
                        content: slide.content || null
                    }
                })
            }
        }
    }
</script>

