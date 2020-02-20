<template>
    <div class="project__screenshot">
        <div class="container">
            <div class="homepage">
                <div class="row">
                    <div class="text col-lg-6 col-sm-12">
                        <h2 v-if="title" v-html="title"></h2>
                        <h3 v-if="subtitle" v-html="subtitle"></h3>
                        <div class="image image--mobile col-lg-6 col-sm-12">
                            <img v-if="image || image_alt" v-lazy="image" :alt="image_alt">
                        </div>
                        <p v-if="description" v-html="description"></p>
                    </div>
                    <div class="image col-lg-6 col-sm-12">
                        <img v-if="image || image_alt" v-lazy="image" :alt="image_alt">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, isArray, isObject} from "lodash";

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
            subtitle: function () {
                return objGet(this.data, 'fields.subtitle');
            },
            description: function () {
                return objGet(this.data, 'fields.description');
            },
            image: function () {
                return objGet(this.data, 'fields.image');
            },
            image_alt: function () {
                return objGet(this.data, 'fields.image_alt');
            }
        }
    }
</script>
