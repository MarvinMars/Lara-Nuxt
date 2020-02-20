<template>
    <section class="goal">
        <div class="goal__image"
             :style="{ backgroundImage: backgroundImageUrl }"></div>
        <div class="goal__text">
            <h2>{{ title }}</h2>
            <span v-if="content" v-html="content"></span>
        </div>
    </section>
</template>

<script>
    import {get as objGet, isArray, isObject} from "lodash";

    export default {
        name: "goal",
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
        }
    }
</script>
