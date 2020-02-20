<template>
    <section class="text-banner"
             :style="{ backgroundImage: backgroundImageUrl }">
        <div class="container">
            <div class="text">
                <h2>{{ title }}</h2>
                <template v-if="content">
                    <span v-html="content"></span>
                </template>
            </div>
        </div>
    </section>
</template>

<script>
    import {get as objGet, isArray, isObject} from "lodash";

    export default {
        name: "secondHeroBanner",
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
            title: function () {
                return objGet(this.data, 'fields.title');
            },
        }
    }
</script>
