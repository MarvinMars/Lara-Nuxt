<template>
    <div class="inner_hero">
        <div class="background-image"
             :style="{ backgroundImage: backgroundImageUrl }">
        </div>
        <div class="container">
            <div class="text">
                <small v-if="preTitle">{{ preTitle }}</small>
                <h1 v-if="title" v-html="title"></h1>
                <span v-html="content"></span>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, isObject, isArray} from "lodash";

    export default {
        name: "heroBanner",
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
            content: function () {
                return objGet(this.data, 'fields.content');
            },
            preTitle: function () {
                return objGet(this.data, 'fields.pretitle');
            },
            title: function () {
                return objGet(this.data, 'fields.title');
            },
        }
    }
</script>
