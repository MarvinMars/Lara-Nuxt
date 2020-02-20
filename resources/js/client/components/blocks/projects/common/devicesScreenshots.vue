<template>
    <div class="project__screenshot">
        <div class="container">
            <div class="devices">
                <div class="row">
                    <div class="text col-xl-6 col-lg-12">
                        <h2 v-html="title"></h2>
                        <h3>{{ subtitle }}</h3>
                        <div v-html="description"></div>
                    </div>
                    <div class="images center col-xl-6 col-lg-12">
                        <div class="iphone-mask">
                            <img v-if="image" :src="image" alt="">
                        </div>
                    </div>
                </div>
                <div class="screens" v-if="devices">
                    <template v-for="device in devices">
                        <img v-if="device.image" :src="device.image">
                    </template>
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
            devices: function () {
                if (isArray(objGet(this.data, 'fields.devices'))) {
                    return this.data.fields.devices;
                }

                return [];
            }
        }
    }
</script>
